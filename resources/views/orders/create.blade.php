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
                    <h4 class="card-title mb-1">Add order</h4>
                    <p class="mb-2"></p>
                </div>
                <form class="form-horizontal" action="{{route('orders.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf


                    <div class="card-body pt-0">


                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                <p class="mg-b-10">Order type</p>
                                <select required  class="form-control select2-no-search" name="type_order" >
                                    <option selected disabled value=""> Please Select option</option>
                                    <option value="Exchange"  {{ old('order_type') == 'exchange' ? "selected" : "" }}>
                                        Exchange
                                    </option>
                                    <option value="Refund"   {{ old('order_type') == 'refund' ? "selected" : "" }}>
                                        Refund
                                    </option>
                                    <option value="Cancel" {{ old('order_type') == 'Cancel' ? "selected" : "" }}>
                                        Cancel
                                    </option>

                                    <option value="Edit" {{ old('order_type') == 'another' ? "selected" : "" }}>
                                        Edit
                                    </option>


                                </select>
                            </div>


                            <!-- col-4 -->
                        </div>

                        <div class="row row-sm mg-b-20">
                        <div class="col-lg-4">
                            <p class="mg-b-10">Order number</p>

                            <input type="text"
                                   required
                                   id="order_no"
                                   name="order_no"
                                   class="form-control"
                                   value="{{old('order_no')}}"
                                   placeholder="Please enter  order number">
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Phone number</p>

                            <input type="text"
                                   id="phone_no"
                                   name="phone_no"
                                   class="form-control"
                                   value="{{old('phone_no')}}"
                                   placeholder="Please enter  phone number   ">
                        </div>

                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Product Name</p>
                            <input type="text"
                                   required
                                   id="product_name"
                                   name="product_name"
                                   class="form-control"
                                   value="{{old('product_name')}}"
                                   placeholder="Please enter the product name ">
                        </div>
                        </div>

                        <div class="row row-sm mg-b-20">

                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Alternative product</p>
                                <input type="text"
                                       id="alternative_product"
                                       name="alternative_product"
                                       class="form-control"
                                       value="{{old('alternative_product')}}"
                                       placeholder="Please enter the alternative product
 ">
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Attachments</p>
                                <input type="file"
                                       id="attachments"
                                       name="attachments"
                                       class="form-control">                            </div>
{{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
{{--                                <p class="mg-b-10"> Tracking ID</p>--}}
{{--                                <input type="text"--}}
{{--                                       id="track"--}}
{{--                                       name="track"--}}
{{--                                       class="form-control"--}}
{{--                                       value="{{old('track')}}"--}}
{{--                                       placeholder="Please enter the track number">                                </div>--}}



                            <!-- col-4 -->
                        </div>
                        <div class="row row-sm mg-b-20">

                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Problem Or Note</p>
                                <textarea class="form-control" name="note_tech"  placeholder="Please enter the problem   " rows="3" spellcheck="false"></textarea>

                            </div>

                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Bank accounts</p>
                                <textarea class="form-control" name="bank_accounts"  placeholder="Please enter the bank accounts" rows="3" spellcheck="false"></textarea>

                            </div>

{{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
{{--                                <p class="mg-b-10">The Detials</p>--}}

{{--                                <textarea class="form-control" name="details" placeholder="Detials" rows="3" spellcheck="false"></textarea>--}}
{{--                            </div>--}}

                            <div class="col-lg-4">
                                <p class="mg-b-10">order journey</p>
                                <select class="form-control select2-no-search" name="order_journey">
                                    <option value="0" selected>
                                        New Order
                                    </option>
                                    <option value="1">
                                        Processing
                                    </option>
                                    <option value="2">
                                        Preview
                                    </option>
                                    <option value="3">
                                        Completed
                                    </option>
                                    <option value="4">
                                        Canceled
                                    </option>

                                </select>
                            </div>


                        </div>


                    </div>

                    <div class="card-body pt-0">



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
