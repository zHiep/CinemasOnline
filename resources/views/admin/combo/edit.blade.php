<div class="modal fade" id="comboEdit_{{ $combo->id }}" tabindex="-1" aria-labelledby="combo_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="combo_title">Combo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="admin/combo/edit/{{$combo->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_{{$combo->id}}">@lang('lang.name')</label>
                                    <input id="name_{{$combo->id}}" class="form-control" type="text" value="{{ $combo->name }}" name="name"
                                           autocomplete="off"
                                           placeholder="@lang('lang.type') @lang('lang.name')" aria-label="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price_{{$combo->id}}">@lang('lang.price')</label>
                                    <input id="price_{{$combo->id}}" class="form-control" type="number" name="price" value="{{ $combo->price }}"
                                           placeholder="@lang('lang.type') @lang('lang.price')" aria-label="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group file-uploader">
                                    <label for="img_{{$combo->id}}">@lang('lang.image')</label>
                                    <input id="img_{{$combo->id}}" type='file' name='Image' class="form-control image-combo">
                                    @if(strstr($combo->image,"https") == "")
                                        <img style="width: 100px" alt="..." class="img-thumbnail"
                                             src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{$combo->image}}.jpg">
                                    @else
                                        <img style="width: 100px" alt="..." class="img-thumbnail"
                                             src="{!! $combo->image !!}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 food_group">
                                <span class="form-label">Foods</span>
                                @foreach($combo->foods as $foodOfCombo)
                                    <div class="input-group m-1">
                                        <span class="input-group-text text-black-50">@lang('lang.food'): </span>
                                        <select type='text' name='food[]' class="form-select" aria-label="food">
                                            @foreach($foods as $food)
                                                <option value="{{$food->id}}" @if($food->id == $foodOfCombo->id) selected @endif>
                                                    {{$food->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text text-black-50">@lang('lang.quantity'): </span>
                                        <input type="number" value="{{$foodOfCombo->pivot->quantity}}" name="quantity[]" class="form-control"
                                               placeholder="quantity..."
                                               aria-label="quantity">
                                        <button type="button" class="btn btn-danger mb-0 delete_food"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn m-1 btn-primary add_food">ADD FOOD</button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                </div>
            </form>
        </div>
    </div>
</div>



