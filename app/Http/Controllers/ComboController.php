<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Food;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name', $cloud_name);
    }

    public function combo()
    {
        $foods = Food::all();
        $combos = Combo::orderBy('id', 'DESC')->paginate(10);
        return view('admin.combo.list', [
            'combos' => $combos,
            'foods' => $foods
        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u',
            'price' => 'required|numeric|min:0',
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'food' => 'required|array|min:1',
            'food.*' => 'exists:foods,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
        ], [
            'name.required' => 'Vui lòng nhập tên combo.',
            'name.string' => 'Tên combo phải là chuỗi ký tự.',
            'name.max' => 'Tên combo không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên combo không được chứa ký tự đặc biệt.',
            'price.required' => 'Vui lòng nhập giá combo.',
            'price.numeric' => 'Giá combo phải là số.',
            'price.min' => 'Giá combo phải lớn hơn hoặc bằng 0.',
            'Image.required' => 'Vui lòng tải lên hình ảnh combo.',
            'Image.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'Image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg.',
            'Image.max' => 'Hình ảnh không được vượt quá 2MB.',
            'food.required' => 'Vui lòng chọn ít nhất một món ăn.',
            'food.array' => 'Danh sách món ăn không hợp lệ.',
            'food.*.exists' => 'Một hoặc nhiều món ăn không tồn tại.',
            'quantity.required' => 'Vui lòng nhập số lượng cho mỗi món ăn.',
            'quantity.array' => 'Danh sách số lượng không hợp lệ.',
            'quantity.*.required' => 'Vui lòng nhập số lượng món ăn.',
            'quantity.*.integer' => 'Số lượng món ăn phải là số nguyên.',
            'quantity.*.min' => 'Số lượng món ăn phải lớn hơn hoặc bằng 1.',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'combo',
                'format' => 'jpg',
            ])->getPublicId();
            $combo = new Combo(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'price' => $request->price,
                    'created_at' => Carbon::today(),
                ]
            );
        }else{
            return redirect('admin/combo')->with('warning','Vui lòng thêm hình ảnh');
        }
        $combo->save();

        for ($i = 0; $i < count($request->food); $i++) {
            $food = Food::find($request->food[$i]);
            $combo->foods()->attach($food, ['quantity' => $request->quantity[$i]]);
        }

        return redirect('admin/combo')->with('success', 'Thêm mới combo thành công!');
    }

    public function postEdit(Request $request, $id)
    {
        $combo = Combo::find($id);
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => "Vui lòng nhập tên Combo!"
        ]);

        if ($request->hasFile('Image')) {
            $img = $request->file('Image');
            if ($combo->image != '') {
                Cloudinary::destroy($combo->image);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'combo',
                'format' => 'jpg',
            ])->getPublicId();
            $combo->image = $cloud;
        }
        $combo->name = $request->name;
        $combo->price = $request->price;

        $combo->foods()->detach();
        for ($i = 0; $i < count($request->food); $i++) {
            $food = Food::find($request->food[$i]);
            $combo->foods()->attach($food, ['quantity' => $request->quantity[$i]]);
        }

        $combo->save();
        return redirect('admin/combo')->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        $combo = Combo::find($id);
        Cloudinary::destroy($combo->image);
        $combo->delete();
        return response()->status(200);
    }

    public function status(Request $request)
    {
        $combo = Combo::find($request->combo_id);
        $combo['status'] = $request->active;
        $combo->save();
        return response('success', 200);
    }
}
