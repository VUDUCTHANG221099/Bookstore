<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin BookStore | Đăng nhập</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('BackEnd//plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('BackEnd//plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('BackEnd//dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
   
    <div class="login-box">
        <div id="success"></div>
        <div class="login-logo">
            <a href="javascript:void(0)"><b>Admin </b>BookStore</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">


                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <span id="error"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block" id="admin_login">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
   
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('BackEnd/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('BackEnd/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
           


            $('#admin_login').on('click', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               

                //Get data On Form
                var email = $('#email').val();
                var password = $('#password').val();

                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {

                        email: {
                            required: "Email không được để trống!",
                            email: "Vui lòng nhập một địa chỉ email hợp lệ!"
                        },
                        password: {
                            required: "Mật khẩu không được để trống!",
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

                    //Submit Form
                    submitHandler: function() {
                        var formData = new FormData(form[0]);
                        // Method Post
                        $.ajax({
                            type: 'POST',
                            url: 'api/admin_login',
                            data: formData,
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                if (data.success) {
                                    $('#success').addClass('btn btn-success');
                                    $('#success').fadeIn();

                                    $('#success').text(data.success);
                                    setTimeout(() => {
                                        $('#success').fadeOut();
                                    }, 3000);
                                    // $('[name="email"]').val('');
                                    // $('[name="password"]').val('');



                                    localStorage.setItem('full_nameBE', data.user.full_name);
                                    localStorage.setItem('id_admin', data.user.id);

                                    

                                    window.location =
                                    "{{ route('admin_dashboard') }}";

                                } else {


                                    $("#error").fadeIn();

                                    $('#error').css('color', 'red');

                                    setTimeout(() => {
                                        $('#error').fadeOut();
                                    }, 3000);
                                    $('#error').text(data.error);
                                    setTimeout(() => {
                                        $('#error').fadeOut();
                                    }, 3000);
                                }
                            }
                        });
                    }

                });
            });

        });
    </script>

</body>

</html>
