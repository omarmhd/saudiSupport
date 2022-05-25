<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{URL::asset('assets/js/bs4-toast.js')}}"></script>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script >

    $(function() {


        $('select[name=type_order]').change(function(){

            let selected_value=$(this).val()
            if (selected_value=="Exchange" || selected_value=="Edit"){


                $('input[name=alternative_product]').parent().fadeIn()
                $('textarea[name=bank_accounts]').parent().fadeOut()

            }else{
                $('input[name=alternative_product]').parent().fadeOut()
                $('textarea[name=bank_accounts]').parent().fadeIn()

            }


        })

    })



</script>
@stack('js')
@auth
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('07a46184a23cfd2e28e4', {
        cluster: 'ap2',
        authEndpoint:'/broadcasting/auth'
    });
    function audio(){
        new Audio("{{asset('assets/soud-notification.mp3')}}").play();    }

    var channel = pusher.subscribe('private-App.Models.User.{{auth()->user()->id}}');
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
        audio()
        Swal.fire(
            '',
            'You have new notifications',
            'info'
        )



        $('.main-notification-list').prepend(`
            <a class="d-flex p-3 border-bottom" href="`+data.action+`" style="background: #ECF0FA ">
                                    <div class="notifyimg bg-pink">

                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">`+data.message+`</h5>
                                        <div class="notification-subtext">`+data.time+`</div>
                                    </div>
                                    <div class="mr-auto" >
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
        `);


    });


</script>

<script>
    $(function () {




        var channel1 = pusher.subscribe('private-chat.{{auth()->user()->id}}');
        channel1.bind('private-chat-event', function(data) {
            var current_user="{{auth()->user()->id}}";
            var user_sent=data.user.id;

            var class_show=current_user==user_sent ? 'media flex-row-reverse'  : 'media'


            $('.content-inner'+data.message.order_id).append( `<div class="`+class_show+`">
                {{--                            <div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>--}}

            <div class="media-body">

                <div class="main-msg-wrapper right">
                    <B STYLE="display: block">`+data.user.name+`</B>
                    `+data.message.message+`

                </div>

                <div>
                    <span>`+data.time+`</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div>

                </div>
            </div>`);
            $(".content-inner ").scrollTop($(".content-inner ")[0].scrollHeight);














        });

        {{--window.Echo.private('chat.{{auth()->user()->id}}').listen('private-chat-event', (e) => {--}}
        {{--        $('.main-chat-list').append(`    <div class="media new">--}}
        {{--                    sssssssssssssssss--}}
        {{--            </div>`)--}}

        {{--        this.messages.push({--}}
        {{--            message: e.message.message,--}}
        {{--            user: e.user--}}
        {{--        });--}}
        {{--    });--}}


    })
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    $(document).ready(function() {
        var order_id=0;



        // $(document).on('show.bs.modal','#add-chat',(function (e) {
        $('#add-chat').bind('show.bs.modal',(function (e) {

            let button = $(e.relatedTarget)
            let modal=$(this)
            modal.find('.content-inner').empty();

            order_id=button.data('id');
            let order_number=button.data('order-number')
            modal.find('.order-number').text(order_number)
            let url = "{{route('message.show',['message'=>':id'])}}"
            url = url.replace(':id', order_id);
            $('.content-inner').addClass('content-inner'+order_id);
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
                                                    <b style="display: block">`+value.user_name+`</b>
                                                    `+value.message+`
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


        }));
        $('#add-chat').bind('hide.bs.modal',(function (e) {

            $('.content-inner').removeClass('content-inner'+order_id);



        }));

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
@endauth
