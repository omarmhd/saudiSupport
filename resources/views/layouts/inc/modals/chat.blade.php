
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
                                    <div class="text-center chat-loading" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... </div>
                                    <div class="content-inner" style=" height:300px!important; /*Height of bottom frame div*/
    overflow: scroll;">


                                            {{--                        <label class="main-chat-time"><span>3 days ago</span></label>--}}
                                        <div class="media flex-row-reverse">

                                            <div class="media-body">

                                                <div class="main-msg-wrapper right ">
                                                    <b style="display: block">omar98</b>
                                                    fdsfdsfsdsd
                                                </div>

                                                <div>
                                                    <span>22 hours from now</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="media ">

                                            <div class="media-body">

                                                <div class="main-msg-wrapper right ">
                                                    <b style="display: block">omar98</b>
                                                    fdsfdsfsdsd
                                                </div>

                                                <div>
                                                    <span>22 hours from now</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
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
                                <input type="hidden"  class="order" name="order_id"  value="">

                            </div>

                        </div>
                    </div>





                </div>


            </form>
        </div>
    </div>
</div>
<!-- Small modal -->
@push('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

       $(function () {
           var order_id=0;



            // $(document).on('show.bs.modal','#add-chat',(function (e) {
                $('#add-chat').bind('show.bs.modal',(function (event) {
                let button = $(event.relatedTarget)
                let modal=$(this)
                modal.find('.content-inner').empty();
                        order_id=button.data('id');

                let url = "{{route('message.show',['message'=>':id'])}}"
                url = url.replace(':id', order_id);
                $.ajax({

                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('.chat-loading').show();
                    },
                    complete: function(){
                        $('.chat-loading').hide();
                    },
                    success: (data) => {
                        $.each(data.message, function (key, value) {

                            $('.content-inner').append(`
                        <div class="media flex-row-reverse">

                                            <div class="media-body">

                                                <div class="main-msg-wrapper right ">
                                                    <b style="display: block">omar98</b>
                                                    fdsfdsfsdsd
                                                </div>

                                                <div>
                                                    <span>22 hours from now</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                </div>

                                            </div>
                                        </div>

                            `);

                        });
                    },
                });


 })


                );
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
                       'order_id':order_id
                   }).then(()=>{
                       message.val('');
                   });
               }


           });
            $(document).on('hide.bs.modal','#add-chat', function (e){
                $(this).removeData();




            });

        })
    </script>
@endpush
