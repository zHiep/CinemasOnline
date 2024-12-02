@extends('admin.layout.index')
@section('content')
@can('movies')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="/admin/info/" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">@lang('lang.information')</p>
                            <button type="submit" class="btn bg-gradient-primary btn-sm ms-auto">@lang('lang.submit')</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group file-uploader">
                                    <label for="movieImage">@lang('lang.image')</label>
                                    <input id="movieImage" type="file" name="Image" class="form-control image-movie">
                                    <img style="width: 300px" 
                                    @if(isset($info['logo'])) 
                                    src="images/favicon/{{$info['logo']}}" 
                                    @else src="" 
                                    @endif class="img_movie" alt="user1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="showTime">@lang('lang.name')</label>
                                    <input id="showTime" class="form-control" value="{{$info['name']}}" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="showTime">@lang('lang.phone')</label>
                                    <input id="showTime" class="form-control" value="{{$info['phone']}}" name="phone" type="number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="showTime">Email</label>
                                    <input id="showTime" class="form-control" value="{{$info['email']}}" name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="showTime">Facebook</label>
                                    <input id="showTime" class="form-control" value="{{$info['facebook']}}" name="facebook" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="showTime">Twitter</label>
                                    <input id="showTime" class="form-control" value="{{$info['twitter']}}" name="twitter" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="showTime">Instagram</label>
                                    <input id="showTime" class="form-control" value="{{$info['instagram']}}" name="instagram" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="showTime">Youtube</label>
                                    <input id="showTime" class="form-control" value="{{$info['youtube']}}" name="youtube" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="showTime">@lang('lang.worktime')</label>
                                    <input id="showTime" class="form-control" value="{{$info['worktime']}}" name="worktime" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="showTime">Copyright</label>
                                    <input id="showTime" class="form-control" value="{{$info['copyright']}}" name="copyright" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.file-uploader .img_movie').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".image-movie").change(function() {
        readURL(this);
    });
</script>
@endsection