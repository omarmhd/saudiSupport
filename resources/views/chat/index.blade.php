@extends('layouts.app')
@section('css')
    <style>
        #back-to-top{
            display: none !important;
        }
    </style>
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex"><h4 class="content-title mb-0 my-auto">Mail</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Chat</span></div>
    </div>

    <div class="d-flex my-xl-auto right-content">

        <div class="pr-1 mb-3 mb-xl-0">
            <a href="" class="btn  " style="background:#007e48 ; color: #FFFFFF"  data-toggle='modal'
               data-id=''   data-target='#add-room'> <i class="fa fa-plus" ></i>  Add Room</a>        </div>




    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
    @include('layouts.inc.modals.add_room',$orders)

    <!-- row -->
<div class="row row-sm main-content-app mb-4">
    <div class="col-xl-4 col-lg-5">
        <div class="card">
            <div class="main-content-left main-content-left-chat">
                <nav class="nav main-nav-line main-nav-line-chat">
                    <a class="nav-link active" data-toggle="tab" href="">Discussion rooms </a>

                </nav>


{{--                <div class="main-chat-contacts-wrapper">--}}
{{--                    <label class="main-content-label main-content-label-sm">Active Contacts (5)</label>--}}
{{--                    <div class="main-chat-contacts" id="chatActiveContacts">--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/3.jpg')}}"></div><small>Adrian</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/12.jpg')}}"></div><small>John</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/4.jpg')}}"></div><small>Daniel</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/13.jpg')}}"></div><small>Katherine</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"></div><small>Raymart</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/14.jpg')}}"></div><small>Junrisk</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></div><small>George</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/15.jpg')}}"></div><small>Maryjane</small>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="main-chat-contacts-more">--}}
{{--                                20+--}}
{{--                            </div><small>More</small>--}}
{{--                        </div>--}}
{{--                    </div><!-- main-active-contacts -->--}}
{{--                </div><!-- main-chat-active-contacts -->--}}
                <div class="main-chat-list" id="ChatList">
                    @foreach($rooms as $room)

                        <a href="{{route('room.show',$room->id)}}">

                        <div class="media new">
                            <div class="main-img-user">
                                <img alt="" src="https://png.pngtree.com/png-clipart/20190905/original/pngtree-cartoon-employee-discussing-work-png-image_4538195.jpg">
                            </div>
                            <div class="media-body">
                                <div class="media-contact-name">
                                    <span>Order No #{{$room->order->order_no}}</span> <span>{{$room->created_at->diffforhumans()}}</span>
                                </div>
                                <p>{{$room->details}}</p>
                            </div>
                        </div>
                        </a>
                    @endforeach

{{--                    <div class="media new">--}}
{{--                        <div class="main-img-user">--}}
{{--                            <img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"> <span>1</span>--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Dexter dela Cruz</span> <span>3 hours</span>--}}
{{--                            </div>--}}
{{--                            <p>Maec enas tempus, tellus eget con dime ntum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media selected">--}}
{{--                        <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Reynante Labares</span> <span>10 hours</span>--}}
{{--                            </div>--}}
{{--                            <p>Nam quam nunc, bl ndit vel aecenas et ante tincid</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/11.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Joyce Chua</span> <span>2 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Ma ecenas tempus, tellus eget con dimen tum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/4.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Rolando Paloso</span> <span>2 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media new">--}}
{{--                        <div class="main-img-user">--}}
{{--                            <img alt="" src="{{URL::asset('assets/img/faces/7.jpg')}}"> <span>1</span>--}}
{{--                        </div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Ariana Monino</span> <span>3 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Maece nas tempus, tellus eget cond imentum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/8.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Maricel Villalon</span> <span>4 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/12.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Maryjane Cruiser</span> <span>5 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/15.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Lovely Dela Cruz</span> <span>5 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/10.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Daniel Padilla</span> <span>5 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/3.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>John Pratts</span> <span>6 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/7.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Raymart Santiago</span> <span>6 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media border-bottom-0">--}}
{{--                        <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></div>--}}
{{--                        <div class="media-body">--}}
{{--                            <div class="media-contact-name">--}}
{{--                                <span>Samuel Lerin</span> <span>7 days</span>--}}
{{--                            </div>--}}
{{--                            <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div><!-- main-chat-list -->
            </div>
        </div>
    </div>
    @if(isset($roomMessage))
    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
            <div class="main-content-body main-content-body-chat">
                <div class="main-chat-header">
{{--                    <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
                    <div class="main-chat-msg-name">
                        <h6>Order No #{{$roomMessage->order->order_no}}</h6><small></small>
                    </div>
                    <nav class="nav">
                        <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a>
                    </nav>
                </div><!-- main-    chat-header -->
                <div class="main-chat-body" id="ChatBody">
                    <div class="content-inner">
                        @foreach($roomMessage->messages as $message)

{{--                        <label class="main-chat-time"><span>3 days ago</span></label>--}}
                        <div class="{{auth()->user()->id==$message->user->id ? 'media flex-row-reverse':'media'}}">
{{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
                            <div class="media-body">

                                <div class="main-msg-wrapper right " >
                                    <B STYLE="display: block">{{$message->user->name}}</B>
                                    {{$message->message}}
                                </div>

                                <div>
                                <span>{{$message->created_at->diffforhumans()}}</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>

                            </div>
                        </div>


                        @endforeach
                    </div>
                </div>
            </div>

            <div class="main-chat-footer">
                <nav class="nav">
{{--                    <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>--}}
                </nav>

                <input class="form-control message" name="message"  placeholder="Type your message here..." type="text"> <button class="main-msg-send btn btn-chat" ><i class="far fa-paper-plane"></i></button>
                                <input type="hidden"  class="room_id" name="room_id"  value="{{$roomMessage->id}}">

            </div>

        </div>
    </div>
        @endif
</div>
<!-- row -->


<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  lightslider js -->
<script src="{{URL::asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>
<!--Internal  Chat js -->
<script src="{{URL::asset('assets/js/chat.js')}}"></script>


@endsection
