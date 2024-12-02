<table class="table align-items-center mb-0 ">
    <thead>
    <tr>
        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
            @lang('lang.name')
        </th>
        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
            @lang('lang.room_type')
        </th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            @lang('lang.status')
        </th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="5">
            <button class="btn w-100" data-bs-toggle="modal" data-bs-target="#RoomCreateModal_Theater_{{ $theater->id }}">
                <i class="fa-light fa-circle-plus pe-1"></i>@lang('lang.add') @lang('lang.room')
            </button>
        </td>
    </tr>
    @foreach($theater->rooms as $room)
        <tr>
            <td class="align-middle text-center">
                <h6 class="mb-0 text-sm ">{{ $room->name }}</h6>
            </td>
            <td class="align-middle text-center">
                <h6 class="mb-0 text-sm ">{{ $room->roomType->name }}</h6>
            </td>
            <td id="room_status{!! $room['id'] !!}" class="align-middle text-center text-sm">
                @if($room->status == 1)
                    <a href="javascript:void(0)" class="btn_active" onclick="roomstatus({!! $room['id'] !!},0)">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                    </a>
                @else
                    <a href="javascript:void(0)" class="btn_active" onclick="roomstatus({!! $room['id'] !!},1)">
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    </a>
                @endif
            </td>
            <td class="align-middle">
                <a class="text-secondary font-weight-bold text-xs" href="admin/seat/{{ $room->id }}">
                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                </a>

            </td>
            <td class="align-middle">
                <a href="admin/room/delete/{{$room->id}}" class="text-secondary font-weight-bold text-xs delete-room"
                   data-url="{{ url('admin/seat/delete', $room['id'] ) }}" data-toggle="tooltip">
                    <i class="fa-solid fa-trash-can fa-lg"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
