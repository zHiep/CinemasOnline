<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Seat;
use App\Models\SeatType;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function seats($id)
    {
        $room = Room::find($id);
        $roomTypes = RoomType::all();
        $seatTypes = SeatType::all();
        return view('admin.seat.list', [
            'room' => $room,
            'seatTypes' => $seatTypes,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function postCreate(Request $request)
    {
        $seat = new Seat([
            'row' => $request->row,
            'col' => $request->col,
            'seat_type_id' => 1,
            'room_id' => $request->room,
            'status' => true
        ]);

        $seat->save();
        return redirect('/admin/theater');
    }

    public function postEdit(Request $request)
    {
        $seat = Seat::find($request->seat);

        $seat->seatType_id = $request->seatType;


        $seat->ms = $request->ms;

        $seat->me = $request->me;

        $seat->save();

        return redirect('admin/seat/' . $request->room);
    }

    public function postEditRow(Request $request)
    {
        if($request->seatType!=null)
        {
            Seat::where('room_id', $request->room)->where('row', $request->row)->update([
                'seatType_id' => $request->seatType,
                'mb' => $request->mb
            ]);
        }else{
            Seat::where('room_id', $request->room)->where('row', $request->row)->update([
                'mb' => $request->mb
            ]);
        }
        return redirect('admin/seat/' . $request->room);
    }
    public function delete($id, Request $request){
        $seat = Seat::find($id);
        if ($seat) {
            $seat->delete();
        }
        return redirect('admin/seat/' . $request->room)->with('success', 'Xóa thành công!');

    }
    public function on($id,$room_id){
        Seat::where('id', $id)->update(['status' => 0]);
        return redirect('admin/seat/'.$room_id);
    }
    public function off($id,$room_id){
        Seat::where('id', $id)->update(['status' => 1]);
        return redirect('admin/seat/'.$room_id);
    }
}
