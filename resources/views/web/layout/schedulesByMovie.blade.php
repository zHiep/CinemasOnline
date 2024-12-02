<div class="collapse multi-collapse_Movie_{{ $movie->id }}" id="movieSchedules_{{$movie->id}}"
     data-bs-parent="#collapseMovieParent">
    <div class="mt-2">
        <h4>@lang('lang.movie_schedule')</h4>
        <div class="d-flex flex-column mt-2 mb-5" id="schedulesMain_{{$movie->id}}">
            @for($i = 0; $i <= 7; $i++)
                <div class="collapse collapse-horizontal @if($i == 0) show @endif" id="schedule_{{$movie->id}}_date_{{$i}}"
                     data-bs-parent="#schedulesMain_{{$movie->id}}">
                @foreach($theaters as $theater)
                @if($theater->schedulesByDateAndMovie(date('Y-m-d', strtotime('+ '.$i.' day', strtotime(today()))), $movie->id)->count() > 0)
                    <div class="p-2 d-flex flex-row m-1 align-items-center" style="background: #f5f5f5">
                        <div class="flex-shrink-1 p-3">
                            <h6 class="fw-bold">{{ $theater->name }}</h6>
                        </div>
                        {{-- a Theater schedule --}}
                        <div class="flex-fill border-start border-5 border-white p-2 ps-4">
                            @foreach($roomTypes as $roomType)
                                @if($roomType->schedulesByDateAndTheaterAndMovie(date('Y-m-d', strtotime('+ '.$i.' day', strtotime(today()))), $theater->id, $movie->id)->count() > 0)
                                    <div class="d-flex flex-column flex-nowrap overflow-auto mb-4">
                                        <div class="fw-bold">{{ $roomType->name }}</div>
                                        <div class="d-flex flex-wrap overflow-wrapper">
                                            @foreach($roomType->schedulesByDateAndTheaterAndMovie(date('Y-m-d', strtotime('+ '.$i.' day', strtotime(today()))), $theater->id, $movie->id) as $schedule)
                                                @if(date('Y-m-d') == $schedule->date)
                                                    @if(date('H:i', strtotime('+ 20 minutes', strtotime($schedule->startTime))) >= date('H:i'))
                                                        @if(Auth::check())
                                                            <a href="/tickets/{{$schedule->id}}"
                                                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                               style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                                <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                    {{ date('H:i', strtotime($schedule->startTime ))}}
                                                                </p>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#loginModal"
                                                               style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                                <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                    {{ date('H:i', strtotime($schedule->startTime ))}}
                                                                </p>
                                                            </a>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if(date('Y-m-d') < $schedule->date)
                                                    @if(Auth::check())
                                                        <a href="/tickets/{{$schedule->id}}"
                                                           class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                           style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                            <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                {{ date('H:i', strtotime($schedule->startTime ))}}
                                                            </p>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#loginModal"
                                                           style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                            <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                {{ date('H:i', strtotime($schedule->startTime ))}}
                                                            </p>
                                                        </a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- a Theater schedule: end --}}
                    </div>
                @endif
            @endforeach
                </div>
            @endfor
        </div>
    </div>
</div>
