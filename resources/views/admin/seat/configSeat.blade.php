<div class="offcanvas offcanvas-start" tabindex="-1" id="EditSeat_{{ $seat->id }}"
     aria-labelledby="EditSeatRowLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="EditSeatRowLabel">@lang('lang.edit') {{ $seat->row.$seat->col }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="admin/seat/edit" method="post">
            @csrf
            @foreach($seatTypes as $seatType)
                <div class="form-check">
                    <input class="form-check-input seat_type_radio" type="radio" name="seatType"
                           id="ColorRadio_{{ $seatType->id }}_{{ $seat->id }}" value="{{ $seatType->id }}"
                           @if($seat->seatType_id==$seatType->id)
                               checked
                           @endif
                    >
                    <label class="form-check-label flex-fill d-flex border-0 ps-1 my-2"
                           for="ColorRadio_{{ $seatType->id }}_{{ $seat->id }}">
                    <span class="fw-bold d-block text-center me-1"
                          style="width: 20px; height: 20px; background-color: {{ $seatType->color }};"></span>
                        <span style="line-height: 20px">{{ $seatType->name }} - {{ $seatType->surcharge }}</span>

                    </label>

                </div>
            @endforeach
            <label class="text-sm">
                    @if($seat['status'] ==1)
                        <a href="admin/seat/on/{!! $seat['id'] !!},{!! $room['id'] !!}">
                            <span class="badge badge-sm bg-gradient-success">Online</span>
                        </a>
                    @else
                    <a href="admin/seat/off/{!! $seat['id'] !!},{!! $room['id'] !!}">
                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                        </a>
                    @endif
            </label>
            <div class="form-group">
                <label for="seat_ms_{{ $seat->id }}">@lang('lang.left_align')</label>
                <input class="form-control" type="number" name="ms" id="seat_ms_{{ $seat->id }}" value="{{ $seat->ms }}">
            </div>
            <div class="form-group">
                <label for="seat_me_{{ $seat->id }}">@lang('lang.right_align')</label>
                <input class="form-control" type="number" name="me" id="seat_me_{{ $seat->id }}" value="{{ $seat->me }}">
            </div>
            <input type="hidden" name="room" value="{{ $room->id }}">
            <input type="hidden" name="seat" value="{{ $seat->id }}">
            <a href="admin/seat/delete/{{$seat->id}}?room={{ $room->id }}" class="btn btn-primary mt-4">
                <i class="fa-solid fa-trash-can fa-lg"></i> @lang('lang.delete')
            </a>
            <button type="submit" class="btn btn-primary mt-4"
                    data-bs-dismiss="offcanvas">
                @lang('lang.confirm')
            </button>
        </form>
    </div>
</div>

