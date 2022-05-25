
<!-- Modal -->
<div class="modal fade" id="upload_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background: #007e48;color: #FFFFFF">
                <h5 class="modal-title" style="color: #FFFFFF"  id="exampleModalLabel">Upload attachments</h5>
                <button type="button" class="close" style="color: #FFFFFF"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="uploadImageLine" style="position:relative; width:100%;">

            </div>


            <div class="alert alert-danger print-error-msg m-10" style="display:none">
                <ul></ul>
            </div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal" id="laravel-ajax-file-upload"
                  action="{{route('attachments',['id'=>'1'])}}">
                @csrf

                <div class="modal-body">


                    <div class="row form-group">
                        <div class="col-12 col-md-12 inputs-form">
                            <div class="control-group" id="fields">
                                <label class="control-label" for="field1">
                                </label>
                                <div class="controls">
                                    <div class="entry input-group upload-input-group">
                                        <input class="form-control" name="attachment[]" type="file">
                                        <button class="btn btn-upload  btn-add" type="button" >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="col-12">
                            <table
                                class="table text-md-nowrap  no-footer table-bordered" style="border: 1px" >


                                <tr style="">
                                    <td>Attachment Name</td>
                                    <td>Download</td>
                                </tr>


                                <tbody class="statuses">


                                </tbody>

                            </table>
                        </div>




                    </div>


                </div>
                <div class="modal-footer">
                    <a href="javascript:viod(0)" class="btn btn-secondary"   id="show-files"> Show attachments <i class="fa fa-eye"></i></a>
                    <button type="submit" class="btn btn-primary"  style="background: #007E48"> Upload <i class="fa fa-upload"></i></button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(function () {
            var id = 0;
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();
                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();
                e.preventDefault();
                return false;
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#show-files').click(function (){
                $('.modal').find('tbody').empty();
                let upload_center = "{{asset('upload_center')}}/";
                var url = "{{route('getAttachments',['id'=>':id'])}}"
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $.each(data.order, function (key, value) {
                            $('.statuses').append(`   <tr>
                                    <td> ` + value.attachment + `</td>
                                    <td> <a href=` + upload_center + value.attachment + ` download class="btn  btn-sm btn-primary btn-bg policy_attch"  > <i class="fa fa-download"></i></a>
                                            <button type="button" data-id=`+value.id+` style="background:#000 ; color: #FFFFFF" class="btn btn-sm   btn-delete-attch"> <i class="fa fa-trash"></i></button>
                                            </td></tr>`)});
                    },
                });
            })
            $('#upload_file').on('show.bs.modal', function (event){
                var button = $(event.relatedTarget)
                var modal=$(this)
                modal.find('tbody').empty();
                id=button.data('id')
                let upload_center = "{{asset('upload_center')}}/";

                var url = "{{route('getAttachments',['id'=>':id'])}}"
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $.each(data.order, function (key, value) {
                            $('.statuses').append(`   <tr>
                                    <td> ` + value.attachment + `</td>
                                    <td> <a href=` + upload_center + value.attachment + ` download class="btn  btn-sm btn-primary btn-bg policy_attch"  > <i class="fa fa-download"></i></a>
                                            <button type="button" data-id=`+value.id+` style="background:#000 ; color: #FFFFFF" class="btn btn-sm   btn-delete-attch"> <i class="fa fa-trash"></i></button>
                                            </td></tr>`)});
                    },
                });

            });

            $('#upload_file').on('hide.bs.modal', function (event){
               $(this).removeData();


            });

            $('#laravel-ajax-file-upload').submit(function (e) {
                // var id = button.data('id')
                e.preventDefault();
                // modal.find('tbody').empty();
                var formData = new FormData(this);
                var url = "{{route('attachments',['id'=>':id'])}}"
                url = url.replace(':id', id)
                $.ajax({
                    xhr: function () {
                        $('.uploadImageLine').html(` <div class="progress-bar" role="progressbar" aria-valuenow=""
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            0%
                        </div>`);
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;
                                $('.progress-bar').text(Math.floor(percentComplete) + '%');
                                $('.progress-bar').css('width', Math.floor(percentComplete) + '%');
                                if (Math.floor(percentComplete) == 100) {
                                    $('.progress-bar').text('Uploading files');
                                }
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        $('.modal').find('tbody').empty();
                        if (data.error) {
                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display', 'block');
                            $.each(data.error, function (key, value) {
                                toastr.error(value)

                            });
                            $('.progress-bar').text('File upload failed');
                            $('.progress-bar').css('background-color', 'red');
                            $('.statuses').css("display", "");
                        } else if (!jQuery.isEmptyObject(data)) {
                            $('.progress-bar').text('uploaded successfully');
                            $('.progress-bar').css('background-color', 'green');
                            $('.statuses').css("display", "");
                            $(".print-error-msg").css('display', 'none');
                            let upload_center = "{{asset('upload_center')}}/";
                            $.each(data.order, function (key, value) {
                                $('.statuses').append(`   <tr>
                                    <td> ` + value.attachment + `</td>
                                    <td> <a href=` + upload_center + value.attachment + ` download class="btn  btn-sm btn-primary btn-bg policy_attch"  > <i class="fa fa-download"></i></a>
                                            <button type="button" data-id=`+value.id+` style="background:#000 ; color: #FFFFFF" class="btn btn-sm   btn-delete-attch"> <i class="fa fa-trash"></i></button>
                                            </td></tr>`)});
                        } else {
                            $('.progress-bar').text('No files have been uploaded');
                        }
                    },
                });
            });
            $(document).on('click','.btn-delete-attch',function (event){
                var button = $(this)
                let id=button.data('id')
                var url = "{{route('attachment.destroy',['id'=>':id'])}}"
                url = url.replace(':id',id)
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        url: url,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            button.parent().parent().fadeOut()
                        }
                    });
            })
            $('.modal').on('hide.bs.modal', function () {
                $(".progress-bar").hide();
                $(".print-error-msg").hide();
            });
        });
    </script>

@endpush
