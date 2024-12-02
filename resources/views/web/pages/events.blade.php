@extends('web.layout.index')
@section('events')
active
@endsection
@section('content')
<section class="container-lg">
    <!-- Main content -->
    <div class="mt-5" id="Events">
        <ul class="nav justify-content-start mb-4 align-items-center">
            <li class="nav-item">
                <a class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning" href="#tintuc" role="button" data-bs-target="#tintuc" disabled>
                    @lang('lang.events')
                </a>
            </li>
        </ul>

        <div id="tintuc" class="d-flex flex-column" data-bs-parent="#Events">
            <?php $i = 1 ?>
            @foreach($posts as $post)
            <?php $i++ ?>
            @if($i % 2 == 0)
            <!-- Post -->
            <div class="card bg-transparent border-0 mb-3">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <a @if($post->type == 'post') href="/events-detail/{!! $post->id !!}"
                            @else href="/events-detail/{!! $post->id !!}" @endif>
                            @if(strstr($post->image,"https") === "")
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $post->image }}.jpg" alt="">
                            @else
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $post->image }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="flex-grow-1">
                        <div class="card-body bg-transparent h-75">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">
                                {{ strip_tags($post->content) }}
                            </p>
                            <p class="card-text">
                                <small class="text-body-secondary">{{ date('d-m-Y H:i', strtotime($post->created_at)) }}</small>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 h-25">
                            <a @if($post->type == 'post') href="/events-detail/{!! $post->id !!}"
                                @else href="/events-detail/{!! $post->id !!}" @endif class="btn btn-primary float-end">@lang('lang.show')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post: end -->
            <div class="bg-dark mb-4" style="height: 2px"></div>
            @else
            <!-- Post -->
            <div class="card bg-transparent border-0 mb-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="card-body bg-transparent h-75">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">{{ strip_tags($post->content) }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ date('d-m-Y H:i', strtotime($post->created_at)) }}</small></p>
                        </div>
                        <div class="card-footer border-0 bg-transparent h-25">
                            <a @if($post->type == 'post') href="/events-detail/{!! $post->id !!}"
                                @else href="/events-detail/{!! $post->id !!}" @endif class="btn btn-primary float-start">XEM</a>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a @if($post->type == 'post') href="/events-detail/{!! $post->id !!}"
                            @else href="/events-detail/{!! $post->id !!}" @endif>
                            @if(strstr($post->image,"https") === "")
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $post->image }}.jpg" alt="">
                            @else
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $post->image }}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            <!-- Post: end -->
            <div class="bg-dark mb-4" style="height: 2px"></div>
            @endif
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item @if($posts->currentPage() == 1) disabled @endif">
                        <a class="page-link" href="/events?page={{ $posts->currentPage()-1 }}">Previous</a>
                    </li>
                    @for($i = 1; $i <= $posts->lastPage(); $i++)
                        <li class="page-item"><a class="page-link" href="/events?page={{$i}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item @if($posts->currentPage() == $posts->lastPage()) disabled @endif">
                            <a class="page-link" href="/events?page={{$posts->currentPage()+1}}">Next</a>
                        </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $("#Events .nav .nav-item .nav-link").on("click", function() {
        $("#Events .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
        $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
    });
</script>
@endsection