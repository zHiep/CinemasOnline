<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\MovieGenres;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discount(){
        $discount = Discount::orderBy('id', 'DESC')->Paginate(25);
        return view('admin.discount.list',['discount'=>$discount]);
    }
    public function postCreate(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u',  // Kiểm tra trường tên
            'code' => 'required|string|unique:discounts,code|max:50',  // Kiểm tra mã giảm giá không trùng
            'percent' => 'required|numeric|min:5|max:100',  // Kiểm tra tỷ lệ phần trăm giảm giá hợp lệ
            'quantity' => 'required|numeric|min:1'
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.regex' => 'Tên không chứa ký tự đặc biệt.',
            'code.required' => 'Vui lòng nhập mã code.',
            'code.unique' => 'Code đã tồn tại.',
            'code.max' => 'Mã code không quá 50 ký tự.',
            'percent.required' => 'Vui lòng nhập giá trị giảm giá.',
            'percent.numeric' => 'Giá trị giảm phải là số.',
            'percent.min' => 'Giá trị giảm giá không dưới 5%',
            'percent.max' => 'Giá trị giảm giá tối đa là 100%.',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.min' => 'Số lượng không được âm.'
        ]);
        Discount::create($request->all());
        return redirect('admin/discount')->with('success', 'Thêm mã khuyến mãi thành công!');
    }
    public function postEdit(Request $request,$id){
        $discount = Discount::find($id);
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u',  
            'code' => 'required|string|max:50',  
            'percent' => 'required|numeric|min:5|max:100',  
            'quantity' => 'required|numeric|min:1'
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.regex' => 'Tên không chứa ký tự đặc biệt.',
            'code.required' => 'Vui lòng nhập mã code.',
            'code.max' => 'Mã code không quá 50 ký tự.',
            'percent.required' => 'Vui lòng nhập giá trị giảm giá.',
            'percent.numeric' => 'Giá trị giảm phải là số.',
            'percent.min' => 'Giá trị giảm giá không dưới 5%',
            'percent.max' => 'Giá trị giảm giá tối đa là 100%.',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.min' => 'Số lượng không được âm.'
        ]);
        $discount->update($request->all());
        return redirect('admin/discount')->with('success', 'Cập nhật khuyến mãi thành công!');
    }
    public function delete($id)
    {
        $discount = Discount::find($id);
        if($discount['status'] ==0){
            Discount::destroy($id);
            return response()->json(['success' => 'Xóa khuyến mãi thành công!']);
        }
        else{
            return response()->json(['error' => "Vui lòng chuyển trạng thái sang offline" ]);
        }
    }
    public function status(Request $request){
        $discount = Discount::find($request->discount_id);
        $discount['status'] = $request->active;
        $discount->save();
        return response('success',200);
    }
}
