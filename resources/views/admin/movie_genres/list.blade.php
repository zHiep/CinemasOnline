@extends('admin.layout.index')
@section('content')
@can('movie_genre')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>@lang('lang.movie_genre')</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <button style="float:right;padding-right:30px;" class="me-5  btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#movie_genre">
                            @lang('lang.create')
                        </button>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.genre')</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movieGenres as $value)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{!! $value['name'] !!}</h6>
                                                <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm ">
                                        @if($value['status'] == 1)
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},0)">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </a>
                                        @else
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},1)">
                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="#editModal" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-bs-target="#editModal{!! $value['id'] !!}" data-bs-toggle="modal">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </a>
                                    </td>

                                    <td class="align-middle">
                                        <a href="javascript:void(0)" data-url="{{ url('admin/movie_genres/delete', $value['id'] ) }}" class="text-secondary font-weight-bold text-xs delete-genres" data-toggle="tooltip">
                                            <i class="fa-solid fa-trash-can fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.movie_genres.edit')
                                @endforeach
                                @include('admin.movie_genres.create')
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $movieGenres->links() !!}
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-genres').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Are you sure you want to remove it?") == true) {
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data['success']) {
                            // alert(data.success);
                            trObj.parents("tr").remove();
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    }
                });
            }

        });
    });
</script>
<script>
    function changestatus(genre_id, active) {
        if (active === 1) {
            $("#status" + genre_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + genre_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        } else {
            $("#status" + genre_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + genre_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/movie_genres/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'genre_id': genre_id
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