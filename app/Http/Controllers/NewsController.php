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
        $request->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Please enter Title',
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
        return redirect('admin/news')->with('success', 'Added Successfully!');
    }

    public function postEdit(Request $request, $id)
    {
        $news = News::find($id);

        $request->validate([
            'title' => 'required'
        ], [
            'title.required' => "Please enter Title"
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
        return redirect('admin/news')->with('success', 'Updated Successfully!');
    }

    public function delete($id)
    {
        $news = News::find($id);
        Cloudinary::destroy($news['image']);
        $news->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
    public function status(Request $request){
        $news = News::find($request->news_id);
        $news['status'] = $request->active;
        $news->save();
        return response('success',200);
    }
}
