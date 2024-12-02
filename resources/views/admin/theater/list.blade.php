@extends('admin.layout.index')

@section('content')
    @can('theater')
        <div class="container-fluid py-4">
            <!-- @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{ session('success') }}!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.theater')</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn bg-gradient-info float-right mb-3" data-bs-toggle="modal" data-bs-target="#theaterCreateModal">
                                        @lang('lang.create')
                                    </button>
                                </a>

                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.name')
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.address')
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.room')
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.status')
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($theaters as $theater)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->address }}
                                                    , {{ $theater->city }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ count($theater->rooms) }}</span>
                                            </td>
                                            <td id="theater_status{!! $theater['id'] !!}" class="align-middle text-center text-sm">
                                                @if($theater->status == 1)
                                                    <a href="javascript:void(0)" class="btn_active" onclick="theaterstatus({!! $theater['id'] !!},0)">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn_active" onclick="theaterstatus({!! $theater['id'] !!},1)">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="#TheaterEditModal" class="text-secondary font-weight-bold text-xs"
                                                        onclick="editTheater({{ $theater->id }}, '{{ $theater->city }}')"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#TheaterEditModal{{ $theater->id }}">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>

                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-url="{{ url('admin/theater/delete', $theater['id'] ) }}"
                                                   class="text-secondary font-weight-bold text-xs delete-theater" data-toggle="tooltip">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.theater.create')
        @foreach($theaters as $theater)
            @include('admin.theater.edit')
            @include('admin.room.create')
        @endforeach
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
    <script>
        function theaterstatus(theater_id, active) {
            if (active === 1) {
                $("#theater_status" + theater_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="theaterstatus(' + theater_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
                    </a>'
                );
            } else {
                $("#theater_status" + theater_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="theaterstatus(' + theater_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
                    </a>'
                );
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/theater/status",
                type: 'GET',
                data: {
                    'active': active,
                    'theater_id': theater_id
                },

            });
        }

    </script>
    <script>
        function roomstatus(room_id, active) {
            if (active === 1) {
                $("#room_status" + room_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="roomstatus(' + room_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
                    </a>'
                );
            } else {
                $("#room_status" + room_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="roomstatus(' + room_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
                    </a>'
                );
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/room/status",
                type: 'GET',
                data: {
                    'active': active,
                    'room_id': room_id
                },

            });
        }

    </script>
    <script>
        $(document).ready(function () {
            $('#city').select2();
            $('#city_create').select2();
        })

        editTheater = (theater_id, city) => {
            $('#city_theater_' + theater_id + ' option[value="' + city + '"]').prop("selected", true);
        }
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-theater').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-room').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });

        btnEdit = (id) => {
            console.log(id+ 'theater')
            $('#theater_edit_form_' + id).trigger( "submit" );
        }

    </script>
@endsection



