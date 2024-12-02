<form action="admin/discount/edit/{!! $value['id'] !!}" method="POST">
    @csrf
    <div class="modal fade" id="editDiscount{!! $value['id'] !!}" tabindex="-1" aria-labelledby="discount_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discount_title">@lang('lang.code'): {!! $value['code'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">@lang('lang.name')</label>
                                    <input class="form-control" id="name" type="text" value="{!! $value['name'] !!}" name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">@lang('lang.code')</label>
                                    <input class="form-control" id="code" type="text" value="{!! $value['code'] !!}" name="code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="percent" class="form-control-label">@lang('lang.percent')</label>
                                    <input class="form-control" id="percent" type="number" value="{!! $value['percent'] !!}" name="percent">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity" class="form-control-label">@lang('lang.quantity')</label>
                                    <input class="form-control" id="quantity" type="number" value="{!! $value['quantity'] !!}" name="quantity" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-info">Save</button>
                </div>

            </div>
        </div>
    </div>
</form>
