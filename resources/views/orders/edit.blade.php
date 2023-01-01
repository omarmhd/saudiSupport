@extends('layouts.app')

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

    <div class="row mt-5">
        <div class="col-md-10">
            <h2 style="color:#007e48">Edit order</h2>
        </div>
        <div class="col-md-2  text-end">
            <a href="{{route('orders.create')}}" class="btn btn-info align-self-start" style="background: #007e48;"> <i class="fa fa-plus"></i> Add order </a>
        </div>

    </div>
    <div class="row row-sm mt-5">


        <div class=" col-md-6">
            <form class="form-horizontal" action="{{route('orders.update',$order->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('put')





                    <div class="card-body pt-0">


                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                                <p class="mg-b-10">Order Type</p>
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
                                       value="{{old('order_no',$order->order_no)}}"
                                       placeholder="Please enter  order number">
                            </div><!-- col-4 -->
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Phone number</p>

                                <input type="text"
                                       id="phone_no"
                                       name="phone_no"
                                       class="form-control"
                                       value="{{old('phone_no',$order->phone_no)}}"
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
                                <textarea class="form-control" name="note_tech"  placeholder="Please enter the problem   " rows="7" spellcheck="false"> {{old('note_tech',$order->note_tech)}}</textarea>

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
        <div class="col-md-6">
            <form action="{{route('room.store')}}"  method="post">

                <div class="modal-body">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                            <div class="main-content-body main-content-body-chat">
                                <div class="main-chat-header">
                                    {{--                    <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
                                    <div class="main-chat-msg-name">
                                        <h6>discussion and notes  <span class="order-number"> </span></h6><small></small>
                                    </div>
                                    <nav class="nav">
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a>
                                    </nav>
                                </div><!-- main-    chat-header -->
                                <div class="main-chat-body" id="ChatBody">
                                    <div class="text-center chat-loading" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... </div>
                                    <div class="content-inner" style=" height:300px!important; /*Height of bottom frame div*/
    overflow: scroll;">


                                        {{--                        <label class="main-chat-time"><span>3 days ago</span></label>--}}
{{--                                        <div class="media flex-row-reverse">--}}

{{--                                            <div class="media-body">--}}

{{--                                                <div class="main-msg-wrapper right ">--}}
{{--                                                    <b style="display: block">omar98</b>--}}
{{--                                                    fdsfdsfsdsd--}}
{{--                                                </div>--}}

{{--                                                <div>--}}
{{--                                                    <span>22 hours from now</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media ">--}}

{{--                                            <div class="media-body">--}}

{{--                                                <div class="main-msg-wrapper right ">--}}
{{--                                                    <b style="display: block">omar98</b>--}}
{{--                                                    fdsfdsfsdsd--}}
{{--                                                </div>--}}

{{--                                                <div>--}}
{{--                                                    <span>22 hours from now</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
                            </div>

                            <div class="main-chat-footer">
                                <nav class="nav">
                                    {{--                    <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>--}}
                                </nav>

                                <input class="form-control message" name="message"  placeholder="Type your message here..." type="text"> <button class="main-msg-send btn btn-chat" ><i class="far fa-paper-plane"></i></button>
                                <input type="hidden"  class="order" name="order_id"  value="">

                            </div>

                        </div>
                    </div>





                </div>


            </form>
        </div>
@endsection

@section('js')

            <script>
                    $(document).ready(function() {
                        const http =window.axios;
                        const Echo=window.Echo;
                        const message=$(".message");
                $('.btn-chat').click(function(e){
                    e.preventDefault()



                    if(message.val()==""){
                        message.addClass('is-invalid')
                    }else{
                        http.post("{{url('message')}}",{
                            'message':message.val(),
                            'user_id':"{{auth()->user()->id}}",
                            'room_id':1,
                            'order_id':"{{$order->id}}"
                        }).then(()=>{
                            message.val('');
                        });
                    }


                });





                    order_id = "{{$order->id}}"
                    let order_number = "{{$order->order_number}}"

                    let url = "{{route('message.show',['message'=>$order->id])}}"
                    url = url.replace(':id', order_id);
                    $('.content-inner').addClass('content-inner'+ order_id);
                    $.ajax({

                        url: url,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('.chat-loading').show();
                        },
                        complete: function () {
                            $('.chat-loading').hide();
                        },
                        success: (data) => {


                            $.each(data.message, function (key, value) {


                                $('.content-inner').append(`
                        <div class="media flex-row-reverse">

                                            <div class="media-body">

                                                <div class="main-msg-wrapper right ">
                                                    <b style="display: block">` + value.user_name + `</b>
                                                    ` + value.message + `
                                                </div>

                                                <div>
                                                    <span>` + value.date + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                </div>

                                            </div>
                                        </div>

                            `);

                            });
                        },


                });});
            </script>

    @endsection

