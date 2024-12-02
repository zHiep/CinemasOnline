<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\MovieGenres;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function events()
    {
        $post = Post::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.events.list', ['post' => $post]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Title is required',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'event',
                'format' => 'jpg',
            ])->getPublicId();
            $request['user_id'] = Auth::user()['id'];
            $event = new Post(
                [
                    'title' => $request->title,
                    'image' => $cloud,
                    'content' => $request->contents,
                    'conditions' => $request->conditions,
                    'status' => 1,
                    'user_id' => $request['user_id']
                ]
            );
        }
        $event->save();
        return redirect('admin/events')->with('success', 'Added Successfully!');
    }

    public function postEdit(Request $request, $id)
    {
        $event = Post::find($id);

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
            if ($event['image'] != '') {
                Cloudinary::destroy($event['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'event',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $event->update($request->all());
        return redirect('admin/events')->with('success', 'Updated Successfully!');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        Cloudinary::destroy($post['image']);
        $post->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
    public function status(Request $request){
        $event = Post::find($request->event_id);
        $event['status'] = $request->active;
        $event->save();
        return response('success',200);
    }
}
