<?php

namespace App\Http\Controllers;

use App\Models\MovieGenres;
use App\Models\RoomType;
use App\Models\SeatType;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function __construct()
    {
    }

    public function theater()
    {
        $theaters = Theater::all();
        $seatTypes = SeatType::all();
        $roomTypes = RoomType::all();
        return view('admin.theater.list', [
            'theaters' => $theaters,
            'seatTypes' => $seatTypes,
            'roomTypes' => $roomTypes
        ]);
    }

    public function postCreate(Request $request)
    {   
        // Validate các trường
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u', // Kiểm tra không chứa ký tự đặc biệt
            'address' => 'required|string|max:255',   // Địa chỉ: bắt buộc, chuỗi và không quá 255 ký tự
            'city' => 'required|string|max:255',      // Thành phố: bắt buộc, chuỗi và không quá 255 ký tự
            'location' => 'required|string',  // Vị trí: bắt buộc, chuỗi và không quá 255 ký tự
        ], [
            'name.required' => 'Vui lòng nhập tên rạp phim',
            'name.string' => 'Tên rạp phim phải là chuỗi văn bản',
            'name.max' => 'Tên rạp phim không được vượt quá 255 ký tự',
            'name.regex' => 'Tên rạp phim không được chứa ký tự đặc biệt', // Thông báo lỗi nếu tên có ký tự đặc biệt
            
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.string' => 'Địa chỉ phải là chuỗi văn bản',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            
            'city.required' => 'Vui lòng chọn thành phố',
            'city.string' => 'Thành phố phải là chuỗi văn bản',
            'city.max' => 'Tên thành phố không được vượt quá 255 ký tự',
            
            'location.required' => 'Vui lòng nhập vị trí',
            'location.string' => 'Vị trí phải là chuỗi văn bản',
            
        ]);
        $theater = new Theater([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'location' => $request->location,
            'created_at' => Carbon::today(),
            'updated_at' => null,
        ]);

        $theater->save();
        return redirect('/admin/theater')->with('success', 'Thêm rạp phim thành công!');
    }

    public function status(Request $request)
    {
        $theaters = Theater::find($request->theater_id);
        $theaters['status'] = $request->active;
        $theaters->save();
        return response('success', 200);
    }
    public function delete($id)
    {
        $theaters = Theater::find($id);
        $check = count($theaters->rooms);
        if ($theaters['status'] == 0) {
            if ($check == 0) {
                Theater::destroy($id);
                return response()->json(['success' => 'Xóa rạp phim thành công!']);
            } else {
                return response()->json(['error' => "Không thể xóa rạp phim vì còn tồn tại phòng phim!"]);
            }
        } else {
            return response()->json(['error' => "Vui lòng chuyển trạng thái sang offline!"]);
        }
    }

    public function postEdit($id, Request $request)
    {
        // Validate các trường
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u', // Kiểm tra không chứa ký tự đặc biệt
            'address' => 'required|string|max:255',   // Địa chỉ: bắt buộc, chuỗi và không quá 255 ký tự
            'city' => 'required|string|max:255',      // Thành phố: bắt buộc, chuỗi và không quá 255 ký tự
            'location' => 'required|string',  // Vị trí: bắt buộc, chuỗi và không quá 255 ký tự
        ], [
            'name.required' => 'Vui lòng nhập tên rạp phim',
            'name.string' => 'Tên rạp phim phải là chuỗi văn bản',
            'name.max' => 'Tên rạp phim không được vượt quá 255 ký tự',
            'name.regex' => 'Tên rạp phim không được chứa ký tự đặc biệt', // Thông báo lỗi nếu tên có ký tự đặc biệt
            
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.string' => 'Địa chỉ phải là chuỗi văn bản',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            
            'city.required' => 'Vui lòng chọn thành phố',
            'city.string' => 'Thành phố phải là chuỗi văn bản',
            'city.max' => 'Tên thành phố không được vượt quá 255 ký tự',
            
            'location.required' => 'Vui lòng nhập vị trí',
            'location.string' => 'Vị trí phải là chuỗi văn bản',
            
        ]);
        $theater = Theater::find($id);
        $theater->name = $request->name;
        $theater->address = $request->address;
        $theater->city = $request->city;
        $theater->location = $request->location;
        $theater->updated_at = Carbon::today();

        $theater->save();
        return redirect('/admin/theater')->with('success', 'Cập nhật ' . $theater->name . ' thành công !');
    }
}
