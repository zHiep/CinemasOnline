<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\MovieGenres;

class MovieGenresController extends Controller
{
    public function movie_genres()
    {
        $movieGenres = MovieGenres::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.movie_genres.list', ['movieGenres' => $movieGenres]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:movie_genres'
        ], [
            'name.required' => "Vui lòng điền tên danh mục",
            'name.unique' => 'Danh mục phim đã tồn tại'
        ]);
        MovieGenres::create($request->all());
        return redirect('admin/movie_genres')->with('success', 'Added Successfully!');
    }

    public function postEdit(Request $request, $id)
    {
        $movieGenres = MovieGenres::find($id);
        $request->validate([
            'name' => 'required|unique:movie_genres'
        ], [
            'name.required' => "Vui lòng điền tên danh mục",
            'name.unique' => 'Danh mục phim đã tồn tại'
        ]);
        $movieGenres->update($request->all());
        return redirect('admin/movie_genres')->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        $movie_genres = MovieGenres::find($id);
        $check = count($movie_genres->movies);
        if ($check == 0) {
            MovieGenres::destroy($id);
            return response()->json(['success' => 'Xóa thành công']);
        } else {
            return response()->json(['error' => "Không thể xóa vì còn tồn tại phim trong danh mục"]);
        }
    }
    public function status(Request $request)
    {
        $movie_genres = MovieGenres::find($request->genre_id);
        $movie_genres['status'] = $request->active;
        $movie_genres->save();
        return response('success', 200);
    }
}
