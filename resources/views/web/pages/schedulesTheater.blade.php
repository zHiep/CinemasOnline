@extends('web.layout.index')
@section('schedules')
    active
@endsection

@section('content')
    <section class="container-lg clearfix" style="min-height: 1000px">
        <!-- Main content -->
        <div class="mt-5" id="schedules">
            {{-- SubNav --}}
            <ul class="nav justify-content-center mb-4">
                <li class="nav-item">
                    <a class="h5 nav-link link-secondary" href="/schedulesByMovie">
                        @lang('lang.movie_showtime')
                    </a>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            data-bs-toggle="collapse"
                            data-bs-target="#lichtheorap" disabled>
                        @lang('lang.theater_showtime')
                    </button>
                </li>
            </ul>

            <div id="lichtheorap" class="collapse show" data-bs-parent="#schedules">
                <div class="d-flex flex-row mt-4">
                    @foreach($cities as $city)
                        <div class="flex-city p-2 m-1 border-0">
                            <button class="btn @if($loop->first) btn-warning @else btn-secondary @endif p-3"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#Theater_{{str_replace(' ', '', $city)}}" @if($loop->first) disabled @endif>{{$city}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <div id="theaterParent">
                    @foreach($cities as $city)
                        <div class="collapse @if($loop->first) show @endif" id="Theater_{{str_replace(' ', '', $city)}}"
                             data-bs-parent="#theaterParent">
                            <div class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 ">
                                @foreach($theaters as $theater)
                                    @if($city == $theater->city)
                                        <!-- Theater -->
                                        <div class="col">
                                            <div class="card px-0 overflow-hidden theater_item"
                                                 style="background: #f5f5f5">
                                                <button class="btn rounded-0 border-0 btn_theater @if($loop->first) btn-warning @endif"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#TheaterSchedules_{{$theater->id}}"
                                                        @if($loop->first) disabled @endif>
                                                    <div class="card-body">
                                                        <h5 class="card-title fs-4">{{ $theater->name }}</h5>
                                                        <p class="card-text fs-6 text-secondary">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            {{ $theater->address }}
                                                        </p>
                                                    </div>
                                                </button>

                                                <div class="card-footer">
                                                    <a href="{{ $theater->location }}"
                                                       class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ
                                                        <i class="fa-solid fa-map-location-dot"></i>
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Theater: end -->
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    @endforeach



{{--                    <form action="/schedulesByTheater" method="get">--}}
{{--                        @csrf--}}
{{--                        <div class="row container mt-5">--}}
{{--                            <div class="col-10">--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>--}}
{{--                                    <input class="form-control ps-2" type="date" min="{{ date('Y-m-d') }}" name="date" value="{{ $date_cur }}"--}}
{{--                                           aria-label="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-2">--}}
{{--                                <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <div id="theaterSchedulesParent">
                        @foreach($theaters as $theater)
                            @include('web.layout.schedulesByTheater')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#schedules .nav .nav-item .nav-link").on("click", function () {
                $("#schedules .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
                $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
            });

            $("#lichtheorap .d-flex .flex-city .btn").on("click", function () {
                $("#lichtheorap .flex-city").find(".btn").removeClass("btn-warning").addClass("btn-secondary").prop('disabled', false);
                $(this).addClass("btn-warning").removeClass("btn-secondary").prop('disabled', true);
            });

            $(".theater_item .btn_theater").on("click", function () {
                $(".theater_item ").find(".btn_theater").removeClass("btn-warning").prop('disabled', false);
                $(this).addClass("btn-warning").prop('disabled', true);
            });

            $(".listDate button").on('click', function () {
                $(".listDate").find(".btn").removeClass('active');
                $(this).addClass("active");
            })
        })
    </script>
@endsection
