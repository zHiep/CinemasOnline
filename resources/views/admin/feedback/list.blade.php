@extends('admin.layout.index')
@section('content')
    @can('feedback')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>@lang('lang.feedback')</h6>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $arr)
                                {{$arr}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 ">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        @lang('lang.fullname')
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        @lang('lang.phone')
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        @lang('lang.created_at')
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        @lang('lang.message')
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feed as $value)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{!! $value['phone'] !!}</span>
                                            </td>
                                            <td class="align-middle text-center">

                                                <span class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button href="#feedback_message" class="btn btn-link text-danger "
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#feedback_message{!! $value['id'] !!}"><i style="color:grey" class="fa-sharp fa-regular fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @include('admin.feedback.message')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $feed->links() !!}
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

