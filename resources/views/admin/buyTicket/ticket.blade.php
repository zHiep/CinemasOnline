@extends('admin.layout.index')
@section('css')
    .vnpay-red {
    color: #e50019;
    font-weight: 700;
    }
    .vnpay-blue {
    color: #004a9c;
    font-weight: 700;
    }
    .vnpay-logo>sup {
    line-height: 1;
    font-size: 60%;
    top: -1em;
    }
    .vnpay-red {
    color: #e50019;
    font-weight: 700;
    }
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                bán vé
                <a class="btn btn-danger float-end" href="admin/buyTicket">Hủy</a>
            </div>

            <div class="card-body pt-2">
                <div class="row">
                    {{--Thông tin vé--}}
                    <div class="col-12 col-lg-3 fixed-start">
                        <h4>@lang('lang.ticket_information')</h4>
                        <div id="ticket_info" class="card mb-3 bg-dark text-light px-0 sticky-top">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-12 d-flex justify-content-center">
                                    @if(strstr($movie->image,"https") == "")
                                        <img class="img p-3 w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                             src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $movie->image }}.jpg">
                                    @else
                                        <img class="img p-3 w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                             src="{{ $movie->image }}">
                                    @endif
                                </div>
                                <div class="col-12 col-md-9 col-lg-12">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->name }}</h5>
                                        <ul class="list-group">
                                            <li class="list-group-item bg-transparent text-light border-0">
                                                @lang('lang.showtime_web'):
                                                <strong class="ps-2">
                                                    {{ date('d/m/Y', strtotime($schedule->date)).' '.date('H:i', strtotime($schedule->startTime)) }}
                                                </strong>
                                            </li>
                                            <li class="list-group-item bg-transparent text-light border-0">
                                                @lang('lang.theater'): <strong class="ps-2">{{ $room->theater->name }}</strong>
                                            </li>
                                            <li class="list-group-item bg-transparent text-light border-0">
                                                @lang('lang.room'): <strong class="ps-2">{{ $room->name }}</strong>
                                            </li>
                                            <li class="list-group-item bg-transparent text-light border-0">
                                                @lang('lang.rated'): <strong class="ps-2">
                                        <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                            @elseif($movie->rating->name == 'C16') bg-warning
                                                            @elseif($movie->rating->name == 'P') bg-success
                                                            @elseif($movie->rating->name == 'P') bg-primary
                                                            @else bg-info
                                                            @endif me-1">
                                            {{ $movie->rating->name }}
                                        </span> - {{ $movie->rating->description }}
                                                </strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background: #2e292e;">
                                <div class="d-flex flex-column">
                                    <div class="d-flex text-light p-2">
                                        <span class="flex-shrink-0"><i class="fa-solid fa-popcorn"></i>&numsp;Combo:</span>
                                        <div id="ticket_combos" class="flex-grow-1 text-end d-flex flex-column"></div>
                                    </div>
                                    <div class="d-flex text-light p-2">
                                    <span class="flex-shrink-0">
                                        <i class="fa-solid fa-seat-airline text-uppercase"></i>&numsp;@lang('lang.seat'):
                                    </span>
                                        <div id="ticket_seats" class="flex-grow-1 justify-content-end d-flex"></div>
                                    </div>
                                    <div class="d-flex text-light p-2">
                                        <span class="flex-shrink-0"><i class="fa-solid fa-equals"></i>&numsp;@lang('lang.total_price'):</span>
                                        <div class="flex-grow-1 text-end .ticketTotal"><span id="ticketSeat_totalPrice"></span> đ</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--Chọn Ghế/Combo/Thanh toán--}}
                    <div class="col-12 col-lg-9">
                        {{--Process bar--}}
                        <ul class="nav justify-content-around fw-bold">
                            <li class="nav-item">
                                <a class="nav-link active text-warning"
                                   href="#Seats"
                                   aria-controls="seat"
                                   aria-expanded="true"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#Seats">1. @lang('lang.choose_seat')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled text-secondary" href="#Combos">2. @lang('lang.choose_combo')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled text-secondary" href="#Payment">3. @lang('lang.payment')</a>
                            </li>
                        </ul>
                        <div class="progress" role="progressbar" aria-label="Example 1px high" aria-valuenow="10" aria-valuemin="0"
                             aria-valuemax="30" style="height: 2px">
                            <div class="progress-bar bg-warning" style="width: 34%"></div>
                        </div>
                        {{--Process bar : end--}}

                        <div id="mainTicket">
                            {{--Ghế ngồi--}}
                            <div id="Seats" class="collapse show" data-bs-parent="#mainTicket">
                                <h4 class="mt-5">@lang('lang.choose_seat')</h4>
                                <div class="container-fluid py-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <div class="card-header pb-0">
                                                    <h6>{{$room->name}}</h6>
                                                </div>
                                                <div class="card-body px-0 pt-0 pb-2">
                                                    {{--Giá vé--}}
                                                    <div class="d-flex container my-3 justify-content-center">
                                                        <ul class="list-group list-group-horizontal">
                                                            <li class="list-group-item border-0">
                                                                <strong>@lang('lang.ticket_price'):</strong>
                                                            </li>
                                                            @foreach($seatTypes as $seatType)
                                                                <li class="list-group-item border-0">
                                                                    <div class="d-flex">
                                                                        <div class="d-inline-block me-2"
                                                                             style="width: 24px; height: 24px; background-color: {{ $seatType->color }}">
                                                                        </div>
                                                                        {{ number_format($seatType->surcharge+$price+$room->roomType->surcharge) }} đ
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="vr"></div>
                                                        <ul class="list-group list-group-horizontal">
                                                            <li class="list-group-item border-0">
                                                                <div class="d-flex">
                                                                    <div class="d-inline-block me-2 text-center"
                                                                         style="width: 24px; height: 24px; background-color: #dc3545">
                                                                        <i class="fa-solid text-light fa-check"></i>
                                                                    </div>
                                                                    Ghế đang chọn
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item border-0">
                                                                <div class="d-flex">
                                                                    <div class="d-inline-block me-2"
                                                                         style="width: 24px; height: 24px; background-color: #c3c3c3">
                                                                    </div>
                                                                    Ghế đã bán
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item border-0">
                                                                <div class="d-flex">
                                                                    <div class="d-inline-block me-2 text-center text-dark"
                                                                         style="width: 24px; height: 24px; background-color: #cccccc">
                                                                        X
                                                                    </div>
                                                                    Ghế bảo trì
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="d-block overflow-x-auto text-center">
                                                        <div class="d-inline-block flex-nowrap mt-2 my-auto mb-4 text-center justify-content-center">
                                                            {{--Màn hình--}}
                                                            @lang('lang.screen')
                                                            <div class="row bg-dark mx-auto" style="height: 2px; max-width: 540px"></div>
                                                            <div class="row d-block m-2" style="margin: 2px">
                                                                <div class="d-flex flex-nowrap align-middle my-0 mx-1 py-1 px-0 disabled"
                                                                     style="width: 30px; height: 30px; line-height: 22px; font-size: 10px">
                                                                </div>
                                                            </div>

                                                            {{--Ghế--}}
                                                            @foreach($room->rows as $row)
                                                                <div class="row d-flex flex-nowrap" id="Row_{{ $row->row }}" style="margin: 2px">
                                                                    @foreach($room->seats as $seat)
                                                                        @if($seat->row == $row->row)
                                                                            @for($m = 0; $m < $seat->ms; $m++)
                                                                                <div class="seat d-inline-block align-middle disabled seat_empty"
                                                                                     style="width: 30px; height: 30px; margin: 2px 0;" choice="empty"></div>
                                                                            @endfor
                                                                            @if($seat->status == 1)
                                                                                <div class="seat d-inline-block mx-1 align-middle py-1 px-0 seat_enable"
                                                                                     id="Seat_{{ $seat->row.$seat->col}}"
                                                                                     choice="0"
                                                                                     style="background-color: {{ $seat->seatType->color }}; cursor: pointer; width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"
                                                                                     onclick="seatChoice('{{$seat->row}}', {{$seat->col}},{{$seat->seatType->surcharge + $room->roomType->surcharge + $price}})">
                                                                                    {{$seat->row.$seat->col }}
                                                                                </div>
                                                                            @else
                                                                                <div class="seat d-inline-block align-middle py-1 px-0 text-dark disabled"
                                                                                     style="background-color: #cccccc; width: 30px; height: 30px;
                                                                             line-height: 22px; font-size: 10px; margin: 2px 0;" choice="1">
                                                                                    X
                                                                                </div>
                                                                            @endif
                                                                            @for($n = 0; $n < $seat->me; $n++)
                                                                                <div class="seat d-inline-block align-middle disabled seat_empty"
                                                                                     style="width: 30px; height: 30px; margin: 2px 0;" choice="empty"></div>
                                                                            @endfor
                                                                        @endif
                                                                    @endforeach
                                                                    @for($m = 0; $m < $row->mb; $m++)
                                                                        <div class="row d-flex flex-nowrap" style="margin: 2px">
                                                                            <div class="d-inline-block align-middle disabled seat_empty"
                                                                                 style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                                        </div>
                                                                    @endfor
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start w-50 ms-2 mt-4 float-end">
                                    <button class="btn btn-warning text-decoration-underline text-center btn_next">
                                        @lang('lang.next') <i class="fa-solid fa-angle-right"></i>
                                    </button>
                                    <button
                                        id="seatChoiceNext"
                                        aria-expanded="false"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#Combos"
                                        class="d-none"></button>
                                </div>
                            </div>

                            {{--Combo--}}
                            <div id="Combos" class="mt-5 collapse" data-bs-parent="#mainTicket">
                                <h4>@lang('lang.choose_combo')</h4>
                                <div class="row g-2 mt-2 row-cols-2" data-bs-parent="#mainContent">
                                    @foreach($combos as $combo)
                                        <!-- Combo -->
                                        <div class="col">
                                            <div class="card px-0 overflow-hidden" id="Combo_{{$combo->id}}"
                                                 style="background: #f5f5f5">
                                                <div class="row g-0">
                                                    <div class="col-lg-4 col-12">
                                                        @if(strstr($combo->image,"https") == "")
                                                            <img class="img-fluid w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                                                 src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $combo->image }}.jpg">
                                                        @else
                                                            <img class="img-fluid w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                                                 src="{{ $combo->image }}">
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-8 col-12">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-dark">{{ $combo->name }}</h5>
                                                            <p class="card-text text-dark">
                                                                @foreach($combo->foods as $food)
                                                                    @if($loop->first)
                                                                        {{ $food->pivot->quantity . ' ' . $food->name }}
                                                                    @else
                                                                        + {{ $food->pivot->quantity . ' ' . $food->name }}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p class="card-text">Giá: <span class="fw-bold">{{ number_format($combo->price) }} đ</span></p>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="input-group">
                                                                <button class="btn mb-0 minus_combo disabled" type="button"
                                                                        onclick="minusCombo({{$combo->id}}, {{$combo->price}}, '{{ $combo->name }}')">
                                                                    <i class="fa-solid fa-circle-minus"></i>
                                                                </button>
                                                                <input type="number" class="form-control input_combo"
                                                                       name="combo[{{$combo->id}}]" value="0"
                                                                       readonly min="0"
                                                                       style="max-width: 80px" aria-label="">
                                                                <button class="btn mb-0 plus_combo" type="button"
                                                                        onclick="plusCombo({{$combo->id}}, {{$combo->price}}, '{{ $combo->name }}')">
                                                                    <i class="fa-solid fa-circle-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Combo: end -->
                                    @endforeach
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button id="comboBack" class="btn btn-warning mx-2 text-decoration-underline text-center btn_back"
                                            onclick="comboBack()"
                                            aria-expanded="false"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#Seats"
                                    ><i class="fa-solid fa-angle-left"></i> @lang('lang.previous')
                                    </button>

                                    <button class="btn btn-warning mx-2  text-decoration-underline text-center btn_next"
                                            onclick="comboNext()"
                                            aria-controls="Payment"
                                            aria-expanded="false"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#Payment"
                                    >@lang('lang.next') <i class="fa-solid fa-angle-right"></i></button>
                                </div>
                            </div>

                            {{--Thanh toán--}}
                            <div id="Payment" class="mt-5 collapse" data-bs-parent="#mainTicket">
                                {{--                <div>--}}
                                {{--                    <h4>@lang('lang.discount')</h4>--}}
                                {{--                    <div class="row row-cols-1 row-cols-md-2"--}}
                                {{--                         data-bs-parent="#mainContent">--}}
                                {{--                        <div class="input-group">--}}
                                {{--                            <input type="text" name="discount" class="form-control border-dark" id="discount"--}}
                                {{--                                   aria-label="">--}}
                                {{--                            <button class="btn btn-danger">@lang('lang.apply')</button>--}}
                                {{--                        </div>--}}
                                {{--                    </div>--}}
                                {{--                </div>--}}

                                <h4 class="mt-4">@lang('lang.payment')</h4>
                                <form id="paymentForm" action="admin/buyTicket/createPayment" method="post">
                                    @csrf
                                    <div class="bg-dark-subtle p-5">
                                        <div class="row row-cols-1" data-bs-parent="#mainContent">
                                            <div class="col">
                                                <div class="content-container">
                                                    <div id="barcode-scanner-button" class="btn">@lang('lang.barcode_scanner')</div>
                                                </div>
                                                <div id="barcode-scanner-controller" class="controller">
                                                    <nav class="navbar navbar-dark">
                                                        <div class="navbar-brand mb-0 h3">
                                                            <span id="back-button">&#8249; @lang('lang.barcode_scanner')</span>

                                                        </div>
                                                        <div class="spacer"></div>
                                                        <div class="camera-button-container h3">
{{--                                                            <span id="camera-swap-button">&#8645;</span>--}}
                                                            <span id="camera-switch-button">&#8646;</span>
                                                        </div>
                                                    </nav>
                                                    <div id="barcode-scanner-container" class="view-controller-container">
                                                        <div class="web-sdk-progress-bar"></div>
                                                    </div>
                                                    <div class="action-bar">
                                                        <div class="barcode-result-container"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="userId" class="form-control-label">Mã khách hàng</label>
                                                    <input id="userId" class="form-control" name="userCode" type="number" value="">
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <td>Tên</td>
                                                        <td>điểm</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td id="username"></td>
                                                        <td id="userPoint"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <div class="form-group">
                                                    <label for="point" class="form-control-label">Điểm khách hàng</label>
                                                    <input id="point" class="form-control disabled" readonly
                                                           min="20000" name="point" type="number" placeholder="0">
                                                    <p class="text-danger" id="point-validate"></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="bg-light p-4" id="bankCode">
                                                    <div class="form-check mb-3">
                                                        <input id="bankCode1" class="btn-check" type="radio" name="bankCode" value="VNPAYQR"
                                                               aria-label="">
                                                        <label for="bankCode1"
                                                               class="custom-control-label btn btn-outline-primary fw-semibold fs-4 w-100 text-start
                                                               text-dark">
                                                            Thanh toán bằng ứng dụng hỗ trợ
                                                            <span class="vnpay-logo">
                                                            <span class="vnpay-red">VN</span><span class="vnpay-blue">PAY</span><sup class="vnpay-red">QR</sup></span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-3">
                                                        <input id="bankCode4" class="btn-check" type="radio" name="bankCode" value="MONEY"
                                                               aria-label="" checked>
                                                        <label for="bankCode4"
                                                               class="custom-control-label btn btn-outline-primary fw-semibold fs-4 w-100
                                                               text-start text-dark">
                                                            Thanh toán tiền mặt
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="amount" name="amount">
                                                <input type="hidden" id="language" name="language" value="@lang('lang.language')">
                                                <input type="hidden" id="timePayment" name="time" value="">
                                                <input type="hidden" id="ticket_id" name="ticket_id" value="">
                                                <input type="hidden" name="userCode" id="userCode">
                                                <input type="hidden" name="point" class="point2">
                                            </div>

                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="button" class="btn btn-warning mx-2 text-decoration-underline text-center"
                                                onclick="paymentBack()"
                                                aria-expanded="true"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#Combos">
                                            <i class="fa-solid fa-angle-left"></i> @lang('lang.previous')
                                        </button>
                                        <button type="button" onclick="paymentNext()"
                                                class="btn btn-warning mx-2 text-decoration-underline text-uppercase text-center">
                                            Đặt vé <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="btn_money" type="button" class="btn bg-gradient-primary d-none" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-toggle="modal"
            data-bs-target="#handleMoney">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="handleMoney" tabindex="-1" role="dialog" aria-labelledby="handleMoneyLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="handleMoneyLabel">Thanh toán</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="moneyPayment" action="/admin/buyTicket/handleResult" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total" class="form-control-label">Tổng tiền vé</label>
                        <input id="total" class="form-control" name="total" type="number" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="moneyIn" class="form-control-label">Khách đưa</label>
                        <input id="moneyIn" class="form-control" type="number" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="moneyOut" class="form-control-label">Trả khách</label>
                        <input id="moneyOut" class="form-control" type="number"  placeholder="0" readonly>
                    </div>
                    <input type="hidden" name="vnp_BankCode" value="MONEY">
                    <input type="hidden" name="ticket_id" id="ticketMoney">
                    <input type="hidden" name="userCode" id="userCode2">
                    <input type="hidden" name="point" class="point2">
                    <input type="hidden" name="type" value="ticket">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="btnMoneyPayment()" class="btn bg-gradient-primary">Thanh toán</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $i = 0;
        $iCombo = 0;
        let $arrSeatHtml = [];
        let $ticket_seats = {};
        let $ticket_combos = {};
        let $ticket_id = -1;
        let $sum = 0;
        let $holdState = false;

        $(document).ready(() => {

            seatChoice = (row, col, price) => {
                var $seatCurrent = $('#Seats').find('#Seat_' + row + col);
                var choice = parseInt($seatCurrent.attr('choice'));
                if (choice === 1) {
                    $i--;
                    $seatCurrent.replaceWith($arrSeatHtml[row + col]);
                    $(`#ticketSeat_${row + col}`).remove();
                    $sum -= price;
                    $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));
                    delete $ticket_seats[row + col];
                } else {
                    $i++;
                    // Gới hạn chọn ghế
                    // if ($i >= 8) {
                    //     alert('chọn tối đa 8 ghế');
                    //     return;
                    // }

                    $arrSeatHtml[row + col] = $seatCurrent.clone();
                    $seatCurrent.replaceWith(`<div class="seat d-inline-block mx-1 align-middle py-1 px-0 seat_enable"
                        id="Seat_${row + col}" choice="1" onclick="seatChoice('${row}', ${col}, ${price})"
                        style="background-color: #dc3545; cursor: pointer; width: 30px; height: 30px; line-height: 22px; font-size: 10px;
                        margin: 2px 0;"><i class="fa-solid text-light fa-check"></i>
                        </div>`)

                    $('#ticket_seats').append(`<p id="ticketSeat_${row + col}">${row + col}, </p>`);
                    $ticket_seats[row + col] = [row, col, price];
                    $sum += price;
                    $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));

                }
            }

            checkSeats = () => {
                $seats = $('#Seats').find('.seat');
                for (let i = 0; i < $seats.length; i++) {
                    if ($seats[i].getAttribute('choice') === '1') {
                        seatLeft1 = $seats[i-1].getAttribute('choice');
                        seatRight1 = $seats[i+1].getAttribute('choice');
                        seatLeft2 = $seats[i-2].getAttribute('choice');
                        seatRight2 = $seats[i+2].getAttribute('choice');
                        if ($i >= 2) {
                            if(seatLeft1 === '0' && seatRight1 === '0') {
                                alert('Không để cách 1 ghế trống kế bên');
                                return false;
                            }
                            // if ((seatLeft2 === 'empty' && seatLeft1 === '0') && (seatRight1 === '1' && seatRight2 === '0')) {
                            //     return true;
                            // }
                        } else {
                            if((seatLeft2 === false && seatLeft1 === '0') || (seatRight2 === false && seatRight1 === '0')) {
                                alert('Không để trống ghế ngoài cùng');
                                return false;
                            }
                        }
                        // console.log(seatLeft2 + ' ' + seatLeft1 + ' <> ' + seatRight1 + ' ' + seatRight2);
                        if ((seatLeft2 === '1' && seatLeft1 === '0') || (seatRight1 === '0' && seatRight2 === '1' )) {
                            alert('Không để ghế trống kế bên');
                            return false;
                        }
                        if((seatLeft2 === 'empty' && seatLeft1 === '0') || (seatRight2 === 'empty' && seatRight1 === '0')) {
                            alert('Không để ghế ngoài cùng');
                            return false;
                        }
                    }
                }
                return true;
            }

            $('#Seats').on('click', '.btn_next', (e) => {

                if (!checkSeats()) {
                    return;
                }
                $('#seatChoiceNext').click();
                if ($i !== 0) {
                    // $('#timer').remove();
                    // $('#ticket_info').append(`<div class="card-footer" style="background: #2e292e;"><div id="timer"
                    //  class="d-block bg-light text-dark text-center fs-2 m-3"
                    //  style="width: 200px; height: 100px; line-height:100px">
                    //    </div></div>`)
                    // var fiveMinutes = 60 * 10;
                    // display = document.querySelector('#timer');
                    // startTimer(fiveMinutes, display, $countdown);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/tickets/create",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'ticketSeats': $ticket_seats,
                            'schedule': {{$schedule->id}},
                        },
                        statusCode: {
                            200: function (data) {
                                $ticket_id = data.ticket_id;
                            },
                            401: function () {
                                alert("Ghế đã được đặt!!!");
                                window.location.reload();
                            }
                        }

                    });
                } else {
                    window.location.reload();
                    alert('Bạn chưa chọn ghế!!!');
                }
            })

            comboBack = () => {
                // $('#timer').remove();
                // clearInterval($countdown.interval);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/tickets/delete",
                    type: 'DELETE',
                    data: {
                        'ticket_id': $ticket_id,
                    },
                });
            }

            comboNext = () => {
                $('#point').attr('max', $sum * 90 / 100);
                $('#amount').val($sum);
                $('#ticket_id').val($ticket_id);
                $('#total').val($sum);
                $check = jQuery.isEmptyObject($ticket_combos);
                if (!$check) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/tickets/combo/create",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'ticket_id': $ticket_id,
                            'ticketCombos': $ticket_combos,
                        },
                        statusCode: {
                            200: function (data) {
                            }
                        }
                    });
                }
            }

            plusCombo = (id, price, comboName) => {
                $iCombo++;
                $inputCombo = $('#Combo_' + id).find('.input_combo');
                $inputCombo.val(parseInt($inputCombo.val()) + 1);
                // if ($inputCombo.val() === '4') {
                //     $inputCombo.parent().find('.plus_combo').addClass('disabled');
                //     return;
                // }
                $inputCombo.parent().find('.minus_combo').removeClass('disabled');
                if (parseInt($inputCombo.val()) === 1)
                    $('#ticket_combos').append(`<p id="ticketCombo_${id}">${comboName} x ${parseInt($inputCombo.val())}</p>`);
                else
                    $(`#ticketCombo_${id}`).replaceWith(`<p id="ticketCombo_${id}">${comboName} x ${parseInt($inputCombo.val())}</p>`);
                $sum += price;
                $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));
                $ticket_combos[id] = [id, parseInt($inputCombo.val())];
            }

            minusCombo = (id, price, comboName) => {
                if ($iCombo !== 0) {
                    $iCombo--;
                } else {
                    $inputCombo.parent().find('.minus_combo').addClass('disabled');
                    return;
                }
                $inputCombo = $('#Combo_' + id).find('.input_combo');
                $inputCombo.val(parseInt($inputCombo.val()) - 1);
                $inputCombo.parent().find('.plus_combo').removeClass('disabled');
                if (parseInt($inputCombo.val()) === 0) {
                    $(`#ticketCombo_${id}`).remove();
                } else {
                    $(`#ticketCombo_${id}`).replaceWith(`<p id="ticketCombo_${id}">${comboName} x ${parseInt($inputCombo.val())}</p>`);
                }
                $sum -= price;
                $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));
                if (parseInt($inputCombo.val()) === 0) {
                    delete $ticket_combos[id];
                } else {
                    $ticket_combos[id] = [id, parseInt($inputCombo.val())];
                }
            }

            paymentNext = () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/buyTicket/ticketPayment",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ticket_id': $ticket_id,
                        'totalPrice': $sum,
                        'userCode': $('#userId').val(),
                    },
                    statusCode: {
                        200: () => {
                            $holdState = true;
                            $bankCode = $(`input[name="bankCode"]:checked`).val();
                            if ($bankCode !== 'MONEY') {
                                if ($ticket_id !== -1) {
                                    $('#ticket_id').val($ticket_id);
                                    $("#paymentForm").trigger("submit");
                                }
                            } else {
                                $('#ticketMoney').val($ticket_id);
                                $('#btn_money').click();
                            }
                        }
                    }
                });
            }

            paymentBack = () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/tickets/combo/delete",
                    type: 'DELETE',
                    data: {
                        'ticket_id': $ticket_id,
                    },
                });
            }

            if (window.history && window.history.pushState) {

                window.history.pushState('forward', null, './admin/buyTicket/' + {{$schedule->id}});

                $(window).on('popstate', function() { //here you know that the back button is pressed
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/tickets/delete",
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            'ticket_id': $ticket_id,
                        },
                    });
                    window.location.replace('/admin/buyTicket/');
                });

            }

            window.addEventListener('beforeunload', () => {
                if (!$holdState) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/tickets/delete",
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            'ticket_id': $ticket_id,
                        },
                    });
                }
            })

            $('#userId').bind('keyup', () => {
                $code = $('#userId').val();
                console.log($code);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/buyTicket/scanBC",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'code': $code,
                    },
                    statusCode: {
                        200: (data) => {
                            $('#username').text(data.username);
                            $('#userPoint').text(data.userPoint);
                            $('#userCode').val(data.userId);
                            $('#userCode2').val(data.userId);
                            if ($('.table').find('#username').text() === '') {
                                $('#point').attr('readonly', true);
                            } else {
                                if (parseInt($('#userPoint').text()) >= 20000) {
                                    $('#point').attr('readonly', false);
                                }
                            }
                        },
                        500: () => {
                            $('#username').text('');
                            $('#userPoint').text('');
                        }

                    }
                });
            })

            $('#moneyIn').bind('keyup', (e) => {
                $sum3 = $('#total').val();
                $moneyOut = parseInt($('#moneyIn').val()) - $sum3;
                $('#moneyOut').val($moneyOut);
            })

            $('#point').bind('keyup', (e) => {
                $point = $('#point').val();
                $userPoint = parseInt($('#userPoint').text());
                if ($point > $userPoint) {
                    alert('Điểm của khách hàng không đủ');
                    return
                }
                if ($point < 20000) {
                    $('#point-validate').text('Sử dụng tối thiểu 20.000 điểm');
                    return
                } else {
                    $('#point-validate').text('');
                }
                if($point > ($sum * 90 / 100)) {
                    alert('Không sử dụng điểm quá 90% tổng tiền hóa đơn');
                    $point = $sum * 90 /100;
                    $('#point').val($point);
                }
                $sum2 = $sum - $point;
                $('#ticketSeat_totalPrice').text($sum2.toLocaleString('vi-VN'));
                $('.point2').val($point);
                $('#amount').val($sum2);
                $('#total').val($sum2);
            })

            btnMoneyPayment = () => {
                moneyOut = parseInt($('#moneyOut').val());
                if (moneyOut >= 0) {
                    $('#moneyPayment').submit();
                } else {
                    Swal.fire({
                        title: 'chưa đủ tiền thanh toán',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    })
                }
            }


            @foreach($room->seats as $seat)
            @if($seat->status == 1)
            @foreach($tickets as $ticket)
            @foreach($ticket->ticketSeats as $ticketSeat)
            @if($seat->row == $ticketSeat->row && $seat->col == $ticketSeat->col)
            $('#Seats').find('#Seat_{{$seat->row.$seat->col}}').replaceWith(`<div class="d-inline-block mx-1 align-middle py-1 px-0  text-dark
            disabled" choice="1" style="background-color: #c3c3c3; width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;">
                                {{ $seat->row.$seat->col }}
            </div>`)
            @endif
            @endforeach
            @endforeach
            @endif
            @endforeach



        })

        let results = [];
        let scanbotSDK, barcodeScanner;

        class Config {
            static license() {
                return "";
            }
            static barcodeScannerContainerId() {
                return "barcode-scanner-container";
            }
        }

        window.onresize = () => {
            this.resizeContent();
        };

        window.onload = async () => {
            this.resizeContent();

            scanbotSDK = await ScanbotSDK.initialize({ licenseKey: Config.license() });

            $("#barcode-scanner-button").on('click', async (e) => {
                $("#barcode-scanner-controller").addClass('d-block');

                const barcodeFormats = [
                    "AZTEC",
                    "CODABAR",
                    "CODE_39",
                    "CODE_93",
                    "CODE_128",
                    "DATA_MATRIX",
                    "EAN_8",
                    "EAN_13",
                    "ITF",
                    "MAXICODE",
                    "PDF_417",
                    "QR_CODE",
                    "RSS_14",
                    "RSS_EXPANDED",
                    "UPC_A",
                    "UPC_E",
                    "UPC_EAN_EXTENSION",
                    "MSI_PLESSEY",
                ];

                const config = {
                    containerId: Config.barcodeScannerContainerId(),
                    style: {
                        window: {
                            borderColor: "blue"
                        },
                        text: {
                            color: "red",
                            weight: 500
                        }
                    },
                    onBarcodesDetected: onBarcodesDetected,
                    returnBarcodeImage: true,
                    onError: onScannerError,
                    barcodeFormats: barcodeFormats,
                    preferredCamera: 'DroidCam Source 2'
                };

                try {
                    barcodeScanner = await scanbotSDK.createBarcodeScanner(config);
                } catch (e) {
                    console.log(e.name + ': ' + e.message);
                    alert(e.name + ': ' + e.message);
                    $("#barcode-scanner-controller").addClass("d-none");
                }
            });

            $('#back-button').on('click', async (e) => {
                const controller =
                    e.target.parentElement.parentElement.parentElement.className;
                $('.controller').style = "display:none";
                barcodeScanner.dispose();
                barcodeScanner = undefined;
            })

            $("#camera-swap-button").on('click', async (e) => {
                barcodeScanner.swapCameraFacing(true);
            });

            $("#camera-switch-button").on('click' ,async (e) => {
                onCameraSwitch(barcodeScanner);
            });
        }

        async function onBarcodesDetected(e) {
            let text = "";
            e.barcodes.forEach((barcode) => {
                $('#userId').val(barcode.text);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/buyTicket/scanBC",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'code': barcode.text,
                    },
                    statusCode: {
                        200: (data) => {
                            $('#username').text(data.username);
                            $('#userPoint').text(data.userPoint);
                            $('#userCode').val(data.userId);
                            $('#userCode2').val(data.userId);
                            if ($('.table').find('#username').text() === '') {
                                $('#point').attr('readonly', true);
                            } else {
                                $('#point').attr('readonly', false);
                            }
                        },
                        500: () => {
                            $('#username').text('');
                            $('#userPoint').text('');
                        }

                    }
                });
            });

            let result;
            if (e.barcodes[0].barcodeImage) {
                result = await scanbotSDK.toDataUrl(e.barcodes[0].barcodeImage);
            }

            Toastify({ text: text.slice(0, -1), duration: 10000, avatar: result }).showToast();
        }

        async function onCameraSwitch(scanner) {
            const cameras = await scanner?.fetchAvailableCameras()
            if (cameras) {
                const currentCameraInfo = scanner?.getActiveCameraInfo();
                if (currentCameraInfo) {
                    const cameraIndex = cameras.findIndex((cameraInfo) => { return cameraInfo.deviceId == currentCameraInfo.deviceId });
                    const newCameraIndex = (cameraIndex + 1) % (cameras.length);
                    alert(`Current camera: ${currentCameraInfo.label}.\nSwitching to: ${cameras[newCameraIndex].label}`)
                    scanner?.switchCamera(cameras[newCameraIndex].deviceId);
                }
            }
        }

        async function onScannerError(e) {
            console.log("Error:", e);
            alert(e.name + ': ' + e.message);
        }

        async function addAllPagesTo(generator) {
            for (let i = 0; i < results.length; i++) {
                const result = results[i];
                await generator.addPage(Utils.imageToDisplay(result));
            }
        }

        function resizeContent() {
            const height = document.body.offsetHeight - (50 + 59);
            const controllers = document.getElementsByClassName("controller");

            for (let i = 0; i < controllers.length; i++) {
                const controller = controllers[i];
                controller.style.height = height;
            }
        }
    </script>
@endsection
