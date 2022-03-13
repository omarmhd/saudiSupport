<div class="form-group">

    <x-form.input type="text"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
</div>
<div class="form-group">
    <x-form.input type="email"  name="email" value="" class="" id="email" :placeholder="__('site.email')"/>
</div>
<div class="form-group">
    <x-form.input type="text"  name="password" value="" class="" id="password" :placeholder="__('site.password')"/>
</div>
<div class="form-group mb-0 justify-content-end">
    <div class="checkbox">
        <div class="custom-checkbox custom-control">

        </div>
    </div>
</div>
@php
    $models=['users'];
@endphp


<div class="card">
    <div class="card-body">
        <div class="tabs-menu ">
            <!-- Tabs -->
            <ul class="nav nav-tabs profile navtab-custom panel-tabs">

                @foreach($models as $key=>$value)

                <li class="{{$key==0?'active':'' }}">
                    <a href="#{{$value}}" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs"></span> @lang("site.$value") </a>
                </li>

                @endforeach

            </ul>
        </div>
        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
            <div class="row">
                <div class="col-lg-2">
                    <label class="ckbox">
                        <input type="checkbox" name="permissions[]" value="users-create">
                        <span>create</span>
                    </label>
                </div>
                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                    <label class="ckbox">
                        <input checked="" type="checkbox" name="permissions[]" value="users-read">
                        <span>read</span>
                    </label>
                </div>
                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                    <label class="ckbox">
                        <input checked="" type="checkbox" name="permissions[]" value="users-edit">
                        <span>edit</span>
                    </label>
                </div>

                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                    <label class="ckbox">
                        <input checked="" type="checkbox" name="permissions[]" value="users-delete">
                        <span>delete</span>
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">@lang('site.add')</button>
        <button type="submit" class="btn btn-secondary">@lang('site.cancel')</button>
    </div>
</div>
