<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="upload_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload attachments</h5>
                <button type="button" class="close" style="color: #FFFFFF"  data-dismiss="modal" aria-label="Close">
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
                                class="table ">

                                <thead>
                                <tr>
                                    <td>Attachment Name</td>
                                    <td>Download</td>
                                </tr>
                                </thead>

                                <tbody class="statuses">


                                </tbody>

                            </table>
                        </div>




                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style=""  data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary"  value="Upload">
                </div>

            </form>
        </div>
    </div>
</div>

@push('js')
    <script>


        $(function () {
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

            $('#upload_file').on('show.bs.modal', function (event){

            $('#laravel-ajax-file-upload').submit(function (e) {
                var button = $(event.relatedTarget)
                var modal=$(this)
                modal.find('tbody').empty();


                let id = button.data('id')
                e.preventDefault();
                var formData = new FormData(this);

                var url ="{{route('attachments',['id'=>':id'])}}"
                url=url.replace(':id',id)

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

                        if (data.error) {

                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display', 'block');

                            $.each(data.error, function (key, value) {
                                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                            });

                            $('.progress-bar').text('فشلت عملية تحميل الملفات');
                            $('.progress-bar').css('background-color', 'red');
                            $('.statuses').css("display", "");
                        } else if (!jQuery.isEmptyObject(data)) {

                            $('.progress-bar').text('تم بنجاح');
                            $('.progress-bar').css('background-color', 'green');
                            $('.statuses').css("display", "");
                            $(".print-error-msg").css('display', 'none');




                            let upload_center="{{asset('upload_center')}}/";
                            $.each(data.order, function (key, value) {

                                    $('.statuses').append(`   <tr>
                                    <td> ` + value.attachment + `</td>

                                    <td>   <a href=`+upload_center+value.attachment+` download class="btn btn-primary btn-bg policy_attch"  > <i class="fa fa-download"></i></a> </td>
                                </tr>`)




                            });
                        } else {

                            $('.progress-bar').text('لم يتم تحميل أي ملفات');


                        }
                    },
                });

                $('.modal').on('hide.bs.modal', function () {
                    $(".progress-bar").hide();
                    $(".statuses").hide();
                    $(".print-error-msg").hide();


                });


            });
        });  });
            $('#upload_file').on('hide.bs.modal', function (event){
                var modal = $(this)
                modal.find('tbody').empty();

         });
    </script>

@endpush
