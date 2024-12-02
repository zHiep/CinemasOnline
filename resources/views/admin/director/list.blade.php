@extends('admin.layout.index')
@section('content')
    @can('director')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.directors')</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#director">@lang('lang.create')
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.name')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.image')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.birthday')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.national')</th>
                                        <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.content')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($director as $value)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['name'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(strstr($value['image'],"https") == "")
                                                    <img style="width: 300px"
                                                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                                         alt="user1">
                                                @else
                                                    <img style="width: 300px"
                                                         src="{!! $value['image'] !!}" alt="user1">
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['birthday'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{!! $value['national'] !!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm ">
                                            <span class="mb-0 text-sm "
                                                  style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['content'] !!}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="#editDirector" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit director" data-bs-target="#editDirector{!! $value['id'] !!}"
                                                   data-bs-toggle="modal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-url="{{ url('admin/director/delete', $value['id'] ) }}"
                                                   class="text-secondary font-weight-bold text-xs delete-director" data-toggle="tooltip">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('admin.director.edit')
                                    @endforeach
                                    @include('admin.director.create')
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $director->links() !!}
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
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-director').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
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
                reader.onload = function (e) {
                    $('.file-uploader .img_direc').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-director").change(function () {
            readURL(this);
        });
    </script>
@endsection
