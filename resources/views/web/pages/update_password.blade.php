@extends('web.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @php
                        $token = $_GET['token'];
                        $email = $_GET['email'];
                    @endphp
                    <form method="post" action="/update-password">
                        @csrf
                        <div class="card-body">
                            <p class="text-uppercase text-center text-sm">Cập nhật mật khẩu</p>
                            <div class="row justify-content-center">
                                <div class="col-md-7 mt-4">
                                    <div class="form-group">
                                        <label  class="form-control-label">@lang('lang.new_password')</label>
                                        <input class="form-control" name="password" type="password"
                                               placeholder="@lang('lang.new_password')">
                                    </div>
                                </div>
                                <div class="col-md-7 mt-4">
                                    <div class="form-group">
                                        <label class="form-control-label">@lang('lang.re_password')</label>
                                        <input class="form-control" name="repassword"  type="password"
                                               placeholder="@lang('lang.re_password')">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex m-4">
                                <button type="submit" class="btn btn-warning ms-auto">@lang('lang.submit')</button>
                            </div>
                        </div>
                    <input type="hidden" name="token" value="{!! $token !!}" />
                    <input type="hidden" name="email" value="{!! $email !!}" />
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
