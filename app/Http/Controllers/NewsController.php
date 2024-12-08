<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use App\Models\Theater;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function news()
    {
        $news = News::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.news.list', ['news' => $news]);
    }

    public function postCreate(Request $request)
    {
        // Validate các trường dữ liệu
        $request->validate([
            'title' => 'required|max:255',  // Tiêu đề là bắt buộc và tối đa 255 ký tự
            'contents' => 'required',       // Nội dung là bắt buộc
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Kiểm tra ảnh hợp lệ, chỉ nhận các loại hình ảnh và dung lượng tối đa 2MB
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề tin tức!',
            'title.max' => 'Tiêu đề tin tức không được vượt quá 255 ký tự!',
            
            'contents.required' => 'Vui lòng nhập nội dung tin tức!',
            
            'Image.required' => 'Vui lòng nhập hình ảnh!',
            'Image.image' => 'Tệp hình ảnh phải là một ảnh!',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, svg!',
            'Image.max' => 'Dung lượng hình ảnh không được vượt quá 2MB!',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'news',
                'format' => 'jpg',
            ])->getPublicId();
            $request['user_id'] = Auth::user()['id'];
            $news = new News(
                [
                    'title' => $request->title,
                    'image' => $cloud,
                    'content' => $request->contents,
                    'status' => 1,
                    'user_id' => $request['user_id']
                ]
            );
        }else{
            return redirect('admin/news')->with('warning','Vui lòng nhập hình ảnh');
        }
        $news->save();
        return redirect('admin/news')->with('success', 'Thêm tin tức thành công!');
    }

    public function postEdit(Request $request, $id)
    {
        $news = News::find($id);

        // Validate các trường dữ liệu
        $request->validate([
            'title' => 'required|max:255',  // Tiêu đề là bắt buộc và tối đa 255 ký tự
            'contents' => 'required',       // Nội dung là bắt buộc
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Kiểm tra ảnh hợp lệ, chỉ nhận các loại hình ảnh và dung lượng tối đa 2MB
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề tin tức!',
            'title.max' => 'Tiêu đề tin tức không được vượt quá 255 ký tự!',
            
            'contents.required' => 'Vui lòng nhập nội dung tin tức!',
            
            'Image.required' => 'Vui lòng nhập hình ảnh!',
            'Image.image' => 'Tệp hình ảnh phải là một ảnh!',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, svg!',
            'Image.max' => 'Dung lượng hình ảnh không được vượt quá 2MB!',
        ]);
        $request['user_id'] = Auth::user()['id'];
        $request['content'] = $request->contents;
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($news['image'] != '') {
                Cloudinary::destroy($news['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'news',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $news->update($request->all());
        return redirect('admin/news')->with('success', 'Cập nhật tin tức thành công!');
    }

    public function delete($id)
    {
        $news = News::find($id);
        Cloudinary::destroy($news['image']);
        $news->delete();
        return response()->json(['success' => 'Xóa tin tức thành công!']);
    }
    public function status(Request $request){
        $news = News::find($request->news_id);
        $news['status'] = $request->active;
        $news->save();
        return response('success',200);
    }
}
