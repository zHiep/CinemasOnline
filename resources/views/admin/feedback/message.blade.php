<div class="modal fade modal-md" id="feedback_message{!! $value['id'] !!}" tabindex="-1" aria-labelledby="feedback_message_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedback_message_title">@lang('lang.feedback')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                    <div class="flex-column d-flex justify-content-center text-center">
                                        <div>
                                            {!! $value['message'] !!}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

