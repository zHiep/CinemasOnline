<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\Rating;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name', $cloud_name);
    }

    public function movie()
    {
        $movies = Movie::orderBy('status', 'DESC') // Sắp xếp các phim có status = 1 lên đầu
               ->orderBy('id', 'DESC')     // Sau đó sắp xếp theo id giảm dần
               ->paginate(5);

        return view('admin.movie.list', ['movies' => $movies]);
    }

    public function getCreate()
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::get()->where('status',1);
        $rating = Rating::all();
        return view('admin.movie.create', [
            'movieGenres' => $movieGenres,
            'directors' => $directors,
            'casts' => $casts,
            'rating' => $rating
        ]);
    }

    public function postCreate(Request $request)
    {   
    // Validate dữ liệu đầu vào
    $request->validate([
        'name' => 'required', // Tên phim là chuỗi và tối đa 255 ký tự
        'showTime' => 'required|integer|min:1', // Thời gian    chiếu phải là số nguyên dương
        'releaseDate' => 'required|date|before_or_equal:endDate', // Ngày phát hành hợp lệ và trước hoặc bằng ngày kết thúc
        'endDate' => 'required|date|after_or_equal:releaseDate', // Ngày kết thúc hợp lệ và sau hoặc bằng ngày phát hành
        'national' => 'required|string', // Quốc gia là chuỗi, tối đa 100 ký tự
        'description' => 'required|string', // Mô tả tối đa 2000 ký tự
        'casts' => 'required|array', // Danh sách diễn viên là mảng
        'casts.*' => 'exists:casts,id', // Mỗi diễn viên phải tồn tại trong bảng casts
        'directors' => 'required|array', // Danh sách đạo diễn là mảng
        'directors.*' => 'exists:directors,id', // Mỗi đạo diễn phải tồn tại trong bảng directors
        'movieGenres' => 'required|array', // Danh sách thể loại phim là mảng
        'movieGenres.*' => 'exists:movie_genres,id', // Mỗi thể loại phải tồn tại trong bảng movie_genres
        'Image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048', // Ảnh là file hợp lệ với kích thước tối đa 2MB
    ], [
        // Thông báo lỗi tùy chỉnh
        'name.required' => 'Vui lòng nhập tên phim.',
        'showTime.required' => 'Vui lòng nhập thời gian chiếu.',
        'showTime.integer' => 'Thời gian chiếu phải là một số nguyên.',
        'releaseDate.required' => 'Vui lòng nhập ngày phát hành.',
        'releaseDate.before_or_equal' => 'Ngày phát hành phải trước hoặc bằng ngày kết thúc.',
        'endDate.required' => 'Vui lòng nhập ngày kết thúc.',
        'endDate.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày phát hành.',
        'national.required' => 'Vui lòng nhập quốc gia.',
        'description.required' => 'Vui lòng nhập mô tả.',
        'casts.required' => 'Vui lòng chọn ít nhất một diễn viên.',
        'casts.*.exists' => 'Diễn viên không tồn tại.',
        'directors.required' => 'Vui lòng chọn ít nhất một đạo diễn.',
        'directors.*.exists' => 'Đạo diễn không tồn tại.',
        'movieGenres.required' => 'Vui lòng chọn ít nhất một thể loại phim.',
        'movieGenres.*.exists' => 'Thể loại phim không tồn tại.',
        'Image.required' => 'Vui lòng tải lên hình ảnh.',
        'Image.image' => 'Ảnh tải lên phải là file hình ảnh.',
        'Image.mimes' => 'Ảnh phải thuộc định dạng jpeg, jpg, png hoặc gif.',
        'Image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
    ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'movies',
                'format' => 'jpg',
            ])->getPublicId();
            $movie = new Movie(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'showTime' => $request->showTime,
                    'releaseDate' => $request->releaseDate,
                    'endDate' => $request->endDate,
                    'national' => $request->national,
                    'rating_id' => $request->rating,
                    'description' => $request->description,
                    'trailer'=> $request->trailer
                ]
            );
            $movie->save();
            $casts = Cast::find($request->casts);
            $movie->casts()->attach($casts);

            $directors = Director::find($request->directors);
            $movie->directors()->attach($directors);

            $movieGenres = MovieGenres::find($request->movieGenres);
            $movie->movieGenres()->attach($movieGenres);
        }else{
            return redirect('admin/movie')->with('warning','Vui lòng nhập hình ảnh');
        }
        return redirect('admin/movie');
    }

    public function getEdit($id)
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();
        $movie = Movie::find($id);
        return view('admin.movie.edit', ['movie' => $movie,
            'movieGenres' => $movieGenres,
            'directors' => $directors,
            'casts' => $casts,
            'rating' => $rating]);
    }

    public function postEdit(Request $request, $id)
    {
    // Validate dữ liệu đầu vào
    $request->validate([
        'name' => 'required', // Tên phim là chuỗi và tối đa 255 ký tự
        'showTime' => 'required|integer|min:1', // Thời gian    chiếu phải là số nguyên dương
        'releaseDate' => 'required|date|before_or_equal:endDate', // Ngày phát hành hợp lệ và trước hoặc bằng ngày kết thúc
        'endDate' => 'required|date|after_or_equal:releaseDate', // Ngày kết thúc hợp lệ và sau hoặc bằng ngày phát hành
        'national' => 'required|string', // Quốc gia là chuỗi, tối đa 100 ký tự
        'description' => 'required|string|', // Mô tả tối đa 2000 ký tự
        'casts' => 'required|array', // Danh sách diễn viên là mảng
        'casts.*' => 'exists:casts,id', // Mỗi diễn viên phải tồn tại trong bảng casts
        'directors' => 'required|array', // Danh sách đạo diễn là mảng
        'directors.*' => 'exists:directors,id', // Mỗi đạo diễn phải tồn tại trong bảng directors
        'movieGenres' => 'required|array', // Danh sách thể loại phim là mảng
        'movieGenres.*' => 'exists:movie_genres,id', // Mỗi thể loại phải tồn tại trong bảng movie_genres
    ], [
        // Thông báo lỗi tùy chỉnh
        'name.required' => 'Vui lòng nhập tên phim.',
        'showTime.required' => 'Vui lòng nhập thời gian chiếu.',
        'showTime.integer' => 'Thời gian chiếu phải là một số nguyên.',
        'releaseDate.required' => 'Vui lòng nhập ngày phát hành.',
        'releaseDate.before_or_equal' => 'Ngày phát hành phải trước hoặc bằng ngày kết thúc.',
        'endDate.required' => 'Vui lòng nhập ngày kết thúc.',
        'endDate.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày phát hành.',
        'national.required' => 'Vui lòng nhập quốc gia.',
        'description.required' => 'Vui lòng nhập mô tả.',
        'casts.required' => 'Vui lòng chọn ít nhất một diễn viên.',
        'casts.*.exists' => 'Diễn viên không tồn tại.',
        'directors.required' => 'Vui lòng chọn ít nhất một đạo diễn.',
        'directors.*.exists' => 'Đạo diễn không tồn tại.',
        'movieGenres.required' => 'Vui lòng chọn ít nhất một thể loại phim.',
        'movieGenres.*.exists' => 'Thể loại phim không tồn tại.'
    ]);
        $movie = Movie::find($id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'movies',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
            $movie['image'] = $request['image'];
        }
        $movie['name'] = $request['name'];
        $movie['showTime'] = $request['showTime'];
        $movie['releaseDate'] = $request['releaseDate'];
        $movie['endDate'] = $request['endDate'];
        $movie['national'] = $request['national'];
        $movie['description'] = $request['description'];
        $movie['trailer'] = $request['trailer'];
        $movie['rating_id'] = $request['rating'];

        $movie->update();

        $casts = Cast::find($request->casts);
        $movie->casts()->detach();
        $movie->casts()->attach($casts);

        $directors = Director::find($request->directors);
        $movie->directors()->detach();
        $movie->directors()->attach($directors);

        $movieGenres = MovieGenres::find($request->movieGenres);
        $movie->movieGenres()->detach();
        $movie->movieGenres()->attach($movieGenres);


        return redirect('admin/movie')->with('success', "Cập nhật thành công!");
    }

    public function delete($id)
    {
        // Tìm phim trong cơ sở dữ liệu
        $movie = Movie::find($id);

        // Kiểm tra nếu phim không tồn tại
        if (!$movie) {
            return response()->json(['error' => 'Phim không tồn tại!'], 404);
        }

        // Nếu không có ràng buộc, thực hiện xóa phim
        Cloudinary::destroy($movie['image']);  // Xóa ảnh khỏi Cloudinary
        $movie->delete();  // Xóa phim trong cơ sở dữ liệu

        // Trả về phản hồi thành công
        return response()->json(['success' => 'Xóa phim thành công!']);
    }

    public function status(Request $request)
    {
        $movie = Movie::find($request->movie_id);
        $movie['status'] = $request->active;
        $movie->save();
        return response('success',200);
    }
    public function searchMovie(Request $request){
            $output = '';
            if($request->search == null){
                $movies = Movie::orderBy('id', 'DESC')->Paginate(5);
            }else{
                $movies = Movie::where('name', 'LIKE', '%' . $request->search . '%')->get();
            }
            if ($movies) {
                foreach ($movies as  $movie) {
                    $output .= '<tr>
                     <td class="align-middle text-center">';
                     foreach($movie->movieGenres as $genre){
                         $output.='
                     <h6 class="mb-0 text-sm ">'. $genre->name .'</h6>';
                     }
                    $output.='
                        </td>
                   <td class="align-middle text-center">';
                    if(strstr($movie->image,"https") == "") {
                        $output .= '
                        <img style="width: 300px"
                             src="https://res.cloudinary.com/'. cloud_name() .'/image/upload/'.$movie->image.'.jpg"
                             alt="user1">';
                    }
                    else {
                        $output .= '
                        <img style="width: 300px"
                             src="'. $movie->image .'" alt="user1">';
                    }
                     $output.='</td>
                     <td class="align-middle text-center">
                        <div class="accordion-body mt-4 mb-3 w-100">
                            '. strip_tags($movie->name) .'
                        </div>
                    </td>
                     <td class="align-middle text-center">
                            <span class="text-secondary font-weight-bold">
                             '.$movie->showTime.'  minutes
                            </span>
                        </td>
                     <td class="align-middle text-center">
                        <h6 class="mb-0 text-sm ">'. $movie->national .'</h6>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary font-weight-bold">
                        '. date("d-m-Y", strtotime($movie->releaseDate )).'
                        </span>
                        </td>
                      <td class="align-middle text-center">
                           <span class="text-secondary font-weight-bold">
                           '.date("d-m-Y", strtotime($movie->endDate)).'
                           </span>
                       </td>
                     <td id="status'. $movie['id'] .'" class="align-middle text-center text-sm">';
                        if($movie['status'] == 1)
                        {
                        $output.='
                            <a href="javascript:void(0)" class="btn_active"  onclick="changestatus('. $movie['id'] .',0)">
                                <span class="badge badge-sm bg-gradient-success">Online</span>
                            </a>';
                        }
                        else
                        {
                        $output.='
                            <a href="javascript:void(0)" class="btn_active"  onclick="changestatus('. $movie['id'] .',1)">
                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                            </a>';
                        }
                        $output.='</td>
                         <td class="align-middle">';
                        $output.='
                            <a href="admin/movie/edit/'. $movie['id'] .'" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                               data-original-title="Edit user">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>';
                        $output.='
                        </td>
                    </tr>';

                }
            }
            return Response($output);

    }
}
