@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*GET Shipper*/
            $('.EyeShipper').click(function(e) {
                e.preventDefault();
                var slug = $(this).val();
                $('#Viewship').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#Viewship').modal('hide');
                })
                btnIcon.click(function() {
                    $('#Viewship').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetShipper') }}",
                    data: {
                        slug: slug,
                    },
                    dataType: 'json',
                    success: function(response) {

                        $('#shipper').attr('disabled', 'disabled');
                        // $('#ViewAdmin_email').attr('disabled', 'disabled');
                        $('#shipper').val(response.shipper.shipper_name);
                        if (response.shipper.logo == null) {
                            $('.showOfhide').css('display', 'none')
                        } else {
                            $('.showOfhide').css('display', 'block');
                            $('#file-upload').attr('disabled', 'disabled');
                            $('#file-image').attr('src',
                                `{{ asset('images/shipper/${response.shipper.logo}') }}`);


                        }
                        // $('#ViewAdmin_email').val(response.users.email);
                    }
                });
            });
            /*GET Shipper*/
            

            /*view*/

            $('.addShipper').click(function() {
                window.location = "{{ route('ViewAddShipper') }}";
            })
            /*view*/
            /*ADD Shipper*/
            $('.add_shipper').click(function(e) {
                var title = $('#shipper_name').val();
                var file_upload = $('#file-upload').val();

                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        shipper_name: {
                            required: true,
                        },
                        file_upload:{
                            images:true,
                        },

                    },
                    messages: {
                        shipper_name: {
                            required: "Đơn vị vận chuyển không được để trống!"
                        },
                        file_upload:{
                            images:"Hình ảnh không được để trống",
                        }


                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    submitHandler: function() {
                        var formData = new FormData(form[0]);
                        $.ajax({
                            type: "POST",
                            url: "{{ route('AddShipper') }}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                if (data.success) {
                                    $('#successAdd').addClass(
                                        'btn btn-success');
                                    $('#successAdd').fadeIn();
                                    $('#successAdd').text(data
                                        .success);
                                    setTimeout(() => {
                                        $('#successAdd')
                                            .fadeOut();
                                    }, 3000);
                                    window.location = "{{ route('admin_shipper') }}"

                                } else {
                                    $("#error").fadeIn();
                                    $('#error').css('color', 'red');
                                    setTimeout(() => {
                                        $('#error')
                                            .fadeOut();
                                    }, 3000);
                                    $('#error').text(data.error);
                                    setTimeout(() => {
                                        $('#error')
                                            .fadeOut();
                                    }, 3000);

                                }
                            }
                        });
                    }
                })
            });

            /*ADD Shipper*/



            /*DELETE Shipper*/

            $('.RemoveShipper').click(function() {
                var slug = $(this).val();
                $('#RemoveShipper').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveShipper').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveShipper').modal('hide');
                })
                var btnYes = $('#YesRemoveShipper');
                var btnNo = $('#NoRemoveShipper');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('RemoveShipper') }}",
                        data: {
                            slug: slug
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#destroyShipper').addClass(
                                    'btn btn-success');
                                $('#destroyShipper').fadeIn();
                                $('#destroyShipper').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyShipper')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemoveShipper').modal('hide');
                })
            })

            /*DELETE Admin*/

          

















        })
    </script>
@endpush
