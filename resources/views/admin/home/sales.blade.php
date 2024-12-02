<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.today_money')</p>
                            <h5 class="font-weight-bolder">
                                {!! number_format($sum_today,0,",",".") !!} Vnđ
                            </h5>
                            <p class="mb-0">
                                <span class="text-info text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.new_clients')</p>
                            <h5 class="font-weight-bolder">
                                {!! count($user) !!}
                            </h5>
                            <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.total_ticket')</p>
                            <h5 class="font-weight-bolder">
                                {!! $ticket_seat !!}
                            </h5>
                            <span class="text-danger text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($year)) !!}
                                    | {!! date("d-m-Y",strtotime($now)) !!}</span>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.total_revenue')</p>
                            <h5 class="font-weight-bolder">
                                {!! number_format($sum,0,",",".") !!} Vnđ
                            </h5>
                            <p class="mb-0">
                                <span class="text-warning text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($year)) !!}
                                    | {!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
