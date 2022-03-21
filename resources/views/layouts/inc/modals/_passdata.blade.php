<script>

    $('#show-order').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var phone_no =  button.data('phone_no')
        var order_no =  button.data('order_no')
        var product_name =  button.data('product_name')
        var type_order =  button.data('type_order')
        var details =  button.data('details')
        var order_journey =  button.data('order_journey')
        var note_tech =  button.data('note_tech')
        var attachments = button.data('attachments')
        var track = button.data('track')
        var extracting_policy =  button.data('extracting_policy')
        var policy_attachment =  button.data('policy_attachment')
        var order_arrived =   button.data('order_arrived')
        var decision_taken = button.data(' decision_taken')
        var note_warehouse =  button.data('note_warehouse')
        var note_salah =  button.data('note_salah')

        var modal = $(this)

         modal.find('input[name="phone_no"]').val(phone_no)
         modal.find('input[name="order_no"]').val(order_no)
         modal.find('input[name="product_name"]').val(product_name)
         modal.find('input[name="type_order"]').val(type_order)
         modal.find('textarea[name="details"]').val(details)
         modal.find('textarea[name="note_tech"]').val(note_tech)
         modal.find('input[name="order_journey"]').val(order_journey)
         modal.find('input[name="attachments"]').val(attachments)
         modal.find('input[name="track"]').val(track)
         modal.find('input[name="extracting_policy"]').val(extracting_policy)
         modal.find('input[name="policy_attachment"]').val(policy_attachment)
         modal.find('input[name="order_arrived"]').val(order_arrived)
         modal.find('input[name="decision_taken"]').val(decision_taken)
         modal.find('textarea[name="note_warehouse"]').val(note_warehouse)
         modal.find('textarea[name="note_salah"]').val(note_salah)
    })


</script>
