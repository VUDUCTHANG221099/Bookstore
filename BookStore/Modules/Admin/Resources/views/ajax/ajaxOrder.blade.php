{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*GET Admin*/
           
            /*GET Admin*/
            /*ADD Admin*/
            $('.addAdmin').click(function() {
                $('#AddAdmin').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#AddAdmin').modal('hide');
                })
                btnIcon.click(function() {
                    $('#AddAdmin').modal('hide');
                })
                $('.add_admin').click(function(e) {
                    var Admin_name = $('#Admin_name').val();
                    var Admin_email = $('#Admin_email').val();
                    var Admin_password = $('#Admin_password').val();
                    var Admin_ConfirmPassword = $('#Admin_ConfirmPassword').val();
                    var form = $(this).parents('form');
                    // handling validate
                    $(form).validate({
                        rules: {
                            Admin_name: {
                                required: true
                            },
                            Admin_email: {
                                required: true,
                                email: true
                            },
                            Admin_password: {
                                required: true,
                                minlength: 6
                            },
                            Admin_ConfirmPassword: {
                                required: true,
                                equalTo: '#Admin_password'
                            },
                        },
                        messages: {
                            Admin_name: {
                                required: "Họ và tên không được để trống!"
                            },
                            Admin_email: {
                                required: "Email không được để trống!",
                                email: "Sai định dạng vui lòng nhập lại!"
                            },
                            Admin_password: {
                                required: "Mật khẩu không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 6 ký tự",
                            },
                            Admin_ConfirmPassword: {
                                required: "Xác nhận mật khẩu không được để trống!",
                                equalTo: "Xác nhận mật khẩu không khớp!"
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
                                url: "{{ route('AddAdmin') }}",
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
            /*ADD Admin*/
            /*UPDATE GET Admin*/
            $('.EditAdmin').click(function() {
                var id = $(this).val();
                $('#UpdateAdmin').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#UpdateAdmin').modal('hide');
                })
                btnIcon.click(function() {
                    $('#UpdateAdmin').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "/api/GetAdmin/" + id,
                    success: function(response) {
                        $('#id_admin').val(response.users.id);
                        $('#Admin_name_update').val(response.users.full_name);
                        $('#Admin_email_update').val(response.users.email);
                    }
                });
            })
            /*UPDATE GET Admin*/
            /*UPDATE Admin*/
            $('.Update_admin').click(function(e) {
                var id = $('#id_admin').val();
                var Admin_name_update = $('#Admin_name_update').val();
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
                            url: "/api/UpdateAdmin/" + id,
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(data) {
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
                            }
                        });
                    }
                })
            });
            /*UPDATE Admin*/

            /*DELETE Admin*/
            $('.RemoveAdmin').click(function() {
                var idlogin = localStorage.getItem('id_admin')
                var id = $(this).val();
                $('#RemoveAdmin').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveAdmin').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveAdmin').modal('hide');
                })
                var btnYes = $('#YesRemoveAdmin');
                var btnNo = $('#NoRemoveAdmin');
                btnYes.click(function() {
                    if (id == idlogin) {
                        $('#NotUserLogin').modal('show');
                        var btn = $('.modal-footer');
                        var btnIcon = $('.btnClose');
                        btn.click(function() {
                            $('#NotUserLogin').modal('hide');
                        })
                        btnIcon.click(function() {
                            $('#NotUserLogin').modal('hide');
                        })

                        $('#RemoveAdmin').modal('hide');


                    } else {

                        $.ajax({
                            type: "DELETE",
                            url: "/api/RemoveAdmin/" + id,
                            success: function(response) {
                                if (response.success) {
                                    $('#destroyAdmin').addClass(
                                        'btn btn-success');
                                    $('#destroyAdmin').fadeIn();
                                    $('#destroyAdmin').text(response
                                        .success);
                                    setTimeout(() => {
                                        $('#destroyAdmin')
                                            .fadeOut();
                                    }, 3000);
                                    location.reload();
                                }
                            }
                        });
                    }
                })
                btnNo.click(function() {
                    $('#RemoveAdmin').modal('hide');
                })
            })
            /*DELETE Admin*/
















        })
    </script>
@endpush --}}
