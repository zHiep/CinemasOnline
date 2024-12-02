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
                    @lang('lang.news')
                </a>
            </li>
        </ul>

        <div id="tintuc" class="d-flex flex-column" data-bs-parent="#Events">
            <?php $i = 1 ?>
            @foreach($news->where('status',1) as $value)
            <?php $i++ ?>
            @if($i % 2 == 0)
            <!-- Post -->
            <div class="card mb-3">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <a href="/news-detail/{!! $value['id'] !!}">
                            @if(strstr($value->image,"https") === "")
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $value->image }}.jpg" alt="">
                            @else
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $value->image }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="flex-grow-1">
                        <div class="card-body h-75">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">
                                {{ strip_tags($value->content) }}
                            </p>
                            <p class="card-text">
                                <small class="text-body-secondary">{!! date('d F Y', strtotime($value['created_at'] )) !!}</small>
                            </p>
                        </div>
                        <div class="card-footer h-25">
                            <a href="/news-detail/{!! $value['id'] !!}" class="btn btn-primary float-end">@lang('lang.more')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post: end -->
            @else
            <!-- Post -->
            <div class="card mb-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="card-body h-75">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">{{strip_tags($value->content) }}</p>
                            <p class="card-text"><small class="text-body-secondary">{!! date('d F Y', strtotime($value['created_at'] )) !!}</small></p>
                        </div>
                        <div class="card-footer h-25">
                            <a href="/news-detail/{!! $value['id'] !!}" class="btn btn-primary float-start">@lang('lang.show')</a>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="/news-detail/{!! $value['id'] !!}">
                            @if(strstr($value->image,"https") === "")
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $value->image }}.jpg" alt="">
                            @else
                            <img class="img-fluid rounded-start" style="max-width: 300px" src="{{ $value->image }}" alt="">
                            @endif
                        </a>
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
<script>
    $("#Events .nav .nav-item .nav-link").on("click", function() {
        $("#Events .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
        $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
    });
</script>
@endsection