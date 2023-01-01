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
    <div class="row mt-5">
        <div class="col-md-10">
            <h2 style="color:#007e48">Add Order</h2>
        </div>
{{--        <div class="col-md-2  text-end">--}}
{{--            <a href="{{route('orders.create')}}" class="btn btn-info align-self-start" style="background: #007e48;"> <i class="fa fa-plus"></i> Add order </a>--}}
{{--        </div>--}}

    </div>
    <div class="row row-sm">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{route('orders.store')}}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="card-body pt-0">


                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                            <p class="mg-b-10">Order Type</p>
                            <select class="form-control select2-no-search" name="type_order" >
                                <option selected disabled value=""> Please Select option</option>
                                <option value="Exchange"    >
                                    Exchange
                                </option>
                                <option value="Refund"  >
                                    Refund
                                </option>
                                <option value="Cancel" >
                                    Cancel
                                </option>

                                <option value="Edit">
                                    Edit
                                </option>


                            </select>
                        </div>
                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">

                            <p class="mg-b-10">To Department</p>
                            <select class="form-control select2-no-search" name="department_id" >
                                <option selected disabled value=""> Please Select option</option>

                                @foreach($departments as $department)
                                    <option {{ $department->id == $department->id ? "selected" : "" }}   value="{{$department->id}}">{{$department->name}}</option>

                                @endforeach



                            </select>
                        </div>

                        <!-- col-4 -->
                    </div>

                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-4">
                            <p class="mg-b-10">Order number</p>

                            <input type="number"
                                   id="order_no"
                                   name="order_no"
                                   class="form-control"
                                   value="{{old('order_no')}}"
                                   placeholder="Please enter  order number">
                        </div><!-- col-4 -->
                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Phone number</p>

                            <input type="text"
                                   id="phone_no"
                                   name="phone_no"
                                   class="form-control"
                                   value="{{old('phone_no')}}"
                                   placeholder="Please enter  phone number   ">
                        </div>

                        {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                        {{--                                <p class="mg-b-10">Product Name</p>--}}
                        {{--                                <input type="text"--}}
                        {{--                                       id="product_name"--}}
                        {{--                                       name="product_name"--}}
                        {{--                                       class="form-control"--}}
                        {{--                                       value="{{old('product_name', $order->product_name)}}"--}}
                        {{--                                       placeholder="Please enter the product name ">--}}
                        {{--                            </div>--}}
                    </div>

                    <div class="row row-sm mg-b-20">

                    {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                    {{--                                <p class="mg-b-10">Alternative product</p>--}}
                    {{--                                <input type="text"--}}
                    {{--                                       id="alternative_product"--}}
                    {{--                                       name="alternative_product"--}}
                    {{--                                       class="form-control"--}}
                    {{--                                       value="{{old('alternative_product',$order->alternative_product)}}"--}}
                    {{--                                       placeholder="Please enter the alternative product--}}
                    {{-- ">--}}
                    {{--                            </div>--}}
                    {{--                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                    {{--                                    <p class="mg-b-10">Attachments</p>--}}
                    {{--                                    <input type="file"--}}
                    {{--                                           id="attachments"--}}
                    {{--                                           name="attachments"--}}
                    {{--                                           class="form-control"--}}

                    {{--                                           placeholder="attachments">--}}
                    {{--                                </div>--}}




                    <!-- col-4 -->
                    </div>
                    <div class="row row-sm mg-b-20">

                        <div class="col-lg-10 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Some Details</p>
                            <textarea class="form-control" name="note_tech"  placeholder="Please enter the problem   " rows="7" spellcheck="false"> {{old('note_tech')}}</textarea>

                        </div>
                        {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                        {{--                                <p class="mg-b-10"> Operations team notes</p>--}}
                        {{--                                <textarea class="form-control" name="note_warehouse"  placeholder="Operations team notes" rows="3" spellcheck="false"></textarea>--}}

                        {{--                            </div>--}}

                        {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                        {{--                                <p class="mg-b-10">Bank accounts</p>--}}
                        {{--                                <textarea class="form-control" name="bank_accounts"  placeholder="Please enter the bank accounts" rows="3" spellcheck="false">{{old('bank_accounts',$order->bank_accounts)}}</textarea>--}}

                        {{--                            </div>--}}

                        {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                        {{--                                <p class="mg-b-10">The Detials</p>--}}

                        {{--                                <textarea class="form-control" name="details" placeholder="Detials" rows="3" spellcheck="false"></textarea>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="col-lg-4">--}}
                        {{--                                <p class="mg-b-10">order journey</p>--}}
                        {{--                                <select class="form-control select2-no-search" name="order_journey">--}}
                        {{--                                    <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >--}}
                        {{--                                        New Order--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>--}}
                        {{--                                        Processing--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>--}}
                        {{--                                        Preview--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>--}}
                        {{--                                        Completed--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>--}}
                        {{--                                        Canceled--}}
                        {{--                                    </option>--}}

                        {{--                                </select>--}}
                        {{--                            </div>--}}


                    </div>


                </div>

                <div class="card-body pt-0">



                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="submit" class="btn btn-secondary">@lang('site.cancel')</button>
                        </div>
                    </div>


                </div>

            </form>

        </div>



@endsection


