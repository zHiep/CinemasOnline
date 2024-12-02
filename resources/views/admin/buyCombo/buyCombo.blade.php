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
                bán Combo
                <a class="btn btn-danger float-end" href="admin/buyCombo">Hủy</a>
            </div>

            <div class="card-body pt-2">
                <div class="row">
                    {{--Thông tin vé--}}
                    <div class="col-12 fixed-start">
                        <h4>@lang('lang.ticket_information')</h4>
                        <div id="ticket_info" class="card mb-3 bg-dark text-light px-0 sticky-top">
                            <div class="row">
                                <div class="col-12 col-md-9 col-lg-12">
                                    <div class="card-body">
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
                                        <span class="flex-shrink-0"><i class="fa-solid fa-equals"></i>&numsp;@lang('lang.total_price'):</span>
                                        <div class="flex-grow-1 text-end .ticketTotal"><span id="ticketSeat_totalPrice"></span> đ</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--Combo/Thanh toán--}}
                    <div class="col-12">
                        {{--Process bar--}}
                        <ul class="nav justify-content-around fw-bold">
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

                            {{--Combo--}}
                            <div id="Combos" class="mt-5 collapse show" data-bs-parent="#mainTicket">
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
                                                                <button class="btn mb-0 minus_combo disabled"
                                                                        onclick="minusCombo({{$combo->id}}, {{$combo->price}}, '{{ $combo->name }}')">
                                                                    <i class="fa-solid fa-circle-minus"></i>
                                                                </button>
                                                                <input type="number" class="form-control input_combo ps-3"
                                                                       name="combo[{{$combo->id}}]" value="0"
                                                                       readonly min="0"
                                                                       style="max-width: 80px" aria-label="">
                                                                <button class="btn mb-0 plus_combo"
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
                                    @foreach($foods as $food)
                                            <!-- Foods -->
                                            <div class="col">
                                                <div class="card px-0 overflow-hidden" id="Food_{{$food->id}}"
                                                     style="background: #f5f5f5">
                                                    <div class="row g-0">
                                                        <div class="col-lg-4 col-12">
                                                            @if(strstr($food->image,"https") == "")
                                                                <img class="img-fluid w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                                                     src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $food->image }}.jpg">
                                                            @else
                                                                <img class="img-fluid w-100" alt="..." style="max-height: 361px; max-width: 241px"
                                                                     src="{{ $food->image }}">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-8 col-12">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-dark">{{ $food->name }}</h5>
                                                                <p class="card-text">Giá: <span class="fw-bold">{{ number_format($food->price) }} đ</span></p>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="input-group">
                                                                    <button class="btn mb-0 minus_food disabled"
                                                                            onclick="minusFood({{$food->id}}, {{$food->price}}, '{{ $food->name }}')">
                                                                        <i class="fa-solid fa-circle-minus"></i>
                                                                    </button>
                                                                    <input type="number" class="form-control input_food ps-3"
                                                                           name="food[{{$food->id}}]"
                                                                           value="0" readonly min="0"
                                                                           style="max-width: 80px" aria-label="">
                                                                    <button class="btn mb-0 plus_food"
                                                                            onclick="plusFood({{$food->id}}, {{$food->price}}, '{{ $food->name }}')">
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

                                    <button class="btn btn-warning mx-2 text-decoration-underline text-center
                                    btn_next disabled"
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

                                <h4 class="mt-4">@lang('lang.payment')</h4>
                                <form id="paymentForm" action="admin/buyTicket/createPayment" method="post">
                                    @csrf
                                    <div class="bg-dark-subtle p-5">
                                        <div class="row row-cols-1" data-bs-parent="#mainContent">
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
                    <h5 class="modal-title" id="handleMoneyLabel">Modal title</h5>
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
                        <input type="hidden" name="amount" id="amount">
                        <input type="hidden" name="type" value="combo">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="btnMoneyPayment()" class="btn bg-gradient-primary">Thanh
                            toán</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(() => {
            let $ticket_combos = {};
            let $ticket_foods = {};
            let $ticket_id = -1;
            let $iCombo = 0;
            let $sum = 0;
            let $holdState = false;

            comboBack = () => {
                $('#timer').remove();
                clearInterval($countdown.interval);
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/ticketCombo/create",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ticketCombos': $ticket_combos,
                        'ticketFoods': $ticket_foods,
                    },
                    statusCode: {
                        200: function (data) {
                            $ticket_id = data.ticket_id;
                        }
                    }
                });
            }

            plusFood = (id, price, foodName) => {
                $iCombo++;
                if($iCombo !== 0) {
                    $('.btn_next').removeClass('disabled');
                }
                $inputFood = $('#Food_' + id).find('.input_food');
                $inputFood.val(parseInt($inputFood.val()) + 1);
                $inputFood.parent().find('.minus_food').removeClass('disabled');
                if (parseInt($inputFood.val()) === 1) {
                    $('.minus_food_' + id).removeClass('disabled');
                    $('#ticket_combos').append(`<p id="ticketFood_${id}">${foodName} x ${parseInt($inputFood.val())}</p>`);
                } else {
                    $(`#ticketFood_${id}`).replaceWith(`<p id="ticketFood_${id}">${foodName} x ${parseInt($inputFood.val())}</p>`);
                }
                $sum += price;
                $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));
                $ticket_foods[id] = [id, parseInt($inputFood.val())];
            }

            minusFood = (id, price, foodName) => {
                $iCombo--;
                if($iCombo === 0) {
                    $('.btn_next').addClass('disabled');
                }
                if ($inputFood.val() === '0') {
                    $inputFood.parent().find('.minus_food').addClass('disabled');
                    return;
                }
                $inputFood = $('#Food_' + id).find('.input_food');
                $inputFood.val(parseInt($inputFood.val()) - 1);

                if (parseInt($inputFood.val()) === 0) {
                    $('.minus_food_' + id).addClass('disabled');
                    $(`#ticketFood_${id}`).remove();
                } else {
                    $(`#ticketFood_${id}`).replaceWith(`<p id="ticketFood_${id}">${foodName} x ${parseInt($inputFood.val())}</p>`);
                }
                $sum -= price;
                $('#ticketSeat_totalPrice').text($sum.toLocaleString('vi-VN'));
                if (parseInt($inputFood.val()) === 0) {
                    delete $ticket_foods[id];
                } else {
                    $ticket_foods[id] = [id, parseInt($inputFood.val())];
                }
            }

            plusCombo = (id, price, comboName) => {
                $iCombo++;
                if($iCombo !== 0) {
                    $('.btn_next').removeClass('disabled');
                }
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
                $iCombo--;
                if($iCombo === 0) {
                    $('.btn_next').addClass('disabled');
                }
                if ($inputCombo.val() === '0') {
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
                                $('#total').val($sum);
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
                    url: "/tickets/delete",
                    type: 'DELETE',
                    data: {
                        'ticket_id': $ticket_id,
                    },
                });
            }

            if (window.history && window.history.pushState) {

                window.history.pushState('forward', null, './admin/buyCombo');

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
                    window.location.replace('/admin/buyCombo');
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

            $('#moneyIn').bind('keyup', (e) => {
                $moneyOut = parseInt($('#moneyIn').val()) - $sum;
                $('#moneyOut').val($moneyOut);
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
        })
    </script>
    <script>
        @if(session('success'))
        Swal.fire({
            title: '{{session('success')}}',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
        @endif
        @if(session('fail'))
        Swal.fire({
            title: '{{session('fail')}}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
        @endif
    </script>
@endsection
