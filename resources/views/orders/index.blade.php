@extends('layouts.app')
@section('css')

{{--    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />--}}
{{--    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />--}}
{{--    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">--}}
@endsection
@section('page-header')


    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Orders Table</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('layouts.inc.modals.show_order')
    @include('layouts.inc.modals.upload_file')
    @include('layouts.inc.modals.chat')

    <div class="row mt-5">
        <div class="col-md-10">
            <h2 style="color:#007e48">{{$department->name}} Orders</h2>
        </div>
        <div class="col-md-2  text-end">
            <a href="{{route('orders.create')}}" class="btn btn-info align-self-start" style="background: #007e48;"> <i class="fa fa-plus"></i> Add order </a>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-bordered    " id="example1_wrapper"    class="display" style="width:100%">
                    <thead>
                    <tr>

                        <th class="wd-15p border-bottom-0" style="width: 10%">order no </th>
                        {{--                                <th class="wd-15p border-bottom-0" style="width: 10%">Phone  No</th>--}}
                        <th class="wd-15p border-bottom-0" style="width: 10%">date</th>

                        <th class="wd-20p border-bottom-0"style="width: 12%">order type</th>

                        <th class="wd-20p border-bottom-0"style="width: 5%">enter order</th>
                        <th class="wd-20p border-bottom-0"style="width: 5%">converted by</th>
                        <th class="wd-20p border-bottom-0"style="width: 5%">in department</th>

                        <th class="wd-20p border-bottom-0" style="width: 30%">options</th>
                    </tr>
                    </thead>
                    <tbody>






                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>{{--    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>--}}
    <!--Internal  Datatable js -->
{{--    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>--}}



    @include('orders._datatable')


    <script>  $(function() {


            $(document).on('click','.archive',function (e){

                e.preventDefault();




                var id=$(this).data('id')
                var url="{{route('orders.destroy',':id')}}";
                url=url.replace(':id',id)

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Archived it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN':"{{ csrf_token() }}"
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: {
                                id: $(this).val(), // < note use of 'this' here

                            },
                            success: function(result) {
                                table_orders.ajax.reload();
                                Swal.fire(
                                    'Archived!',
                                    'This order is archived.',
                                    'success'
                                )
                            },
                            error: function(result) {
                                alert('error');
                            }
                        });

                    }
                })



        })







        })
    </script>


@endsection
@section('js')
    <!--Internal  lightslider js -->
    <script src="{{URL::asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>
    <!--Internal  Chat js -->
    <script src="{{URL::asset('assets/js/chat.js')}}"></script>


@endsection
