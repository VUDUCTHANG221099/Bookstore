@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*ADD Pay*/
            $('.addPay').click(function() {
                $('#AddPay').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#AddPay').modal('hide');
                })
                btnIcon.click(function() {
                    $('#AddPay').modal('hide');
                })
                $('.add_pay').click(function(e) {
                    var payment_name = $('#payment_name').val();

                    var form = $(this).parents('form');
                    // handling validate
                    $(form).validate({
                        rules: {
                            payment_name: {
                                required: true
                            },

                        },
                        messages: {
                            payment_name: {
                                required: "Phương thức thanh toán không được để trống!"
                            },

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
                                url: "{{ route('addPay') }}",
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
                                        location.reload();
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
            })
            /*ADD Pay*/













            /*Update Pay*/
            $('.EditPay').click(function(e) {
                e.preventDefault();
                var id = $(this).val();

                $('#UpdatePay').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#UpdatePay').modal('hide');
                })
                btnIcon.click(function() {
                    $('#UpdatePay').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "{{ route('getPay') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#payment_name_Update').val(response.payment.payment_name);
                        $('#id_payment').val(response.payment.id);

                    }
                });
            });
            $('.update_pay').click(function() {
                var id = $('#id_payment').val();
                var payment = $('#payment_name_Update').val();
                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        Admin_name_update: {
                            required: true
                        },
                    },
                    messages: {
                        Admin_name_update: {
                            required: "Họ và tên không được để trống!"
                        },
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
                            url: "{{ route('UpdatePay') }}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                if (data.success) {

                                    $('#successUpdate').addClass(
                                        'btn btn-success');
                                    $('#successUpdate').fadeIn();
                                    $('#successUpdate').text(data
                                        .success);
                                    setTimeout(() => {
                                        $('#successUpdate')
                                            .fadeOut();
                                    }, 3000);
                                    location.reload();
                                }else{
                                    $("#errorPay").fadeIn();
                                    $('#errorPay').css('color', 'red');
                                    setTimeout(() => {
                                        $('#errorPay')
                                            .fadeOut();
                                    }, 3000);
                                    $('#errorPay').text(data.error);
                                    setTimeout(() => {
                                        $('#errorPay')
                                            .fadeOut();
                                    }, 3000);
                                }
                            }
                        });
                    }
                })

            });
            /*Update Pay*/
            /*Get Pay */
            $('.EyePay').click(function(e) {
                e.preventDefault();
                var id = $(this).val();

                $('#ViewPay').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#ViewPay').modal('hide');
                })
                btnIcon.click(function() {
                    $('#ViewPay').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "{{ route('getPay') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#payment_name_Update').val(response.payment.payment_name);
                        $('#id_payment').val(response.payment.id);
                        $('#id_payment').attr('disabled','disabled');


                    }
                });
            });
            /*Get Pay */



           

            /*DELETE Admin*/
            $('.RemovePay').click(function() {
                
                var id = $(this).val();
                $('#RemovePay').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemovePay').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemovePay').modal('hide');
                })
                var btnYes = $('#YesRemovePay');
                var btnNo = $('#NoRemovePay');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('RemovePay') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#destroyPay').addClass(
                                    'btn btn-success');
                                $('#destroyPay').fadeIn();
                                $('#destroyPay').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyPay')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemovePay').modal('hide');
                })
            })
            /*DELETE Admin*/
















        })
    </script>
@endpush
