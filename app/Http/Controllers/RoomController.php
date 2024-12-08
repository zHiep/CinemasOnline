<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Seat;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function postCreate(Request $request)
    {   
        // Validate các trường cần thiết
        $request->validate([
            'name' => 'required|string|max:255|unique:rooms|regex:/^[\p{L}\p{N}\s]+$/u', // Kiểm tra không chứa ký tự đặc biệt
            'roomType' => 'required', 
            'theaterId' => 'required', 
            'row' => 'required|integer|min:1|max:24', // Số hàng phải là số nguyên trong khoảng từ 1 đến 26 (do dùng mã chữ cái A-Z)
            'col' => 'required|integer|min:1|max:50', // Số cột phải là số nguyên trong khoảng từ 1 đến 20
        ], [
            'name.required' => 'Vui lòng nhập tên phòng.',
            'name.string' => 'Tên phòng phải là chuỗi văn bản.',
            'name.max' => 'Tên phòng không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên phòng không được chứa ký tự đặc biệt', // Thông báo lỗi nếu tên có ký tự đặc biệt
            'name.unique' => 'Tên phòng đã tồn tại.',

            'roomType.required' => 'Vui lòng chọn loại phòng.',
            
            'theaterId.required' => 'Vui lòng chọn rạp chiếu.',
            
            'row.required' => 'Vui lòng nhập số hàng.',
            'row.integer' => 'Số hàng phải là số nguyên.',
            'row.min' => 'Số hàng phải ít nhất là 1.',
            'row.max' => 'Số hàng tối đa là 24.',
            
            'col.required' => 'Vui lòng nhập số cột.',
            'col.integer' => 'Số cột phải là số nguyên.',
            'col.min' => 'Số cột phải ít nhất là 1.',
            'col.max' => 'Số cột tối đa là 50.',
        ]);

        $roomType = RoomType::find($request->roomType);
        $theater = Theater::find($request->theaterId);
        //        dd($roomType->id);
        $room = new Room([
            'name' => $request->name,
            'theater_id' => $theater->id,
            'created_at' => Carbon::today(),
        ]);
        $room->roomType_id = $request->roomType;
        $room->save();


        for ($i = 65; $i <= (65 + $request->row-1); $i++) {
            for ($j = 1; $j <= $request->col; $j++) {
                $seat = new Seat([
                    'row' => chr($i),
                    'col' => $j,
                    'room_id' => $room->id,
                ]);
                if ($i <= 68 && $roomType->name == '2D') {
                    $seat->seatType_id = 1;
                } else {
                    $seat->seatType_id = 2;
                }
                $seat->save();
            }
        }
        return redirect('admin/theater')->with('success', 'Thêm mới phòng tại ' . $theater->name . ' thành công!');
    }

    public function status(Request $request)
    {
        $room = Room::find($request->room_id);         
        $room['status'] = $request->active;
        $room->save();
        return response();
    }

    public function delete($id) {
        $room = Room::find($id);
        if ($room) {
            if ($room->schedules->count() == 0) {
                $room->delete();
            } else {
                return redirect('admin/theater')->with('warning', 'có suất chiếu tại phòng, không thể xóa!');
            }
        }
        return redirect('admin/theater')->with('success', 'Xóa thành công!');
    }

    public function postEdit($id, Request $request) {
        // Validate các trường cần thiết
        $room = Room::find($id);
        if ($room) {
            $room->name = $request->name;
            $room->roomType_id = $request->type;
            $room->save();
        }
        return redirect('admin/seat/' . $id)->with('success', 'Cập nhật thông tin phòng thành công!');
    }
}
