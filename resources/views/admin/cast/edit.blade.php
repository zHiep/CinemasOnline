<form action="admin/cast/edit/{!! $value['id'] !!}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="editCast{!! $value['id'] !!}" tabindex="-1" aria-labelledby="cast_title" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cast_title">{!! $value['name'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.name')</label>
                                    <input class="form-control" type="text" value="{!! $value['name'] !!}" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.national')</label>
                                    <input class="form-control" type="text" value="{!! $value['national'] !!}" name="national">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.birthday')</label>
                                    <input class="form-control" type="date" value="{!! $value['birthday'] !!}" name="birthday"
                                           min="1900-01-01" max="2100-01-01">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group file-uploader">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.image')</label>
                                    <input type='file' name='Image' class="form-control image-cast">
                                    @if(strstr($value['image'],"https") == "")
                                        <img style="width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                             class="img_cast" alt="user1">
                                    @else
                                        <img style="width: 300px"
                                             src="{!! $value['image'] !!}" class="img_cast" alt="user1">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="editor" class="form-control-label">@lang('lang.content')</label>
                                    <textarea class="form-control " name="contents" id="editor">{!! $value['content'] !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                </div>

            </div>
        </div>
    </div>
</form>
