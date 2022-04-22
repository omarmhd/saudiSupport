<script>

    $('#show-order').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var phone_no =  button.data('phone_no')
        var order_no =  button.data('order_no')
        var product_name =  button.data('product_name')
        var type_order =  button.data('type_order')
        var details =  button.data('details')??'null'
        var order_journey =  button.data('order_journey')
        var note_tech =  button.data('note_tech')
        var attachments = button.data('attachments')
        var track = button.data('track')
        var decision_taken = button.data(' decision_taken')
        var note_warehouse =  button.data('note_warehouse')
        var note_salah =  button.data('note_salah')

        //exchange order
        var alternative_product =  button.data('alternative_product')
        var order_arrived =  button.data('order_arrived')
        var send_alternative =  button.data('send_alternative')

        //refund
        var bank_accounts =  button.data('bank_accounts')
        var policy_attachment =  button.data('policy_attachment')
        var amount_transferred =  button.data('amount_transferred')


        var done_cancel =  button.data('done_cancel')

        var done_valdiff =  button.data('done_valdiff')


        var modal = $(this)
        modal.find('.attachments').show()
        modal.find('.attachments').attr('href',attachments)

        if(order_journey==1){
            modal.find('div .tracking-section').show()
        }
        if(order_journey==2){
            modal.find('div .tracking-section').show()
            modal.find('div .preview-section').show()
        }
        if (attachments==""){
            $('.attachments').hide()
        }

        $('.'+type_order).show()


        $('input[name="phone_no"]').val(phone_no)
         modal.find('.order_no').text(order_no)
         modal.find('input[name="product_name"]').val(product_name)
         modal.find('.order_type').text(type_order)
         modal.find('textarea[name="details"]').val(details)
         modal.find('textarea[name="note_tech"]').val(note_tech)
         modal.find('input[name="order_journey"]').val(order_journey)
        modal.find('input[name="track"]').val(track)
        modal.find('input[name="alternative_product"]').val(alternative_product)
        modal.find('.order_arrived').text(order_arrived)
        modal.find('.send_alternative').text(send_alternative)
        modal.find('textarea[name=bank_accounts]').val(bank_accounts)
        modal.find('.amount_transferred').text(amount_transferred)
        modal.find('.done_cancel').text(done_cancel)
        modal.find('.done_valdiff').text(done_valdiff)

        if(policy_attachment=='null'){
            $('.policy_attch').hide()
        }
        modal.find('.policy_attch').attr('href',policy_attachment)




        modal.find('input[name="decision_taken"]').val(decision_taken)
         modal.find('textarea[name="note_warehouse"]').val(note_warehouse)
         modal.find('textarea[name="note_salah"]').val(note_salah)
    })

    $('#show-order').on('hide.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var modal = $(this)
        var type_order =  button.data('type_order')
        // modal.find('.attachments').attr('href',"")

        // $('.Exchange ,.Refund, .Edit, .Cancel ,.attachments').hide()

        modal.find('div .tracking-section').hide()
        modal.find('div .preview-section').hide()

    })


    $('#upload_file').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)

        button.data('')



    });
</script>
