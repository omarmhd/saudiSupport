@extends('layouts.app')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Edit</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ orders</span>
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
                    <h4 class="card-title mb-1">Edit order</h4>
                    <p class="mb-2"></p>
                </div>
                <form class="form-horizontal" action="{{route('orders.update',$order->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <input type="hidden" name="typeOrder" value="{{$check_type}}">

                    @if($check_type=="Exchange_Page")

                        <div class="card-body pt-0">


                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Order arrived</p>
                                    <select class="form-control select2-no-search" name="order_arrived" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('order_arrived',$order->order_arrived) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('order_arrived',$order->order_arrived) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Send alternative</p>
                                    <select class="form-control select2-no-search" name="send_alternative" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('send_alternative',$order->send_alternative) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('send_alternative',$order->send_alternative) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">

                                        <p class="mg-b-10">Policy  Upload </p>
                                    <input type="file" name="policy_attachment" class="form-control" >

                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>
                                <!-- col-4 -->
                            </div>



                        </div>


                    @elseif($check_type=="Refund_Page")
                        <div class="card-body pt-0">



                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Order arrived</p>
                                    <select class="form-control select2-no-search" name="order_arrived" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('order_arrived',$order->order_arrived) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('order_arrived',$order->order_arrived) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Has the amount been transferred?</p>
                                    <select class="form-control select2-no-search" name="amount_transferred" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('amount_transferred',$order->amount_transferred) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('amount_transferred',$order->amount_transferred) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>


                                <!-- col-4 -->
                            </div>



                        </div>


                    @elseif($check_type=="Cancel_Page")
                        <div class="card-body pt-0">


                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Has the Order been cancelled?</p>
                                    <select class="form-control select2-no-search" name="done_cancel" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('done_cancel',$order->done_cancel) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('done_cancel',$order->done_cancel) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> Has the amount been transferred?</p>
                                    <select class="form-control select2-no-search" name="amount_transferred" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('amount_transferred',$order->amount_transferred) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('amount_transferred',$order->amount_transferred) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>


                                <!-- col-4 -->
                            </div>



                        </div>

                    @elseif($check_type=="Edit_Page")
                        <div class="card-body pt-0">


                            <div class="row row-sm mg-b-20">

                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10"> The difference in the value of the product has been sent ?</p>
                                    <select class="form-control select2-no-search" name="done_valdiff" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="yes" {{ old('done_valdiff',$order->done_valdiff) == 'yes' ? "selected" : "" }}>
                                            Yes
                                        </option>
                                        <option value="no"    {{ old('done_valdiff',$order->done_valdiff) == 'no' ? "selected" : "" }}>
                                            No
                                        </option>



                                    </select>
                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>


                                <!-- col-4 -->
                            </div>



                        </div>
                    @elseif($check_type=="Preview_Page")
                        <div class="card-body pt-0">


                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Warehouse Note</p>
                                    <textarea class="form-control" name="note_warehouse"  placeholder="Please enter the Note   " rows="3" spellcheck="false"> {{old('note_warehouse',$order->note_warehouse)}}</textarea>

                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Manegment Note</p>
                                    <textarea class="form-control" name="note_salah"  placeholder="Please enter the Note   " rows="3" spellcheck="false"> {{old('note_salah',$order->note_salah)}}</textarea>
ء
                                </div>
                                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>




                                <!-- col-4 -->
                            </div>



                        </div>

                    @else

                        <div class="card-body pt-0">


                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                    <p class="mg-b-10">Order type</p>
                                    <select class="form-control select2-no-search" name="type_order" >
                                        <option selected disabled value=""> Please Select option</option>
                                        <option value="Exchange"  {{ $order->type_order == 'Exchange' ? "selected" : "" }}   {{ old('order_type') == 'exchange' ? "selected" : "" }}>
                                            Exchange
                                        </option>
                                        <option value="Refund"   {{ $order->type_order == 'Refund' ? "selected" : "" }}>
                                            Refund
                                        </option>
                                        <option value="Cancel" {{ $order->type_order  == 'Cancel' ? "selected" : "" }}>
                                            Cancel
                                        </option>

                                        <option value="Edit" {{$order->type_order  == 'Edit' ? "selected" : "" }}>
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
                                           id="order_no"
                                           name="order_no"
                                           class="form-control"
                                           value="{{old('order_no',$order->order_no)}}"
                                           placeholder="Please enter  order number">
                                </div><!-- col-4 -->
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Phone number</p>

                                    <input type="text"
                                           id="phone_no"
                                           name="phone_no"
                                           class="form-control"
                                           value="{{old('phone_no',$order->phone_no)}}"
                                           placeholder="Please enter  phone number   ">
                                </div>

                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Product Name</p>
                                    <input type="text"
                                           id="product_name"
                                           name="product_name"
                                           class="form-control"
                                           value="{{old('product_name', $order->product_name)}}"
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
                                           value="{{old('alternative_product',$order->alternative_product)}}"
                                           placeholder="Please enter the alternative product
 ">
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Attachments</p>
                                    <input type="file"
                                           id="attachments"
                                           name="attachments"
                                           class="form-control"

                                           placeholder="attachments">
                                </div>




                                <!-- col-4 -->
                            </div>
                            <div class="row row-sm mg-b-20">

                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Problem Or Note</p>
                                    <textarea class="form-control" name="note_tech"  placeholder="Please enter the problem   " rows="7" spellcheck="false"> {{old('note_tech',$order->note_tech)}}</textarea>

                                </div>

                                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10">Bank accounts</p>
                                    <textarea class="form-control" name="bank_accounts"  placeholder="Please enter the bank accounts" rows="3" spellcheck="false">{{old('bank_accounts',$order->bank_accounts)}}</textarea>

                                </div>

                                {{--                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
                                {{--                                <p class="mg-b-10">The Detials</p>--}}

                                {{--                                <textarea class="form-control" name="details" placeholder="Detials" rows="3" spellcheck="false"></textarea>--}}
                                {{--                            </div>--}}

                                <div class="col-lg-4">
                                    <p class="mg-b-10">order journey</p>
                                    <select class="form-control select2-no-search" name="order_journey">
                                        <option value="0"   {{ old('order_journey',$order->order_journey) == '0' ? "selected" : "" }}  >
                                            New Order
                                        </option>
                                        <option value="1"  {{ old('order_journey',$order->order_journey) == '1' ? "selected" : "" }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ old('order_journey',$order->order_journey) == '2' ? "selected" : "" }}>
                                            Preview
                                        </option>
                                        <option value="3" {{ old('order_journey',$order->order_journey) == '3' ? "selected" : "" }}>
                                            Completed
                                        </option>
                                        <option value="4" {{ old('order_journey',$order->order_journey) == '4' ? "selected" : "" }}>
                                            Canceled
                                        </option>

                                    </select>
                                </div>


                            </div>


                        </div>
                    @endif
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
        </div>

@endsection
