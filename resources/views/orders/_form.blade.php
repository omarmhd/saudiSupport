<div class="card-body pt-0">


<div class="row row-sm mg-b-20">
    <div class="col-lg-4">
        <p class="mg-b-10">order number</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">phone number</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div>

    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">Product Name</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div>



    <!-- col-4 -->
</div>
<div class="row row-sm mg-b-20">
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">Type Order</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div>

    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">Attachments</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div>
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10"> Tracking ID</p>
        <x-form.input type="number"  name="name" value="" class="" id="inputName" :placeholder="__('site.name')"/>
    </div>



    <!-- col-4 -->
</div>
<div class="row row-sm mg-b-20">



    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">The Detials</p>

        <textarea class="form-control" placeholder="Textarea" rows="3" spellcheck="false"></textarea>
    </div>
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <p class="mg-b-10">Note</p>
        <textarea class="form-control" placeholder="Textarea" rows="3" spellcheck="false"></textarea>

    </div>
    <div class="col-lg-4">
        <p class="mg-b-10">order journey</p><select class="form-control select2-no-search">

            <option value="Firefox">
               Tracking
            </option>
            <option value="Firefox">
               preview
            </option>
            <option value="Chrome">
                completed
            </option>
            <option value="Safari">
                canceled
            </option>

        </select>
    </div>


</div>


</div>

<div class="card-body pt-0">

{{--    <div class="row row-sm mg-b-20 mg-t-10">--}}




{{--        <div class="col-lg-3 mg-t-20 mg-lg-t-3">--}}
{{--            <label class="ckbox">--}}
{{--                <input checked="" type="checkbox">--}}
{{--                <span>order arrived </span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--        <div class="col-lg-3 mg-t-20 mg-lg-t-0">--}}
{{--            <label class="ckbox"><input checked="" type="checkbox"><span>Checkbox Checked</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="col-lg-3" data-select2-id="21">--}}

{{--            <select class="form-control select2-no-search select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true"><option label="Choose one" data-select2-id="15"> </option> <option value="Firefox" data-select2-id="28"> Firefox </option> <option value="Chrome" data-select2-id="29"> Chrome </option> <option value="Safari" data-select2-id="30"> Safari </option> <option value="Opera" data-select2-id="31"> Opera </option> <option value="Internet Explorer" data-select2-id="32"> Internet Explorer </option> </select><span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" data-select2-id="14" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-qkfq-container"><span class="select2-selection__rendered" id="select2-qkfq-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Choose one</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> </div>--}}


{{--    </div>--}}

    <div class="form-group mb-0 mt-3 justify-content-end">
        <div>
            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
            <button type="submit" class="btn btn-secondary">@lang('site.cancel')</button>
        </div>
    </div>


</div>



