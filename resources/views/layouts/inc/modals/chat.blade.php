
<div class="modal add-chat fade bd-example-modal-lg" id="add-chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #007e48;color: #FFFFFF">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF" >New Room <span class="order_no"></span></h5>
                <button type="button" class="close" style="color: #FFFFFF"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('room.store')}}"  method="post">

                <div class="modal-body">







                </div>

                <div class="modal-footer">
                                        <a href="javascript:viod(0)" class="btn btn-secondary"   id="show-files"> Show attachments <i class="fa fa-eye"></i></a>
                    <button class="btn btn-primary mt-4" > Add </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Small modal -->

