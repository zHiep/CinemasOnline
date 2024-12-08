<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\MovieGenres;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BannerController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function banners()
    {
        $banners = Banner::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.banners.list', ['banners' => $banners]);
    }

    public function postCreate(Request $request)
    {   
        // Validate hình ảnh và yêu cầu định dạng
        $request->validate([
            'Image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048', // Hình ảnh phải có định dạng hợp lệ và kích thước tối đa 2MB
        ], [
            'Image.required' => 'Vui lòng thêm hình ảnh',
            'Image.image' => 'Tệp tải lên phải là một hình ảnh',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpeg, jpg, png, hoặc gif',
            'Image.max' => 'Kích thước hình ảnh tối đa là 2MB',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'banner',
                'format' => 'jpg',

            ])->getPublicId();
            $banner = new Banner(
                [
                    'image' => $cloud,
                ]
            );
        }else{
            return redirect('admin/banners')->with('warning','Vui lòng thêm hình ảnh');
        }
        $banner->save();
        return redirect('admin/banners')->with('success','Thêm banner thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $banners = Banner::find($id);

        // Validate hình ảnh và yêu cầu định dạng
        $request->validate([
            'Image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048', // Hình ảnh phải có định dạng hợp lệ và kích thước tối đa 2MB
        ], [
            'Image.required' => 'Vui lòng thêm hình ảnh',
            'Image.image' => 'Tệp tải lên phải là một hình ảnh',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpeg, jpg, png, hoặc gif',
            'Image.max' => 'Kích thước hình ảnh tối đa là 2MB',
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($banners['image'] != '') {
                Cloudinary::destroy($banners['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'banner',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $banners->update($request->all());
        return redirect('admin/banners')->with('success', 'Sửa banner thành công!');
    }

    public function delete($id)
    {
        $banners = Banner::find($id);
        Cloudinary::destroy($banners['image']);
        $banners->delete();
        return response()->json(['success' => 'Xóa banner thành công!']);
    }
    public function status(Request $request){
        $banners = Banner::find($request->banner_id);
        $banners['status'] = $request->active;
        $banners->save();
        return response('success',200);
    }
}
