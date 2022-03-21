@extends('layouts.app')
@section('css')

    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

    @include('layouts.inc.modals.show_order')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Data Tables</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="mb-3 mb-xl-0">--}}
            {{--                <div class="btn-group dropdown">--}}
            {{--                    <button type="button" class="btn btn-primary">14 Aug 2019</button>--}}
            {{--                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                        <span class="sr-only">Toggle Dropdown</span>--}}
            {{--                    </button>--}}
            {{--                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">--}}
            {{--                        <a class="dropdown-item" href="#">2015</a>--}}
            {{--                        <a class="dropdown-item" href="#">2016</a>--}}
            {{--                        <a class="dropdown-item" href="#">2017</a>--}}
            {{--                        <a class="dropdown-item" href="#">2018</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')


    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">@lang('site.orders')</h4>
                        <a href="{{route('orders.create')}}" class="btn btn-info" > <i class="fa fa-plus"></i> @lang('site.add_order') </a>

                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> <a href=""></a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap dataTable no-footer table-bordered" id="example1_wrapper" style="width: 100%">
                            <thead>
                            <tr>

                                <th class="wd-15p border-bottom-0" style="width: 10%">order no </th>
                                <th class="wd-15p border-bottom-0" style="width: 10%">Phone  No</th>
                                <th class="wd-15p border-bottom-0" style="width: 10%">date</th>
                                <th class="wd-20p border-bottom-0" style="width: 10%">product name</th>
                                <th class="wd-20p border-bottom-0" style="width: 10%">Track no</th>
                                <th class="wd-20p border-bottom-0"style="width: 12%">order journey</th>
                                <th class="wd-20p border-bottom-0"style="width: 10%">type order</th>

                                <th class="wd-20p border-bottom-0" style="width: 30%">options</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script>
        globalThis.table_orders=$('#example1_wrapper').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: '{{ route('orders.indexArchive') }}',
            columns: [
                { data: 'order_no', name: 'order_no' },
                { data: 'phone_no' ,name:'phone_no'},
                { data: 'date', name: 'date' },
                { data: 'product_name', name: 'product_name' },
                {data:'track',name:'track'},
                {data:'order_journey',name: 'order_journey' },
                { data: 'type_order', name: 'type_order' },




                {data:'action'},

            ]



        });

    </script>
    @include('layouts.inc.modals._passdata')


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
                    confirmButtonText: 'Yes, delete it!'
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


                alert(url)

            })







        })
    </script>


@endsection
