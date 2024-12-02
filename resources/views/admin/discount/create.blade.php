<form action="admin/discount/create" method="POST" >
    @csrf
    <div class="modal fade" id="discount" tabindex="-1" aria-labelledby="discount_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discount_title">@lang('lang.discount')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">@lang('lang.name')</label>
                                    <input class="form-control" id="name" type="text" value="" name="name"
                                           placeholder="@lang('lang.type') @lang('lang.name')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">@lang('lang.code')</label>
                                    <input class="form-control" id="code" type="text" value="" name="code"
                                           placeholder="@lang('lang.type') @lang('lang.code')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="percent" class="form-control-label">@lang('lang.percent')</label>
                                    <input class="form-control" id="percent" type="number" value="" name="percent"
                                           placeholder="@lang('lang.type') @lang('lang.percent')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity" class="form-control-label">@lang('lang.quantity')</label>
                                    <input class="form-control" id="quantity" type="number" value="" name="quantity" placeholder="@lang('lang.type') @lang('lang.quantity')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn bg-gradient-info">@lang('lang.save')</button>
                </div>

            </div>
        </div>
    </div>
</form>
