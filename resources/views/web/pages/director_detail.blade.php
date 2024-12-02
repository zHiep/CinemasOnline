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
                <li class="breadcrumb-item"><a class="link link-dark text-decoration-none">@lang('lang.casts')</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $director['name'] !!}</li>
            </ol>
        </nav>

        <div class="movie mt-5">
            {{--  Movie title  --}}
            <h2 class="mt-2">{!! $director['name'] !!}</h2>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-4 border-warning rounded-0">
                        @if(strstr($director['image'],"https") == "")
                            <img class="card-img-top rounded-0" alt='...'
                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $director['image'] !!}.jpg">
                        @else
                            <img class="card-img-top rounded-0" alt='...'
                                 src="{!! $director['image'] !!}">
                        @endif
                    </div>
                </div>

                <div class="col-sm-6 col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.national')
                                : </strong>{!! $director['national'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.birthday')
                                : </strong>{!! $director['birthday'] !!}
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
                        {!! $director['content'] !!}
                    </div>
                </div>
            </div>
            <div class="row container">
                <h4 class="mt-4">Phim đã tham gia</h4>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($director['movies'] as $value)
                            <tr>
                                <td>
                                    <a href="/movie/{!! $value['id'] !!}" class="link link-dark text-decoration-none hover_movie">
                                        @if(strstr($value['image'],"https") == "")
                                            <img class="card-img-top rounded-0" alt='...'
                                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg" style="width: 50px">
                                        @else
                                            <img class="card-img-top rounded-0" alt='...'
                                                 src="{!! $value['image'] !!}" style="width: 50px">
                                        @endif
                                        &nbsp; {!! $value['name'] !!}
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

