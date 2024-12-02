@extends('admin.layout.index')
@section('content')
@can('events')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>@lang('lang.news')</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <a style="float:right;padding-right:30px;" class="text-light">
                            <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#news">@lang('lang.create')</button>
                        </a>
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.title')</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.image')</th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.content')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.staff')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.created_at')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.updated_at')</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $value)
                                <tr>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm " style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['title'] !!}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(strstr($value['image'],"https") == "")
                                        <img style="width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg" alt="user1">
                                        @else
                                        <img style="width: 300px" src="{!! $value['image'] !!}" alt="user1">
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm ">
                                        <span class="mb-0 text-sm " style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['content'] !!}</span>
                                    </td>

                                    <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm">
                                        @if($value->status == 1)

                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},0)">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </a>

                                        @else
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},1)">
                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['users']['fullName'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['created_at'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['updated_at'] !!}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#editNews" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit news" data-bs-target="#editNews{!! $value['id'] !!}" data-bs-toggle="modal">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:void(0)" data-url="{{ url('admin/news/delete', $value['id'] ) }}" class="text-secondary font-weight-bold text-xs delete-news" data-toggle="tooltip">
                                            <i class="fa-solid fa-trash-can fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.news.edit')
                                @endforeach
                                @include('admin.news.create')
                            </tbody>
                        </table>
                    </div>
                    <div id="paginate" class="d-flex justify-content-center mt-3">
                        {!! $news->links() !!}
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
        $('.delete-news').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Are you sure you want to remove it?") === true) {
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.file-uploader .img_news').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".image-news").change(function() {
        readURL(this);
    });
</script>
<script>
    function changestatus(news_id, active) {
        if (active === 1) {
            $("#status" + news_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + news_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        } else {
            $("#status" + news_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + news_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/news/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'news_id': news_id
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