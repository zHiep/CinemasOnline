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
            'name' => 'required'
        ], [
            'name.required' => 'Name is required',
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
        return redirect('admin/food')->with('success', 'Add Food Successfully!');
    }

    public function postEdit(Request $request, $id)
    {
        $food = Food::find($id);

        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => "Please enter Food's name"
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
        return redirect('admin/food')->with('success', 'Updated Successfully!');
    }

    public function delete($id)
    {
        $food = Food::find($id);
        Cloudinary::destroy($food['image']);
        $food->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
    public function status(Request $request){
        $food = Food::find($request->food_id);
        $food['status'] = $request->active;
        $food->save();
        return response('success',200);
    }
}
