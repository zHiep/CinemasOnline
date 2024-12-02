@extends('admin.layout.index')
@section('content')
    @can('director')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.discount')</h6>
                        </div>
                        @if(count($errors)>0)
                            <div class="alert alert-warning">
                                @foreach($errors->all() as $arr)
                                    {{$arr}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn bg-gradient-info float-right mb-3" data-bs-toggle="modal" data-bs-target="#discount">@lang('lang.create')
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.name')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.code')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.percent')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.quantity')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($discount as $value)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['name'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['code'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['percent'] !!} %</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['quantity'] !!}</h6>
                                            </td>
                                            <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm ">
                                                @if($value['status'] == 1)
                                                    <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $value['id'] !!},0)">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $value['id'] !!},1)">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="#editDiscount" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit discount" data-bs-target="#editDiscount{!! $value['id'] !!}"
                                                   data-bs-toggle="modal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-url="{{ url('admin/discount/delete', $value['id'] ) }}"
                                                   class="text-secondary font-weight-bold text-xs delete-discount" data-toggle="tooltip">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('admin.discount.edit')
                                    @endforeach
                                    @include('admin.discount.create')
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $discount->links() !!}
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-discount').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
        function changestatus(discount_id,active){
            if(active === 1){
                $("#status" + discount_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus('+ discount_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
            }else{
                $("#status" + discount_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus('+ discount_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/discount/status",
                type: 'GET',
                dataType: 'json',
                data: {
                    'active': active,
                    'discount_id': discount_id
                },
                success: function (data) {
                    if (data['success']) {
                        // alert(data.success);
                    } else if (data['error']) {
                        alert(data.error);
                    }
                }
            });
        }
    </script>
@endsection
