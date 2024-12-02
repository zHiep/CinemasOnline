<?php

namespace App\Http\Controllers;

use App\Models\Director;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function director()
    {
        $director = Director::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.director.list', ['director' => $director]);
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
                'folder' => 'director',
                'format' => 'jpg',
            ])->getPublicId();
            $director = new Director(
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
        $director->save();
        return redirect('admin/director');
    }

    public function postEdit(Request $request, $id)
    {
        $director = Director::find($id);

        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => "Please enter director's name"
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($director['image'] != '') {
                Cloudinary::destroy($director['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'director',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $director->update($request->all());
        return redirect('admin/director')->with('success', 'Updated Successfully!');
    }

    public function delete($id)
    {
        $director = Director::find($id);
        Cloudinary::destroy($director['image']);
        $director->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
}
