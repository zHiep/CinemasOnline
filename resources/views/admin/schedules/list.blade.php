@extends('admin.layout.index')
@section('css')
#time + span {
padding-right: 30px;
}

#time:invalid + span::after {
position: absolute;
content: "✖";
padding-left: 5px;
}

#time:valid + span::after {
position: absolute;
content: "✓";
padding-left: 5px;
}
@endsection
@section('content')
@can('schedule_movie')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>@lang('lang.schedule')</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="admin/schedule" method="get">
                        <div class="row container">
                            <div class="col-5">
                                <div class="input-group">
                                    <span class="input-group-text bg-gray-200"> @lang('lang.theater')</span>
                                    <select id="theater" class="form-select ps-2" name="theater" aria-label="">
                                        @foreach($theaters as $theater)
                                        <option value="{{ $theater->id }}" @if($theater==$theater_cur) selected @endif>
                                            {{ $theater->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>
                                    <input name="date" id="date" value="{{ date("Y-m-d",strtotime($date_cur)) }}" aria-label="" class="form-control ps-2" type="text">
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn  bg-gradient-primary">@lang('lang.submit')</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive m-2">
                        <table class="table table-bordered table-striped align-items-center text-center">
                            <colgroup>
                                <col span="1" style="width: 40%;">
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 30%;">
                            </colgroup>
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-uppercase font-weight-bolder"> @lang('lang.room')</th>
                                    <th class="text-uppercase font-weight-bolder"> @lang('lang.room_type')</th>
                                    <th class="text-uppercase font-weight-bolder"> @lang('lang.seat')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($theater_cur)
                                @foreach($theater_cur->rooms as $room)
                                @if($room['status'] == 1)
                                <tr>
                                    <td>
                                        {{ $room->name }}
                                    </td>
                                    <td>
                                        {{ $room->roomType->name }}
                                    </td>
                                    <td>
                                        {{ $room->seats->count() }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <table id="room_{{$room->id}}" class="table table-bordered align-items-center">
                                            <colgroup>
                                                <col span="1" style="width: 20%;">
                                                <col span="1" style="width: 80%;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase fw-bold">@lang('lang.time')</th>
                                                    <th class="text-uppercase fw-bold text-start">@lang('lang.movies')</th>
                                                    <!-- {{--                                                            <th class="text-uppercase fw-bold">@lang('lang.early_screening')</th>--}} -->
                                                    <th class="text-uppercase fw-bold">@lang('lang.status')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($room->schedulesByDate(date('Y-m-d', strtotime($date_cur))) as $schedule)
                                                <tr class="delete_schedule" id="schedules_{{ $schedule->id }}">
                                                    <td>
                                                        {{ date('H:i', strtotime($schedule->startTime)) }}
                                                        - {{ date('H:i', strtotime($schedule->endTime)) }}
                                                    </td>
                                                    <td class="text-start">
                                                        {{ $schedule->movie->name }}
                                                    </td>
                                                    @if(date('Y-m-d', strtotime($schedule->date))
                                                    < date('Y-m-d', strtotime($schedule->movie->releaseDate)))
                                                        <td id="early_status{!! $schedule['id'] !!}" class="align-middle text-center text-sm ">
                                                            @if($schedule->early == 1)
                                                            <a href="javascript:void(0)" class="btn_active" onclick="changeearlystatus({!! $schedule['id'] !!},0)">
                                                                <span class="badge badge-sm bg-gradient-success">
                                                                    Early access
                                                                </span>
                                                            </a>
                                                            @else
                                                            <a href="javascript:void(0)" class="btn_active" onclick="changeearlystatus({!! $schedule['id'] !!},1)">
                                                                <span class="badge badge-sm bg-gradient-secondary">
                                                                    Offline
                                                                </span>
                                                            </a>
                                                            @endif
                                                        </td>
                                                        @else
                                                        <td id="status{!! $schedule['id'] !!}" class="align-middle text-center text-sm ">
                                                            @if($schedule->status == 1)
                                                            <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $schedule['id'] !!},0)">
                                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                                            </a>
                                                            @else
                                                            <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $schedule['id'] !!},1)">
                                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                            </a>
                                                            @endif
                                                        </td>
                                                        @endif
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-info btn_add" data-bs-toggle="modal" data-bs-target="#CreateScheduleModal_{{ $room->id }}">
                                                            <i class="fa-regular fa-circle-plus"></i> @lang('lang.add')
                                                        </button>
                                                    </td>
                                                    <td colspan="3">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-warning btn_changeAllStatus" onclick="changeAllStatus({{
                                                                    $room->id }})">
                                                                <i class="fa-solid fa-repeat"></i> Thay đổi trạng thái tất cả
                                                            </button>
                                                            <a href="javascript:void(0);" data-date="{{$date_cur}}" data-theater="{{$theater_cur->id}}" data-room="{{$room->id}}" data-url="{{ url('admin/schedule/deleteall') }}" class="btn btn-dark ms-3 delete_all">
                                                                <i class="fa-regular fa-trash"></i> Delete all
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($theater_cur->rooms as $room)
@include('admin.schedules.create')
@endforeach
@else
<h1 align="center">Permissions Deny</h1>
@endcan
@endsection
@section('scripts')
<script>
    // $(document).ready(function () {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $('.delete-schedule').on('click', function () {
    //         var userURL = $(this).data('url');
    //         var id = $(this).data('id');
    //         var trObj = $(this);
    //         if (confirm("Are you sure you want to remove it?") === true) {
    //             $.ajax({
    //                 url: userURL,
    //                 type: 'DELETE',
    //                 dataType: 'json',
    //                 success: function (data) {
    //                     if (data['success']) {
    //                         $('#schedules_' + id).remove();
    //                     } else if (data['error']) {
    //                         alert(data.error);
    //                     }
    //                 }
    //             });
    //         }
    //
    //     });
    // });
    $(document).ready(function() {
        flatpickr($("#date"), {
            dateFormat: "Y-m-d ",
            "locale": "@lang('lang.language')"
        });

        @if(date('Y-m-d') > $date_cur)
        $('.btn-early').addClass('disabled');
        $('.btn_active').addClass('disabled');
        $('.btn_changeAllStatus').addClass('disabled');
        $('.delete_all').addClass('disabled');
        $('.btn_add').addClass('disabled');
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete_all').on('click', function(e) {
            var userURL = $(this).data('url');
            var theater_id = $(this).data('theater');
            var room_id = $(this).data('room');
            var date = $(this).data('date');
            if (confirm("Are you sure you want to remove it?") === true) {
                $.ajax({
                    url: userURL,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'theater_id': theater_id,
                        'room_id': room_id,
                        'date': date
                    },
                    success: function(data) {
                        if (data['success']) {
                            // $(".delete_schedule").remove();
                            window.location.reload();
                        }
                    }

                });
            }
        });
    });
</script>
<script>
    function changestatus(schedule_id, active) {
        if (active === 1) {
            $("#status" + schedule_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + schedule_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        } else {
            $("#status" + schedule_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + schedule_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/schedule/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'schedule_id': schedule_id
            },
            success: function(data) {
                if (data['success']) {
                    // alert(data.success);
                } else if (data['error']) {
                    alert(data.error);
                }
            }
        });
    }
</script>
<script>
    function changeearlystatus(early_id, active) {
        if (active === 1) {
            $("#early_status" + early_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changeearlystatus(' + early_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Early access</span>\
            </a>')
        } else {
            $("#early_status" + early_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changeearlystatus(' + early_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/schedule/early_status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'early_id': early_id
            },
            success: function(data) {
                if (data['success']) {
                    // alert(data.success);
                } else if (data['error']) {
                    alert(data.error);
                }
            }
        });
    }
</script>
<script>
    @isset($theater_cur)
    @foreach($theater_cur -> rooms as $room)
    $('#remainingSchedules_{{$room->id}}').change((e) => {
        if ($(e.target).is(':checked')) {
            $('#CreateScheduleModal_{{ $room->id }}').find('#time').attr('readonly', true);
        } else {
            $('#CreateScheduleModal_{{ $room->id }}').find('#time').attr('readonly', false);
        }
    });
    @endforeach
    @endisset
</script>
<script>
    changeAllStatus = (room_id) => {
        schedulesElements = $('#room_' + room_id).find('.btn_active');
        schedulesElements.toArray().forEach(schedulesElement => {
            schedulesElement.click();
        });
    }
</script>
@endsection