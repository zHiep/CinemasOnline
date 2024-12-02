@extends('admin.layout.index')
@section('content')
    @can('food')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Combo</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal"
                                            data-bs-target="#combo">@lang('lang.create')
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.name')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.image')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Chi tiết</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.price')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($combos as $combo)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $combo->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(strstr($combo->image,"https") == "")
                                                    <img style="width: 300px"
                                                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{$combo->image}}.jpg"
                                                         alt="user1">
                                                @else
                                                    <img style="width: 300px"
                                                         src="{!! $combo->image !!}" alt="user1">
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @foreach($combo->foods as $food)
                                                    {{ $food->name . ' x '. $food->pivot->quantity}} <br>
                                                @endforeach
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ number_format($combo->price) }} đ</span>
                                            </td>
                                            <td id="status{{$combo->id}}" class="align-middle text-center text-sm ">
                                                @if($combo->status == 1)
                                                    <a href="javascript:void(0)" class="btn_active" onclick="changeStatus({{ $combo->id }},0)">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn_active" onclick="changeStatus({{ $combo->id }},1)">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit combo" data-bs-target="#comboEdit_{{$combo->id}}"
                                                   data-bs-toggle="modal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                                @include('admin.combo.edit')
                                            </td>
                                            <td class="align-middle">
                                                <a onclick="deleteCombo({{$combo->id}})"
                                                   class="text-secondary font-weight-bold text-xs delete_combo">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                            {{--                            <div class="d-flex justify-content-center mt-3">--}}
                            {{--                                {!! $combo->links() !!}--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.combo.create')
        </div>
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            deleteCombo = (id) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: 'admin/combo/delete/' + id,
                        type: 'DELETE',
                        statusCode: {
                            200: function (data) {
                                console.log(trObj);
                                $('.delete_combo').parents("tr").remove();
                            },
                            400: (data) => {
                                alert(data.error);
                            }
                        }
                    })
                    ;
                }
            }

            $('.add_food').on('click', (e) => {
                foodGroup =
                    `<div class="input-group m-1">
                    <span class="input-group-text text-black-50">@lang('lang.food'): </span>
                    <select type='text' name='food[]' class="form-select" aria-label="food">
                        @foreach($foods as $food)<option value="{{$food->id}}">{{$food->name}}</option>@endforeach
                    </select>
                    <span class="input-group-text text-black-50">@lang('lang.quantity'): </span>
                    <input type="number" name="quantity[]" class="form-control" placeholder="quantity..." aria-label="quantity">
                    <button type="button" class="btn btn-danger mb-0 delete_food"><i class="fa-solid fa-trash"></i></button>
                </div>`
                $(e.target).parent().find('.food_group').append(foodGroup);
            })

            $('.food_group').on('click', '.delete_food', (e) => {
                $(e.target).parent('.input-group').remove();
            })

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.file-uploader .img_combo').attr('src', e.target.result).removeClass('d-none');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".image-combo").change(function () {
                readURL(this);
            });
        });
    </script>
    <script>
        function changeStatus(combo_id, active) {
            if (active === 1) {
                $("#status" + combo_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changeStatus(' + combo_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
            } else {
                $("#status" + combo_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changeStatus(' + combo_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/combo/status",
                type: 'GET',
                dataType: 'json',
                data: {
                    'active': active,
                    'combo_id': combo_id
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
