<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CastController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function cast()
    {
        $cast = Cast::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.cast.list', ['cast' => $cast]);
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
                'folder' => 'cast',
                'format' => 'jpg',

            ])->getPublicId();
            $cast = new Cast(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'birthday' => $request->birthday,
                    'national' => $request->national,
                    'content' => $request->contents
                ]
            );

        }else{
            return redirect('admin/cast')->with('warning','Vui lòng nhập hình ảnh');
        }
        $cast->save();
        return redirect('admin/cast');
    }

    public function postEdit(Request $request, $id)
    {
        $cast = Cast::find($id);

        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => "Vui lòng nhập tên diễn viên"
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($cast['image'] != '') {
                Cloudinary::destroy($cast['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'cast',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $cast->update($request->all());
        return redirect('admin/cast')->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        $cast = Cast::find($id);
        Cloudinary::destroy($cast['image']);
        $cast->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

}
