<div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between ">
                    <h6 class="mb-2">
                        @lang('lang.revenue_by_movie')
                    </h6>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#movie" class="float-end">Xem tất cả</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <tbody>
                        @foreach($movies->where('status', 1)->take(4) as $movie)
                        <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <p class="text-xs font-weight-bold mb-0">@lang('lang.movies')</p>
                                        <h6 class="text-sm mb-0">
                                            {{$movie['name']}}
                                        </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">@lang('lang.ticket_sold')</p>
                                    <h6 class="text-sm mb-0">
                                        {{$movie['ticketseats']}}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">@lang('lang.total_price')</p>
                                    <h6 class="text-sm mb-0">
                                        {{number_format($movie['totalPrice'],0,",",".")}} đ
                                    </h6>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">@lang('lang.revenue_by_theater')</h6>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#theater_modal" class="float-end">Xem tất cả</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <tbody>
                        @foreach($theaters->take(4) as $theater)
                        <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <p class="text-xs font-weight-bold mb-0">@lang('lang.theater')</p>
                                        <h6 class="text-sm mb-0">{!! $theater['name'] !!}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">@lang('lang.ticket_sold')</p>
                                    <h6 class="text-sm mb-0">
                                        {{$theater['ticketseats']}}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">@lang('lang.total_price')</p>
                                    <h6 class="text-sm mb-0">
                                        {{number_format($theater['totalPrice'],0,",",".")}} đ
                                    </h6>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.home.movie')
@include('admin.home.theater')