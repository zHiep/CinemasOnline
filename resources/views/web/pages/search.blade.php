@extends('web.layout.index')
@section('events')
    active
@endsection
@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5">
            <div class="d-flex flex-column">
                @foreach($result as $item)
                    @if($item->type == 'movie')
                        <!-- Movie -->
                        <div class="card text-bg-light mb-3">
                            <article class="card text-bg-light mb-3" style="background: #f5f5f5">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <a href="/movie/{{ $item->id }}">
                                            @if(strstr($item->image,"https") === "")
                                                <img class="img-fluid rounded-start" style="max-width: 300px"
                                                     src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $item->image }}.jpg"
                                                     alt="">
                                            @else
                                                <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $item->image }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="card-body h-75">
                                            <a href="movie/{{ $item->id }}" class="link link-dark text-decoration-none">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text text-danger">Thời lượng: {{ $item->showTime }} phút</p>
                                                <p class="card-text">Thể loại:
                                                    @foreach($item->movieGenres as $genre)
                                                        @if ($loop->first)
                                                            <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                                        @else
                                                            | <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Đạo diễn:
                                                    @foreach($item->directors as $director)
                                                        @if ($loop->first)
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Diễn viên:
                                                    @foreach($item->casts as $cast)
                                                        @if ($loop->first)
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated:
                                                    <b class="text-danger">{{ $item->rating->name }}</b>
                                                    - {{ $item->rating->description }}</p>
                                            </a>
                                        </div>
                                        <div class="card-footer h-25">
                                            <a class="btn btn-primary float-end">XEM</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Movie: end -->
                    @else
                        <!-- Post -->
                        <div class="card text-bg-light mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <a href="/movie/1">
                                        @if(strstr($item->image,"https") === "")
                                            <img class="img-fluid rounded-start" style="max-width: 300px"
                                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $item->image }}.jpg"
                                                 alt="">
                                        @else
                                            <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $item->image }}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="card-body h-75">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text"
                                           style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">
                                            {{ $item->content }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-body-secondary">{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</small>
                                        </p>
                                    </div>
                                    <div class="card-footer h-25">
                                        <a class="btn btn-primary float-end">XEM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post: end -->
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
