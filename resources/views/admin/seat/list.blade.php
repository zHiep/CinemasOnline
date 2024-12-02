@extends('admin.layout.index')
@section('content')
    @can('theater')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Thông tin phòng</h6>
                        </div>
                        <div class="card-body">
                            <form action="admin/room/edit/{{$room->id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Email address</label>
                                            <input id="name" type="text" name="name" class="form-control"
                                                   placeholder="Name..." value="{{$room->name}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="type">Room type</label>
                                            <select class="form-control" name="type" id="type">
                                                @foreach($roomTypes as $type)
                                                    <option value="{{$type->id}}"
                                                        @if($room->roomType_id == $type->id) selected @endif>
                                                        {{$type->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-2" @if($room->seats->count() > 300) style="width: 1500px" @endif>
                        <div class="card-header pb-0">
                            <h6>{{$room->name}}</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="d-block overflow-x-auto text-center">
                                <div class="w-100 mt-2 my-auto mb-4 text-center justify-content-center">
                                    @lang('lang.screen')
                                    <div class="row bg-dark w-100 mx-auto" style="height: 2px; max-width: 540px"></div>

                                    <div class="row d-block m-2" style="margin: 2px">
                                        <div class="d-inline-block align-middle my-0 mx-1 py-1 px-0 disabled"
                                             style="width: 30px; height: 30px; line-height: 22px; font-size: 10px">
                                        </div>
                                    </div>
                                    @foreach($room->rows as $row)
                                        <div class="row d-block" id="Row_{{ $row->row }}" style="margin: 2px">
                                            @foreach($room->seats as $seat)
                                                @if($seat->row == $row->row)
                                                    @for($m = 0; $m < $seat->ms; $m++)
                                                        <div class="d-inline-block align-middle disabled seat_empty"
                                                             style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                    @endfor
                                                    <div class="d-inline-block cursor-pointer align-middle py-1 px-0 seat_enable"
                                                         id="Seat_{{ $seat->row.$seat->col}}"
                                                         style="
                                                         @if($seat['status'] == 1)
                                                background-color: {{ $seat->seatType->color }};
                                                @else
                                                 background-color: #999;
                                                @endif
                                                width: 30px;
                                                height: 30px;
                                                line-height: 22px;
                                                font-size: 10px;
                                                margin: 2px 0;
                                             "
                                                         data-bs-toggle="offcanvas" data-bs-target="#EditSeat_{{ $seat->id }}">
                                                        {{ $seat->row.$seat->col }}
                                                    </div>
                                                    @for($n = 0; $n < $seat->me; $n++)
                                                        <div class="d-inline-block align-middle disabled seat_empty"
                                                             style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                    @endfor
                                                    @include('admin.seat.configSeat')
                                                @endif
                                                @if($loop->last)
                                                    <div class="d-inline-block border cursor-pointer align-middle py-1 px-0"
                                                         style=" width: 30px; height: 30px; margin: 2px -30px 2px 0;"
                                                         data-bs-toggle="offcanvas" data-bs-target="#EditRow_{{ $room->id }}_{{ $row->row }}">
                                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                    </div>
                                                    @include('admin.seat.configRow')
                                                @endif
                                            @endforeach
                                            @for($m = 0; $m < $row->mb; $m++)
                                                <div class="row d-block" style="margin: 2px">
                                                    <div class="d-inline-block align-middle disabled seat_empty"
                                                         style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                </div>
                                            @endfor
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
@endsection
