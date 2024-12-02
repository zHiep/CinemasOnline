@extends('web.layout.index')
@section('content')
    <style>
        .hover_movie:hover {
            color: #f26b38 !important;
        }
    </style>
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="link link-dark text-decoration-none">@lang('lang.home')</a></li>
                <li class="breadcrumb-item"><a href="/movies" class="link link-dark text-decoration-none">@lang('lang.movie_is_playing')</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $movie['name'] !!}</li>
            </ol>
        </nav>

        <div class="movie mt-5">
            {{--  Movie title  --}}
            <h2 class="mt-2">{!! $movie['name'] !!}</h2>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-4 border-warning rounded-0">
                        @if(strstr($movie['image'],"https") == "")
                            <img class="card-img-top rounded-0" alt='...'
                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg">
                        @else
                            <img class="card-img-top rounded-0" alt='...'
                                 src="{!! $movie['image'] !!}">
                        @endif
                    </div>
                    <div class="card-body border border-4 border-warning border-top-0 d-flex align-items-center">
                        <strong class="card-text p-2">@lang('lang.evaluate'): </strong>
                        <div id='score' class="score"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center text-danger">{{ $movie->showTime }} @lang('lang.minutes')
                        </li> {{--movie running time--}}
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.national')
                                : </strong>{!! $movie['national'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.release_date')
                                : </strong>{!! $movie['releaseDate'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.genre'): </strong>
                            @foreach($movie->movieGenres as $genre)
                                @if ($loop->first)
                                    {{ $genre->name }}
                                @else
                                    , {{ $genre->name }}
                                @endif
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <strong class="pe-1">@lang('lang.directors'): </strong>
                            @foreach($movie->directors as $director)
                                <a href="/director/{!! $director['id'] !!}" class="link link-dark text-decoration-none hover_movie">
                                @if ($loop->first)
                                    {{ $director->name }}
                                @else
                                    , {{ $director->name }}
                                @endif
                                </a>
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center text-truncate">
                            <strong class="pe-1">@lang('lang.casts'): </strong>
                            @foreach($movie->casts as $cast)
                                <a href="/cast/{!! $cast['id'] !!}" class="link link-dark text-decoration-none hover_movie" >
                                @if ($loop->first)
                                    {{ $cast->name }}
                                @else
                                    , {{ $cast->name }}
                                @endif
                                </a>
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.rated'): </strong>
                            <span class="badge @if($movie->rating->name == 'C18') bg-danger
                            @elseif($movie->rating->name == 'C16') bg-warning
                            @elseif($movie->rating->name == 'P') bg-success
                            @elseif($movie->rating->name == 'K') bg-primary
                            @else bg-info
                            @endif me-1">
                                {{ $movie->rating->name }}
                            </span> - {{ $movie->rating->description }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row container">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4 class="mt-4">@lang('lang.content')</h4>
                    </div>
                    <div class="accordion-body">
                        {!! $movie['description'] !!}
                    </div>
                </div>
            </div>
            <div class="row container">
                <h4 class="mt-4">Trailer</h4>

                <div class="">
                    @isset($movie['trailer'])
                    <iframe width="800" height="500" src="https://www.youtube.com/embed/{!! $movie['trailer'] !!}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                    </iframe>
                    @endisset
                </div>
            </div>
        </div>
        @if($schedulesEarly->count() > 0)
            <div class="col-12 mt-4">
                <h4>Vé bán trước</h4>
                    @foreach($schedulesEarly as $schedule)
                        @if(date('Y-m-d') == $schedule->date)
                            @if(date('H:i', strtotime('+ 20 minutes', strtotime($schedule->startTime))) >= date('H:i'))
                                @if(Auth::check())
                                    <a href="/tickets/{{$schedule->id}}"
                                       class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                        <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                            {{ date('H:i', strtotime($schedule->startTime )).' - '.date('d-m-Y', strtotime($schedule->date)) }}
                                        </p>
                                    </a>
                                @else
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       data-bs-toggle="modal"
                                       data-bs-target="#loginModal"
                                       style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                        <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                            {{ date('H:i', strtotime($schedule->startTime )).' | '.date('d-m-Y', strtotime($schedule->date)
                                            ) }}
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
                                        {{ date('H:i', strtotime($schedule->startTime )).' | '.date('d-m-Y', strtotime($schedule->date)) }}
                                    </p>
                                </a>
                            @else
                                <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                   data-bs-toggle="modal"
                                   data-bs-target="#loginModal"
                                   style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                    <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                        {{ date('H:i', strtotime($schedule->startTime )).' - '.date('d-m-Y', strtotime($schedule->date)) }}
                                    </p>
                                </a>
                            @endif
                        @endif
                    @endforeach
            </div>
        @endif
        <div class="col-12 mt-4">
            <h4>@lang('lang.movie_schedule')</h4>
            <ul class="list-group list-group-horizontal flex-wrap">
                @for($i = 0; $i <= 7; $i++)
                    <li class="list-group-item border-0">
                        <button data-bs-toggle="collapse"
                                data-bs-target="#schedule_date_{{$i}}"
                                aria-expanded="false"
                                class="btn btn-block btn-outline-dark p-2 m-2">
                            {{ date('d/m', strtotime('+ '.$i.' day', strtotime(today()))) }}
                        </button>
                    </li>
                @endfor
            </ul>
        </div>
        @include('web.layout.movieDetailSchedules')
        </div>



    </section>
@endsection
@section('js')
@endsection
