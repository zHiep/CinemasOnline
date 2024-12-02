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


        for ($i = 65; $i <= (65 + $request->row); $i++) {
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
        $room = Room::find($id);
        if ($room) {
            $room->name = $request->name;
            $room->roomType_id = $request->type;
            $room->save();
        }

        return redirect('admin/seat/' . $id)->with('success', 'Cập nhật thông tin phòng thành công!');
    }
}
