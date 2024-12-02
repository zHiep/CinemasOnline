@extends('admin.layout.index')
@section('css')
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>@lang('lang.manage_ticket_price')</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 mt-5">
                        <div class="table-responsive ">
                            <form action="admin/prices/edit" method="post">
                                @csrf
                                <table class="table table-bordered align-items-center text-center">
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder"></th>
                                        <th class="text-uppercase font-weight-bolder"></th>
                                        <th class="text-uppercase font-weight-bolder">@lang('lang.student')</th>
                                        <th class="text-uppercase font-weight-bolder">@lang('lang.adult')</th>
                                        <th class="text-uppercase font-weight-bolder">@lang('lang.old_child')</th>
                                        <th class="text-uppercase font-weight-bolder">@lang('lang.member_online')</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-light">
                                    <tr>
                                        <th rowspan="2">
                                            @lang('lang.monday'),@lang('lang.tuesday'),@lang('lang.wednesday'),@lang('lang.thursday')
                                        </th>
                                        <td>@lang('lang.before') 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="hssv2345t17" value="{{ $hssv2345t17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nl2345t17" value="{{ $nl2345t17 }}" aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nctte2345t17" value="{{ $nctte2345t17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt2345t17" value="{{ $vtt2345t17 }}" aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('lang.after') 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="hssv2345s17" value="{{ $hssv2345s17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nl2345s17" value="{{ $nl2345s17 }}" aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nctte2345s17" value="{{ $nctte2345s17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt2345s17" value="{{ $vtt2345s17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">
                                            @lang('lang.friday'),   @lang('lang.saturday'),   @lang('lang.sunday')
                                        </th>
                                        <td>@lang('lang.before') 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="hssv67cnt17" value="{{ $hssv67cnt17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nl67cnt17" value="{{ $nl67cnt17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nctte67cnt17" value="{{ $nctte67cnt17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt67cnt17" value="{{ $vtt67cnt17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('lang.after') 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="hssv67cns17" value="{{ $hssv67cns17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nl67cns17" value="{{ $nl67cns17 }}" aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="nctte67cns17" value="{{ $nctte67cns17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt67cns17" value="{{ $vtt67cns17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder" colspan="6">
                                            @lang('lang.surcharge')
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-light">
                                    @foreach($roomTypes as $roomType)
                                        <tr>
                                            <td class="text-end">
                                                {{ $roomType->name }}
                                            </td>
                                            <td colspan="5">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="{{ $roomType->name }}"
                                                           value="{{ $roomType->surcharge }}"
                                                           aria-label="">
                                                    <span class="input-group-text">đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($seatTypes as $seatType)
                                        <tr>
                                            <td class="text-end">
                                                Ghế {{ $seatType->name }}
                                            </td>
                                            <td colspan="5">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="{{ $seatType->name }}"
                                                           value="{{ $seatType->surcharge }}"
                                                           aria-label="">
                                                    <span class="input-group-text">đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" class="btn btn-primary float-end m-2">@lang('lang.save')</button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
