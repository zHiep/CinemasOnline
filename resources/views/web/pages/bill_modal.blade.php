<div class="modal fade  modal-lg" id="billModal{!! $value['id'] !!}" tabindex="-1" aria-labelledby="billModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="photo">
                <div class="card-body mx-4">

                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="text-black mt-1">
                                    <h5>@lang('lang.ticket_code'): {!! $value['code'] !!}</h5>
                                </li>
                                <li class="text-black mt-1">@lang('lang.purchase_date'): {!! date("d/m/Y",strtotime($value['created_at']))!!}</li>
                                <li class="text-black">@lang('lang.customer'): {!! $user['fullName'] !!}</li>
                                <li class="text-muted mt-1"><span class="text-black">@lang('lang.phone'): </span>{!! $user['phone'] !!}</li>
                                <li class="text-muted mt-1"><span class="text-black">@lang('lang.payment_methods'): </span>@lang('lang.vnpay_wallet')</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <img style="width: 150px;float: right;" src="images/favicon/cinema.png" />
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xxs">@lang('lang.movie_name')</th>
                                    <th class="text-center text-uppercase text-xxs">@lang('lang.showtime_web')</th>
                                    <th class="text-center text-uppercase text-xxs">@lang('lang.ticket')</th>
                                    <th class="text-center text-uppercase text-xxs">@lang('lang.total_price')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">
                                        {!! $value['schedule']['movie']['name'] !!}
                                    </td>
                                    <td class="align-middle text-center">
                                        <strong>{!! $value['schedule']['room']['theater']['name'] !!}</strong>
                                        <p>{!! $value['schedule']['room']['name'] !!}</p>
                                        <p>@lang('lang.seat'): @foreach($value['ticketSeats'] as $seat)
                                            @if ($loop->first)
                                            {{ $seat->row.$seat->col }}
                                            @else
                                            ,{{ $seat->row.$seat->col }}
                                            @endif
                                            @endforeach
                                        </p>
                                        <p>{!! date("d/m/Y",strtotime($value['schedule']['date'] )) !!}</p>
                                        <p>@lang('lang.from') {!! date("H:i A",strtotime($value['schedule']['startTime'] )) !!} ~ @lang('lang.to') {!! date("H:i A",strtotime($value['schedule']['endTime'] )) !!}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p> {!! $value['schedule']['room']['roomType']['name'] !!}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p>{!! number_format($value['totalPrice'],0,",",".") !!}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="download" type="submit" class="btn btn-danger">@lang('lang.print')</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
            </div>
        </div>
    </div>
</div>