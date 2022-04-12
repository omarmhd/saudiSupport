<script>

    $(function() {
        globalThis.table_orders=$('#example1_wrapper').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            "order": [[ 2, 'DESC' ]],
            ajax: '{{ route('orders.index') }}',
            columns: [
                { data: 'order_no', name: 'order_no' },
                { data: 'phone_no' ,name:'phone_no'},
                { data: 'date', name: 'date' },
                { data: 'product_name', name: 'product_name' },
                {data:'order_journey',name: 'order_journey' },
                { data: 'type_order', name: 'type_order' },
                { data: 'added_by', name: 'added_by' },




                {data:'action'},

            ]



        });

    });
</script>
