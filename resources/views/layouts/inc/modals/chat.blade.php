
<div class="modal add-chat fade bd-example-modal-lg" id="add-chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
{{--            <div class="modal-header" style="background: #007e48;color: #FFFFFF">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF" >New Room <span class="order_no"></span></h5>--}}
{{--                <button type="button" class="close" style="color: #FFFFFF"  data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
            <form action="{{route('room.store')}}"  method="post">

                <div class="modal-body">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                            <div class="main-content-body main-content-body-chat">
                                <div class="main-chat-header">
                                    {{--                    <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
                                    <div class="main-chat-msg-name">
                                        <h6>Order No #</h6><small></small>
                                    </div>
                                    <nav class="nav">
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a>
                                    </nav>
                                </div><!-- main-    chat-header -->
                                <div class="main-chat-body" id="ChatBody">
                                    <div class="content-inner">


                                            {{--                        <label class="main-chat-time"><span>3 days ago</span></label>--}}
                                            <div class="">
                                                {{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}
                                                <div class="media-body">

                                                    <div class="main-msg-wrapper right " >
                                                        <B STYLE="display: block"></B>

                                                    </div>

                                                    <div>
                                                        <span></span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>

                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </div>

                            <div class="main-chat-footer">
                                <nav class="nav">
                                    {{--                    <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>--}}
                                </nav>

                                <input class="form-control message" name="message"  placeholder="Type your message here..." type="text"> <button class="main-msg-send btn btn-chat" ><i class="far fa-paper-plane"></i></button>
                                <input type="hidden"  class="room_id" name="room_id"  value="">

                            </div>

                        </div>
                    </div>





                </div>


            </form>
        </div>
    </div>
</div>
<!-- Small modal -->

