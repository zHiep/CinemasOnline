@extends('admin.layout.index')
@section('content')
@can('movies')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>
                        @lang('lang.movies')
                        <label for="search">
                            <input type="text" placeholder="@lang('lang.type') @lang('lang.movies') " class="form-controller" id="search" name="search" />
                        </label>
                    </h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <a href="admin/movie/create" style="float:right;padding-right:30px;">
                            <button class=" btn bg-gradient-danger float-right mb-3">@lang('lang.create')</button>
                        </a>
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.movie_genre')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.image')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.movie_name')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.showtime')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.national')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.release_date')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.end_date')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movies as $movie)
                                <tr>
                                    <td class="align-middle text-center">
                                        @foreach($movie->movieGenres as $genre)
                                        <h6 class="mb-0 text-sm ">{{ $genre->name }}</h6>
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(strstr($movie->image,"https") == "")
                                        <img style="width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{$movie->image}}.jpg" alt="user1">
                                        @else
                                        <img style="width: 300px" src="{{ $movie->image }}" alt="user1">
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="accordion-body mt-4 mb-3 w-100">
                                            {{ $movie->name }}
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{{ $movie->showTime }} @lang('lang.minutes')</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm ">{{ $movie->national }}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! date("d-m-Y", strtotime($movie->releaseDate )) !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! date("d-m-Y", strtotime($movie->endDate)) !!}</span>
                                    </td>
                                    <td id="status{!! $movie['id'] !!}" class="align-middle text-center text-sm">
                                        @if($movie['status'] == 1)
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $movie['id'] !!},0)">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </a>
                                        @else
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $movie['id'] !!},1)">
                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="admin/movie/edit/{!! $movie['id'] !!}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </a>
                                    </td>
                                    <!-- {{-- <td class="align-middle">--}}
                                    {{-- <a href="javascript:;" data-url="{{ url('admin/movie/delete', $movie['id'] ) }}" class="text-secondary font-weight-bold text-xs delete-movie" data-toggle="tooltip"--}}
                                    {{-- data-original-title="Delete movie">--}}
                                    {{-- <i class="fa-solid fa-trash-can fa-lg"></i>--}}
                                    {{-- </a>--}}
                                    {{-- </td>--}} -->
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="paginate" class="d-flex justify-content-center mt-3">
                        {!! $movies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 align="center">Permissions Deny</h1>
@endcan
@endsection
@section('scripts')
<!-- {{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            $('.delete-movie').on('click', function () {--}}
{{--                var userURL = $(this).data('url');--}}
{{--                var trObj = $(this);--}}
{{--                if (confirm("Are you sure you want to remove it?") === true) {--}}
{{--                    $.ajax({--}}
{{--                        url: userURL,--}}
{{--                        type: 'DELETE',--}}
{{--                        dataType: 'json',--}}
{{--                        success: function (data) {--}}
{{--                            if (data['success']) {--}}
{{--                                // alert(data.success);--}}
{{--                                trObj.parents("tr").remove();--}}
{{--                            } else if (data['error']) {--}}
{{--                                alert(data.error);--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}} -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $paginate = $('#paginate');
        $flag = false;
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ URL::to('admin/movie/search') }}",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('tbody').html(data);
                    if ($value == '' && $flag == true) {
                        $('.card-body').append($paginate);
                        $flag = false;
                    } else {
                        $('#paginate').remove();
                        $flag = true;
                    }

                }
            });
        })
    });
</script>
<script>
    function changestatus(movie_id, active) {
        if (active === 1) {
            $("#status" + movie_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + movie_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        } else {
            $("#status" + movie_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + movie_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/movie/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'movie_id': movie_id
            },
            success: function(data) {
                if (data['success']) {
                    // alert(data.success);
                } else if (data['error']) {
                    alert(data.error);
                }
            }
        });
    }
</script>
@endsection