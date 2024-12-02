@extends('admin.layout.index')
@section('content')
    @can('user')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>
                                @lang('lang.user_account')
                                <label for="search">
                                    <input type="text" placeholder="@lang('lang.type') @lang('lang.code') @lang('lang.or') email" class="form-controller" id="search" name="search"/>
                                </label>
                            </h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.code')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.fullname')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.phone')</th>
                                        @role('admin')
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.barcode')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                        @endrole
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.point')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.created_at')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.updated_at')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $value)
                                        @foreach($value['roles'] as $role)
                                            @if($role['name'] == 'user')
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['code'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['phone'] !!}</span>
                                                    </td>
                                                    @role('admin')
                                                    <td class="align-middle text-center">
                                                        <button href="#barcode" class="btn btn-link text-danger "
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#barcode{!! $value['id'] !!}"><i style="color:grey" class="fa-sharp fa-regular fa-eye"></i>
                                                        </button>
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
                                                    @endrole
                                                    <td class="align-middle text-center">

                                                        <span class="text-secondary font-weight-bold">{!! number_format($value['point'],0,",",".") !!} Point</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['updated_at'])) !!}</span>
                                                    </td>
                                                </tr>
                                                @include('admin.user_account.barcode')
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="paginate" class="d-flex justify-content-center mt-3">
                                {!! $users->links() !!}
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
            $paginate = $('#paginate');
            $flag = false;
            $('#search').on('keyup',function(){
                $value = $(this).val();
                if($value != '')
                    $flag = true;
                if($flag == true)
                {
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/user/search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                        console.log($flag);
                        if($value == ''  ){
                            if($flag == true)
                            {
                                $('.card-body').append($paginate);
                                $flag = false;
                            }
                        }else{
                            $('#paginate').remove();
                            $flag = true;
                        }

                    }
                });
                }
            })
        });
    </script>
<script>
    function changestatus(user_id,active){
        if(active === 1){
            $("#status" + user_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus('+ user_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        }else{
            $("#status" + user_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus('+ user_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/user/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'user_id': user_id
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
