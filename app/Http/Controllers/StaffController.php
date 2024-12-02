<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Food;
use App\Models\Movie;
use App\Models\Price;
use App\Models\RoomType;
use App\Models\Schedule;
use App\Models\SeatType;
use App\Models\Ticket;
use App\Models\TicketCombo;
use App\Models\TicketFood;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name', $cloud_name);
    }

    public function buyTicket(Request $request) {
        $theater = Auth::user()->theater;
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>', Carbon::today()->format('Y-m-d'))
            ->get();
        $moviesEarly = Movie::all()->filter(function ($movie) {
            foreach ($movie->schedules as $schedule) {
                if ($schedule->early && $movie->releaseDate > date('Y-m-d')) {
                    return $movie;
                }
            }
            return null;
        });
        return view('admin.buyTicket.buyTicket', [
            'movies' => $movies,
            'moviesEarly' => $moviesEarly,
            'theater' => $theater,
            'date_cur' => $date_cur,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function ticket($schedule_id) {
        Ticket::where('holdState', false)->where('hasPaid', false)->where('schedule_id', $schedule_id)->delete();
        $ticketsHolds = Ticket::where('holdState', true)->where('schedule_id', $schedule_id)->get();

        foreach ($ticketsHolds as $ticketsHold) {
            $time = strtotime(date('Y-m-d H:i:s')) - strtotime($ticketsHold->created_at);

            if ($time > (9*60)) {
                $ticketsHold->delete();
            }

        }

        $seatTypes = SeatType::all();
        $combos = Combo::where('status', 1)->get();
        $tickets = Ticket::where('schedule_id', $schedule_id)->get();
        $schedule = Schedule::find($schedule_id);
        if (strtotime($schedule->startTime) < strtotime('17:00')) {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '08:00')->get()->first()->price;
        } else {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '17:00')->get()->first()->price;
        }
        $roomSurcharge = $schedule->room->roomType->surcharge;
        $room = $schedule->room;
        $movie = $schedule->movie;

        return view('admin.buyTicket.ticket', [
            'schedule' => $schedule,
            'room' => $room,
            'seatTypes' => $seatTypes,
            'roomSurcharge' => $roomSurcharge,
            'price' => $price,
            'movie' => $movie,
            'tickets' => $tickets,
            'combos' => $combos,
        ]);
    }

    public function scanBarcode(Request $request) {
        $user = User::where('code', $request->code)->get()->first();
        if (!$user) {
            return response('user not found', 500);
        }
        return response()->json([
            'username' => $user->fullName,
            'userPoint' => $user->point,
            'userId' => $user->code,
        ]);
    }

    public function createPayment(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $vnp_TmnCode = "6JQZ09G6"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "QCTWPIWUGYNUJNXJAJMQKHUBCXZMDZXU"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = $request->getSchemeAndHttpHost()
            . "/payment/result?point=" . $request->point . "type=" . $request->type;
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+' . $request->time . 'minutes', strtotime($startTime)));

        $vnp_TxnRef = $ticket->code; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $ticket->totalPrice; // Số tiền thanh toán
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request->bankCode; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function handleResult(Request $request)
    {
//        array:12 [▼
//              "vnp_Amount" => "7500000"
//              "vnp_BankCode" => "NCB"
//              "vnp_BankTranNo" => "VNP14038134"
//              "vnp_CardType" => "ATM"
//              "vnp_OrderInfo" => "Thanh toan GD:21355094087"
//              "vnp_PayDate" => "20230613213610"
//              "vnp_ResponseCode" => "00"
//              "vnp_TmnCode" => "6JQZ09G6"
//              "vnp_TransactionNo" => "14038134"
//              "vnp_TransactionStatus" => "00"
//              "vnp_TxnRef" => "21355094087"
//              "vnp_SecureHash" => "b1a4601eb9be6f7ed795efc2e86e24f036af8b4cf3f9dbb5df6e0caf3d382181d51e1a9ebda0fb8d19ed6c89eba78f8b95ba55af25d0ec18b1b16ceff1100de0"
//         ]

        if ($request->vnp_BankCode === 'MONEY') {
            $request->vnp_Amount = $request->total;
            $request->vnp_ResponseCode = '00';
            $tickeById = Ticket::find($request->ticket_id);
            $request->vnp_TxnRef = $tickeById->code;
        }


        $ticket = Ticket::where('code', $request->vnp_TxnRef)->get()->first();
        switch ($request->vnp_ResponseCode) {
            case '00':
                if ($request->userCode) {
                    $user = User::where('code', $request->userCode)->first();
                    $money_payment = 0 ;
                    foreach($user['ticket'] as $ticket)
                    {
                        $money_payment += $ticket['totalPrice'];
                    }
                    if($money_payment < 4000000){
                        $point = ($ticket['totalPrice'])*5/100;
                    } else {
                        $point = ($ticket['totalPrice'])*10/100;
                    }
                    if ($request->point == null) {
                        $user->point += $point;
                    } else {
                        $user->point -= $request->point;
                    }
                    $user->save();
                }
                $ticket->hasPaid = true;
                $ticket->save();

                if ($request->type == 'ticket') {
                    return redirect('admin/buyTicket')->with('success', 'thanh toán thành công!');
                } else {
                    return redirect('admin/buyCombo')->with('success', 'thanh toán thành công!');
                }
            default:
                Ticket::where('code', $request->vnp_TxnRef)->delete();
                return redirect('admin/buyTicket')->with('fail', 'thanh toán thất bại!');
        }
    }

    public function ticketPayment(Request $request) {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->holdState = false;
        $ticket->totalPrice = $request->totalPrice;
        $user = User::where('code', $request->userCode)->get()->first();
        if ($user) {
            $ticket->user_id = $user->id;
        } else {
            $ticket->user_id = Auth::user()->id;
        }
        $ticket->save();

        return response('', 200);
    }

    public function scanTicket() {
        return view('admin.scanTicket.scanTicket');
    }

    public function handleScanTicket(Request $request) {
        $message = 'vé hợp lệ';
        $check = true;
        $seatsList = '';
        $ticket = Ticket::where('code',  $request->code)->first();

        if ($ticket) {
            if ($ticket->schedule->date == date('Y-m-d')) {
                if (strtotime('- 10 minutes', strtotime($ticket->schedule->startTime)) > strtotime(date('H:i:s'))) {
                    $message = 'Chưa đến giờ chiếu phim';
                    $check = false;
                    $ticket->status = true;
                } else {
                    if (strtotime($ticket->schedule->endTime) > strtotime(date('H:i:s'))) {
                        if ($ticket->status) {
                            $ticket->status = false;
                            $check = true;
                            $message = 'vé hợp lệ';
                        } else {
                            $message = 'vé không hợp lệ';
                            $check = false;
                        }
                    } else {
                        $message = 'suất chiếu đã kết thúc';
                        $check = false;
                        $ticket->status = false;
                    }
                }

            } else if ($ticket->schedule->date > date('Y-m-d')) {
                    $message = 'Chưa đến ngày chiếu phim';
                    $check = false;
                    $ticket->status = true;
            } else  {
                $message = 'suất chiếu đã kết thúc';
                $check = false;
                $ticket->status = false;
            }

            $ticket->save();

            foreach ($ticket->ticketSeats as $seats) {
                $seatsList .= $seats->row.$seats->col.',';
            }
        } else {
            $message = 'không tìm thấy vé';
            $check = false;
        }

        return response()->json([
            'theater' => $ticket->schedule->room->theater->name,
            'room' => $ticket->schedule->room->name,
            'movie' => $ticket->schedule->movie->name,
            'seats' => $seatsList,
            'date' => $ticket->schedule->date,
            'startTime' => $ticket->schedule->startTime,
            'message' => $message,
            'check' => $check,
        ]);
    }

    public function buyCombo(Request $request) {
        $combos = Combo::where('status', 1)->get();
        $foods = Food::where('status', 1)->get();
        return view('admin.buyCombo.buyCombo', [
            'combos' => $combos,
            'foods' => $foods,
        ]);
    }

    public function createTicketCombo(Request $request) {
        $ticket = new Ticket([
            'schedule_id' => null,
            'user_id' => null,
            'holdState' => false,
            'status' => false,
            'hasPaid' => false,
            'code' => rand(10000000, 9999999999)
        ]);
        $ticket->save();
        if ($request->ticketCombos) {
            foreach ($request->ticketCombos as $ticketCombo) {
                $combo = Combo::find($ticketCombo[0]);
                $details = '';
                foreach ($combo->foods as $food) {
                    $details .= $food->pivot->quantity . ' ' . $food->name . ' + ';
                }
                $details = substr($details, 0, -3);
                $newTkCb = new TicketCombo([
                    'comboName' => $combo->name,
                    'comboPrice' => $combo->price,
                    'comboDetails' => $details,
                    'quantity' => $ticketCombo[1],
                    'ticket_id' => $ticket->id
                ]);

                $newTkCb->save();
                unset($newTkCb);
            }
        }
        if ($request->ticketFoods) {
            foreach ($request->ticketFoods as $ticketFood) {
                $food = Food::find($ticketFood[0]);
                $newTkF = new TicketFood([
                    'foodName' => $food->name,
                    'foodPrice' => $food->price,
                    'quantity' => $ticketFood[1],
                    'ticket_id' => $ticket->id,
                ]);

                $newTkF->save();
                unset($newTkF);
            }
        }

        return response()->json(['ticket_id' => $ticket->id]);
    }

    public function scanCombo() {
        return view('admin.scanCombo.scanCombo');
    }

    public function handleScanCombo(Request $request) {
        $ticket = Ticket::where('code', $request->code)->first();
        $message = 'vé hợp lệ';
        $check = true;

        if (!$ticket) {
            $message = 'không tìm thấy vé';
            $check = false;
        } else {
            if ($ticket->receivedCombo) {
                $message = 'Đã lấy đồ ăn';
                $check = false;
            } else {
                $ticket->receivedCombo = true;
            }
        }
        $comboHtml = '<ul>';
        foreach ($ticket->ticketCombos as $combo) {
            $comboHtml .= '<li>'.$combo->quantity.' X '.$combo->comboName.'<br>('.$combo->comboDetails.')</li>';
        }

        foreach ($ticket->ticketFoods as $food) {
            $comboHtml .= '<li>'.$food->quantity.' X '.$food->foodName.'</li>';
        }
        $comboHtml .= '</ul>';

        $ticket->save();

        return response()->json([
            'comboHtml' => $comboHtml,
            'message' => $message,
            'check' => $check,
        ]);
    }

    public function ticketComboPayment(Request $request) {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->holdState = false;
        $ticket->totalPrice = $request->totalPrice;
        $ticket->save();

        return response('', 200);
    }
}
