
<div class="modal show-order fade bd-example-modal-lg" id="show-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #007e48;color: #FFFFFF">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF" >order # <span class="order_no"></span></h5>
                <button type="button" class="close" style="color: #FFFFFF"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row row-sm mg-b-20 ">
                    <div id="wizard1" role="application" class="wizard" style="margin: auto;" >
                        <div class="steps">
                            <ul role="tablist" style="font-size: 10px">
                                <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                    <a id="wizard1-t-0" href="#wizard1-h-0" aria-controls="wizard1-p-0">
                                        <span class="current-info audible">current step: </span>
                                        <span class="title">Order type :</span>
                                        <span class="order_type"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>

             <h5 class="" style="color: #0a7ffb">Order Data</h5>
                <br>
                <div class="row row-sm mg-b-20">

                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">Product Name</p>
                        <input type="text"
                               id="product_name"
                               name="product_name"
                               class="form-control"
                               placeholder="product name">
                    </div>
                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">phone number</p>

                        <input type="text"
                               id="phone_no"
                               name="phone_no"
                               class="form-control"
                               placeholder="phone number">
                    </div>

                </div>
                <div class="row row-sm mg-b-20">

                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">Alternative product</p>
                        <input type="text"
                               id="alternative_product"
                               name="alternative_product"
                               class="form-control"
                             >                            </div>

                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">Attachments</p>
                        <a href="" download   class="btn btn-primary btn-bg attachments"> <i class="fa fa-download"></i></a>

                    </div>




                    <!-- col-4 -->
                </div>
                <div class="row row-sm mg-b-20">




                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">Problem Or Note</p>
                        <textarea class="form-control" name="note_tech"   rows="3" spellcheck="false"></textarea>

                    </div>
                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <p class="mg-b-10">Bank accounts</p>
                        <textarea class="form-control" name="bank_accounts" rows="3" spellcheck="false"></textarea>

                    </div>






                </div>

                <div class="tracking-section" style="display: none">

                    <hr>
                <h5 class="" style="color: #0a7ffb">Order Processing</h5>

                    <br>

                    <div class="row row-sm mg-b-20 Exchange" style="display: none">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10"> Order arrived <span class="order_arrived ml-3 text-danger"></span></p>

                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10"> Send alternative <span class="send_alternative ml-3 text-danger"> </span></p>


                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                            <p class="mg-b-10" style="display: inline">Policy  download  </p>
                            <a href="" download class="btn btn-primary btn-bg policy_attch"  style="display: none"> <i class="fa fa-download"></i></a>

                        </div>
                        <!-- col-4 -->
                    </div>

                    <div class="row row-sm mg-b-20 Refund" style="display: none">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10"> Order arrived <span class="order_arrived ml-3 text-danger"></span></p>

                        </div>
                        <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Has the amount been transferred?<span class="amount_transferred  ml-3 text-danger"> <i class="fa fa-check-circle"></i> <i class="fa fa-times-circle"></i></span></p>

                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                            <p class="mg-b-10" style="display: inline">Policy  download  </p>
                            <a href="" download class="btn btn-primary btn-sm policy_attch"  style="display: none"> <i class="fa fa-download"></i></a>

                        </div>
                        <!-- col-4 -->
                    </div>

                    <div class="row row-sm mg-b-20 Edit" style="display: none">

                        <div class="col-lg-7 mg-t-20 mg-lg-t-0">

                            <p class="mg-b-10"> The difference in the value of the product has been sent ? <span class="done_valdiff ml-3 text-danger"> </span></p>
                        </div>


                        <!-- col-4 -->
                    </div>

                    <div class="row row-sm mg-b-20 Cancel" style="display: none">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Has the Order been cancelled? <span class="alternative_product ml-3 text-danger"> </span></p>

                        </div>
                        <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Has the amount been transferred?<span class="done_cancel ml-3 text-danger" > </span></p>

                        </div>


                        <!-- col-4 -->
                    </div>

                </div>
                <div class="preview-section" style="display: none" >
                <hr>
                <h5 class="" style="color: #0a7ffb" >Order Reviewed    <i class="fa fa-"></i></h5>
                    <br>
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Warehouse team notes</p>

                            <textarea class="form-control" name="note_warehouse" placeholder="note_warehouse" rows="3" spellcheck="false"></textarea>

                        </div>

                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">Management notes</p>

                            <textarea class="form-control" name="note_salah" placeholder="note_salah" rows="3" spellcheck="false"></textarea>

                        </div>

                    </div>
                </div>


                    <!-- col-4 -->



            </div>




        </div>
    </div>
</div>
<!-- Small modal -->

