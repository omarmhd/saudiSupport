<script>

    $(function() {


        @if(!isset($order))

           var  route="{{ route('departments.show',['department'=>$department])}}";

        @else
            var  route="{{ route('search')}}";

        @endif


        {{--let url =window.location.href;--}}
        {{--let result = url.includes("new");--}}
        {{--if (result){--}}
        {{--    route="{{ route('orders.index',['journey'=>'new']) }}";--}}
        {{--}--}}


        globalThis.table_orders=$('#example1_wrapper').DataTable(
            {

            processing: true,
            serverSide: true,
            responsive: true,
            "order": [[ 1, 'DESC' ]],
            ajax: route,
            columns: [
                { data: 'order_no', name: 'order_no' },
                // { data: 'phone_no' ,name:'phone_no'},
                { data: 'date', name: 'date' },
                { data: 'type_order', name: 'type_order' },
                { data: 'added_by', name: 'added_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'department', name: 'department' },
                {data:'action'},

            ]


        }

        );

    });
</script>
