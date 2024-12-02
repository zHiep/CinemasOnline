<div class="offcanvas offcanvas-start" tabindex="-1" id="EditRow_{{ $room->id }}_{{ $row->row }}"
     aria-labelledby="EditSeatRowLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="EditSeatRowLabel">@lang('lang.edit') @lang('lang.seat_row')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="admin/seat/row" method="post">
            @csrf
            @foreach($seatTypes as $seatType)
                <div class="form-check">
                    <input class="form-check-input seat_type_radio" type="radio" name="seatType"
                           id="ColorRadio_{{ $seatType->id }}_{{ $room->id }}_{{ $row->row }}" value="{{ $seatType->id }}">
                    <label class="custom-control-label flex-fill d-flex border-0 ps-1 my-2"
                           for="ColorRadio_{{ $seatType->id }}_{{ $room->id }}_{{ $row->row }}">
                    <span class="fw-bold d-block text-center me-1 seat_color_{{ $seatType->id }}"
                          style="width: 20px; height: 20px; background-color: {{ $seatType->color }};"></span>
                        <span style="line-height: 20px">{{ $seatType->name }} - {{ $seatType->surcharge }}</span>
                    </label>
                </div>
            @endforeach
            <div class="form-group">
                <label for="row_mb_{{ $room->id }}_{{ $row->row }}">@lang('lang.below_align')</label>
                <input class="form-control" type="number" name="mb" id="row_mb_{{ $room->id }}_{{ $row->row }}">
            </div>
            <input type="hidden" name="room" value="{{ $room->id }}">
            <input type="hidden" name="row" value="{{ $row->row }}">
            <button type="submit" class="btn btn-primary" data-bs-dismiss="offcanvas">
                @lang('lang.confirm')
            </button>
        </form>
    </div>
</div>
