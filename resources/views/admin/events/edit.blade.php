<form action="admin/events/edit/{!! $value['id'] !!}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="editEvent{!! $value['id'] !!}" tabindex="-1" aria-labelledby="events_title" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="events_title">@lang('lang.events')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.title')</label>
                                    <input class="form-control" type="text" value="{!! $value['title'] !!}" name="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group file-uploader">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.image')</label>
                                    <input type='file' name='Image' class="form-control image-event">
                                    @if(strstr($value['image'],"https") == "")
                                        <img style="width: 300px"
                                             src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                             class="img_event"
                                             alt="user1">
                                    @else
                                        <img style="width: 300px"
                                             class="img_event"
                                             src="{!! $value['image'] !!}" alt="user1">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.content')</label>
                                    <textarea class="form-control" name="contents" id="editor">{!! $value['content'] !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.conditions')</label>
                                    <textarea class="form-control" name="conditions" id="conditions">{!! $value['conditions'] !!}</textarea>
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
