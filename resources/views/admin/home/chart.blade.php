
<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>@lang('lang.statistical')</h6>
            </div>
            <div class="card-body ms-8">
                <div class="row">
                        <div class="col-md-5">
                            <label for="start_time" class="form-control-label">@lang('lang.start_time')</label>
                            <div class="form-group" style="text-align:center">
                                <input name="start_time"  id="start_time" class="form-control datepicker" placeholder="Please select date" type="text">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="end_time"  class="form-control-label">@lang('lang.end_time')</label>
                            <div class="form-group" style="text-align:center">
                                <input name="end_time" id="end_time" value="{!! date("Y-m-d") !!}" class="form-control datepicker" placeholder="Please select date" type="text" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button  id="btn-statistical-filter" class="form-control">@lang('lang.submit')</button>
                            </div>
                        </div>

                    <div class="col-md-6">
                        <label for="statistical" class="form-control-label">@lang('lang.type_of_time')</label>
                        <div class="form-group" style="text-align:center">
                            <select id="statistical" style="width: 70%" class="statistical-filter form-control">
                                <option value="null" selected>Selected</option>
                                <option value="week" >@lang('lang.sort_by_7days')</option>
                                <option value="this_month">@lang('lang.sort_this_month')</option>
                                <option value="last_month">@lang('lang.sort_last_month')</option>
                                <option value="year">@lang('lang.sort_by_year')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="theater" class="form-control-label">@lang('lang.theater')</label>
                        <div class="form-group" style="text-align:center">
                            <select id="theater" style="width: 70%" class="statistical-sortby form-control">
                                <option value="null" selected>Selected</option>
                                <option value="ticket">Lọc theo vé</option>
                                <option value="theater">Lọc theo rạp</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div id="admin_chart" style="height: 300px; width: 100%" ></div>
</div>

