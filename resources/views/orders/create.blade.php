@extends('layouts.app')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">create</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Data Tables</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">@lang('site.add_order')</h4>
                    <p class="mb-2"></p>
                </div>
                <form class="form-horizontal" action="{{route('orders.store')}}" method="post" >
                    @csrf


                    <div class="card-body pt-0">


                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-4">
                                <p class="mg-b-10">order number</p>

                                <input type="text"
                                       id="order_no"
                                       name="order_no"
                                       class="form-control"
                                       value="{{old('order_no')}}"
                                       placeholder="order number">
                            </div><!-- col-4 -->
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">phone number</p>

                                <input type="text"
                                       id="phone_no"
                                       name="phone_no"
                                       class="form-control"
                                       value="{{old('phone_no')}}"
                                       placeholder="phone number">
                            </div>

                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Product Name</p>
                                <input type="text"
                                       id="product_name"
                                       name="product_name"
                                       class="form-control"
                                       value="{{old('product_name')}}"
                                       placeholder="product name">
                            </div>



                            <!-- col-4 -->
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                <p class="mg-b-10">order type</p>
                                <select class="form-control select2-no-search" name="order_type" >

                                    <option value="refund"  {{ old('order_type') == 'refund' ? "selected" : "" }}>
                                        refund
                                    </option>
                                    <option value="exchange"  {{ old('order_type') == 'exchange' ? "selected" : "" }}>
                                        exchange
                                    </option>
                                    <option value="another" {{ old('order_type') == 'another' ? "selected" : "" }}>
                                        another
                                    </option>


                                </select>
                            </div>

                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Attachments</p>
                                <input type="url"
                                       id="attachments"
                                       name="attachments"
                                       class="form-control"
                                       value="{{old('attachments')}}"
                                       placeholder="attachments">                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10"> Tracking ID</p>
                                <input type="text"
                                       id="track"
                                       name="track"
                                       class="form-control"
                                       value="{{old('track')}}"
                                       placeholder="track">                                </div>



                            <!-- col-4 -->
                        </div>
                        <div class="row row-sm mg-b-20">



                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">The Detials</p>

                                <textarea class="form-control" name="details" placeholder="Detials" rows="3" spellcheck="false"></textarea>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Note</p>
                                <textarea class="form-control" name="note_tech"  placeholder="Note" rows="3" spellcheck="false"></textarea>

                            </div>
                            <div class="col-lg-4">
                                <p class="mg-b-10">order journey</p>
                                <select class="form-control select2-no-search" name="order_journey">
                                    <option value="0" selected>
                                        new
                                    </option>
                                    <option value="1">
                                        Tracking
                                    </option>
                                    <option value="2">
                                        preview
                                    </option>
                                    <option value="3">
                                        completed
                                    </option>
                                    <option value="4">
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





                </form>
            </div>
        </div>
@endsection
