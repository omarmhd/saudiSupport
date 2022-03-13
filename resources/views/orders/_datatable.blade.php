<script>
    $(function() {
        $('#example1_wrapper').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: '{{ route('orders.index') }}',
            columns: [
                { data: 'order_no', name: 'order_no' },
                { data: 'phone_no' ,name:'phone_no'},
                { data: 'date', name: 'date' },
                { data: 'product_name', name: 'product_name' },
                {data:'track',name:'track'},
                { data: 'type_order', name: 'type_order' },
                {data:'details',name: 'details' },
                {data:'order_journey',name: 'order_journey' },
                 {data:'note_tech',name:'note_tech'},
                {data:'attachments',name:'attachments'},

                {data:'action'},

            ]



        });
    });
</script>
