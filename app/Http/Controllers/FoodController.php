<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function food()
    {
        $food = Food::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.food.list', ['food' => $food]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u',
            'price' => 'required|numeric|min:0',
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Tên món ăn không được để trống.',
            'name.string' => 'Tên món ăn phải là chuỗi ký tự.',
            'name.max' => 'Tên món ăn không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên món ăn không được chứa ký tự đặc biệt.',
            'price.required' => 'Giá món ăn không được để trống.',
            'price.numeric' => 'Giá món ăn phải là số.',
            'price.min' => 'Giá món ăn phải lớn hơn hoặc bằng 0.',
            'Image.required' => 'Vui lòng tải lên hình ảnh món ăn.',
            'Image.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'Image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg.',
            'Image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'food',
                'format' => 'jpg',

            ])->getPublicId();
            $food = new Food(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'price' => $request->price,
                ]
            );
        }else{
            return redirect('admin/food')->with('warning','Vui lòng nhập hình ảnh');
        }
        $food->save();
        return redirect('admin/food')->with('success', 'Thêm món ăn thành công!');
    }

    public function postEdit(Request $request, $id)
    {
        $food = Food::find($id);

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s]+$/u',
            'price' => 'required|numeric|min:0',
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Tên món ăn không được để trống.',
            'name.string' => 'Tên món ăn phải là chuỗi ký tự.',
            'name.max' => 'Tên món ăn không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên món ăn không được chứa ký tự đặc biệt.',
            'price.required' => 'Giá món ăn không được để trống.',
            'price.numeric' => 'Giá món ăn phải là số.',
            'price.min' => 'Giá món ăn phải lớn hơn hoặc bằng 0.',
            'Image.required' => 'Vui lòng tải lên hình ảnh món ăn.',
            'Image.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'Image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg.',
            'Image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($food['image'] != '') {
                Cloudinary::destroy($food['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'food',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $food->update($request->all());
        return redirect('admin/food')->with('success', 'Sửa món ăn thành công!');
    }

    public function delete($id)
    {
        $food = Food::find($id);
        Cloudinary::destroy($food['image']);
        $food->delete();
        return response()->json(['success' => 'Xóa món ăn thành công!']);
    }
    public function status(Request $request){
        $food = Food::find($request->food_id);
        $food['status'] = $request->active;
        $food->save();
        return response('success',200);
    }
}
