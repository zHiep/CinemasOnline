<div class="modal fade modal-lg" id="permission{!! $value['id'] !!}" tabindex="-1" aria-labelledby="permission_title" aria-hidden="true">
    <form action="admin/staff/permission/{!! $value['id'] !!}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permission_title">{!! $value['fullName'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                $user_permission = $value->getDirectPermissions();//get permission for user
                ?>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row row-cols-3">
                            @foreach($permission as $permiss)
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{!! $permiss['name'] !!}"
                                                   id="{!! $value['id'].$permiss['id'] !!}"
                                                   name="permission[]"
                                                   @foreach($user_permission as $up)
                                                       @if($up['id'] == $permiss['id'])
                                                           checked
                                                @endif
                                                @endforeach >
                                            <label class="text-nowrap form-check-label" for="{!! $value['id'].$permiss['id'] !!}">
                                                {!! $permiss['name'] !!}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-success m-b-0" onclick='selects()' value="Select All">@lang('lang.select_all')</button>
                    <button type="button" class="btn bg-gradient-warning m-b-0" onclick='unselects()' value="Select All">@lang('lang.unselect_all')</button>
                    <button type="button" class="btn bg-gradient-secondary ms-auto" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn bg-gradient-info">@lang('lang.save')</button>
                </div>
            </div>
        </div>
    </form>
</div>

