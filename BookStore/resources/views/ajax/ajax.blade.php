@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            ListCate();
            Comment();
            Login();
            Logout();
            Register();
            Profile();
            Forgot_Password();
            Lay_lai_mat_khau();
            Xoa_Post();
            CreatePost();
            

         

            function ListCate() {
                //Sách
                $.ajax({
                    type: "GET",
                    url: "/api/listCate",
                    dataType: "json",
                    success: function(response) {
                        response.categories.forEach(element => {

                            $('.category').append(` <li >
                        <a href="/sach/${element.category_slug}" title="${element.category_name}">
                            
                            ${element.category_name} </a>
                    </li>`)
                            $('.category_mobile').append(` <li>
                        <a href="/sach/${element.category_slug}" class="level1" title="${element.category_name}">${element.category_name} </a>
                    </li>`)
                            //Category of book
                            $('.dropdown-menu').append(` <li class="nav-item lv2">
                        <a href="/sach/${element.category_slug}" class="nav-link" title="${element.category_name}">${element.category_name} </a>
                    </li>`)
                        });
                    }
                });
                //Sách
            }

            function Comment() {
                //comment
                $('.comment').click(function(e) {
                    var post_id = $('#post_id').val();
                    var fullname = $('#fullname').val();
                    var email = $('#email').val();
                    var comment = $('#comment').val();
                    var form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            fullname: {
                                required: true,

                            },
                            email: {
                                required: true,
                                email: true,
                            },
                            comment: {
                                required: true,
                            }
                        },
                        messages: {

                            fullname: {
                                required: "Họ và tên không được để trống!",

                            },
                            email: {
                                required: "Email không được để trống!",
                                email: "Vui lòng nhập một địa chỉ email hợp lệ!"
                            },
                            comment: {
                                required: "Mô tả không được để trống!",
                            }

                        },

                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');

                        },
                        submitHandler: function() {
                            // var formData = new FormData(form[0]);

                            $.ajax({
                                type: "POST",
                                url: "{{ route('addComment') }}",
                                data: {
                                    post_id: post_id,
                                    fullname: fullname,
                                    email: email,
                                    description: comment,
                                },
                                dataType: "json",
                                success: function(response) {
                                    $('#success').removeAttr('style');
                                    $('#success').fadeIn();
                                    $('#success').text(response
                                        .success);
                                    // setTimeout(() => {
                                    //     $('#success')
                                    //     .fadeOut();
                                    // }, 3000);
                                    location.reload();

                                }
                            });
                        }
                    });
                })
                //comment
            }

            function Login() {
                //Login
                $('#loginForm').click(function() {
                    //Get data On Form
                    var emailFE = $('#emailFE').val();
                    var passwordFE = $('#passwordFE').val();
                   
                    var form = $(this).parents('form');
                    // handling validate
                    $(form).validate({
                        rules: {
                            emailFE: {
                                required: true,
                                email: true
                            },
                            passwordFE: {
                                required: true,
                            },
                           
                        },
                        messages: {

                            emailFE: {
                                required: "Email không được để trống!",
                                email: "Vui lòng nhập một địa chỉ email hợp lệ!"
                            },
                            passwordFE: {
                                required: "Mật khẩu không được để trống!",
                            },
                           

                        },

                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
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
                                url: "{{ route('loginPost') }}",
                                data: formData,
                                dataType: 'JSON',
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.success) {
                                        $('.success').addClass('btn btn-success');
                                        $('.success').fadeIn();

                                        $('.success').text(data.success);
                                        setTimeout(() => {
                                            $('.success').fadeOut();
                                        }, 3000);
                                        // $('[name="email"]').val('');
                                        // $('[name="password"]').val('');

                                        // $('.checkLogout').show();


                                        localStorage.setItem('emailFE', data.user
                                            .email);
                                        localStorage.setItem('idFE', data.user.id);
                                        localStorage.setItem('ho_tenFE', data.user
                                            .full_name);


                                        // localStorage.setItem('id_admin', data.user.id);
                                        // alert(data.user.token)



                                        window.location =
                                            "{{ route('profileFE') }}";

                                    } else {
                                        // $('.checkLogin').show();


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
                })
            }

            function Logout() {
                //Logout
                $('.logout').click(function() {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('logoutFE') }}",
                        success: function(response) {
                            localStorage.removeItem('emailFE');
                            localStorage.removeItem('idFE');
                            localStorage.removeItem('ho_tenFE');

                            window.location = "{{ route('loginViewFE') }}"
                        }
                    });
                })
            }

            function Register() {
                //register
                $('#registerForm').click(function() {
                    let RegisterfullnameFE = $('#RegisterfullnameFE').val();
                    let RegisterEmailFE = $('#RegisterEmailFE').val();
                    let RegisterPasswordFE = $('#RegisterPasswordFE').val();
                    let RegisterConfirmPassFE = $('#RegisterConfirmPassFE').val();
                    let form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            RegisterfullnameFE: {
                                required: true,
                            },
                            RegisterEmailFE: {
                                required: true,
                                email: true,
                            },
                            RegisterPasswordFE: {
                                required: true,
                                minlength: 6,
                                maxlength: 200,
                            },
                            RegisterConfirmPassFE: {
                                required: true,
                                equalTo: "#RegisterPasswordFE"
                            },

                        },
                        messages: {
                            RegisterfullnameFE: {
                                required: "Họ và tên không được để trống!",
                            },
                            RegisterEmailFE: {
                                required: "Email không được để trống!",
                                email: "Vui lòng nhập một địa chỉ email hợp lệ!",
                            },
                            RegisterPasswordFE: {
                                required: "Mật khẩu  không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 6 ký tự!",
                                maxlength: "Mật khẩu không được lớn hơn 200 ký tự!"
                            },
                            RegisterConfirmPassFE: {
                                required: "Xác nhận mật khẩu không được để trống!",
                                equalTo: "Xác nhận mật khẩu không khớp!"
                            }
                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
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
                                url: "{{ route('registerPost') }}",
                                data: formData,
                                dataType: 'JSON',
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.success) {
                                        $('.success').addClass('btn btn-success');
                                        $('.success').fadeIn();

                                        $('.success').text(data.success);
                                        setTimeout(() => {
                                            $('.success').fadeOut();
                                        }, 3000);
                                        // $('[name="email"]').val('');
                                        // $('[name="password"]').val('');

                                        // $('.checkLogout').show();





                                        // localStorage.setItem('id_admin', data.user.id);
                                        // alert(data.user.token)



                                        window.location =
                                            "{{ route('loginViewFE') }}";

                                    } else {
                                        // $('.checkLogin').show();


                                        $(".error").fadeIn();

                                        $('.error').css('color', 'red');

                                        setTimeout(() => {
                                            $('.error').fadeOut();
                                        }, 3000);
                                        $('.error').text(data.error);
                                        setTimeout(() => {
                                            $('.error').fadeOut();
                                        }, 3000);
                                    }
                                }
                            });
                        }

                    })
                })
            }

            function Profile() {
                //Profile
                var id = localStorage.getItem('idFE');
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetProfile') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('.Ho_Va_TenFE').text(localStorage.getItem('ho_tenFE'))
                        $('.name-account').html(`
                        <p><strong>Họ tên:</strong> ${localStorage.getItem('ho_tenFE')}</p>
                            <p> <strong>Email:</strong> ${localStorage.getItem('emailFE')}</p>
                        <!-- <p> <strong>Điện thoại:</strong> ${response.phone} </p>-->
                            <!--<p><strong>Công ty:</strong> ASUS</p>-->
                        `);
                        if (response.phone != null) {
                            $('.name-account').append(`
                            <p><strong>Điện thoại :</strong> ${response.phone}</p>
                            
                            `)
                        }
                        if (response.address != null) {
                            $('.name-account').append(`
                            <p><strong>Địa chỉ :</strong> ${response.address}</p>
                            
                            `)
                        }

                    }
                });
                //Count Address
                $.ajax({
                    type: "GET",
                    url: "{{ route('CountAddress') }}",
                    data: {
                        id: localStorage.getItem('idFE')
                    },
                    dataType: "json",
                    success: function(response) {

                        $('.my_addressView').append(`(${response})`)
                    }
                });
                //Đổi mật khảu
                $('#changePasswordFE').click(function() {
                    var id = localStorage.getItem('idFE');
                    var OldPasswordFE = $('#OldPasswordFE').val();
                    var NewPasswordFE = $('#NewPasswordFE').val();
                    var confirmPassFE = $('#confirmPassFE').val();
                    var form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            OldPasswordFE: {
                                required: true,
                                minlength: 6
                            },
                            NewPasswordFE: {
                                required: true,
                                minlength: 6
                            },
                            confirmPassFE: {
                                required: true,
                                equalTo: "#NewPasswordFE"
                            }
                        },
                        messages: {

                            OldPasswordFE: {
                                required: "Mật khẩu cũ không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 6 ký tự!"
                            },
                            NewPasswordFE: {
                                required: "Mật khẩu mới không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 6 ký tự!"
                            },
                            confirmPassFE: {
                                required: "Xác nhận mật khẩu không được để trống!",
                                equalTo: "Xác nhận mật khẩu không khớp!"
                            },

                        },

                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
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
                            // var formData = new FormData(form[0]);
                            // Method Post
                            $.ajax({
                                type: "POST",
                                url: "{{ route('ChangePassFE') }}",
                                data: {
                                    id: id,
                                    password: NewPasswordFE
                                },
                                dataType: "json",
                                success: function(data) {
                                    if (data.success) {

                                        $('.success').addClass('btn btn-success');
                                        $('.success').fadeIn();

                                        $('.success').text(data.success);
                                        setTimeout(() => {
                                            $('.success').fadeOut();
                                        }, 3000);
                                        localStorage.removeItem('emailFE');
                                        localStorage.removeItem('idFE');
                                        localStorage.removeItem('ho_tenFE');

                                        window.location =
                                            "{{ route('loginViewFE') }}"
                                    }
                                }
                            });
                        }


                    });
                })
                //Logout localStorage
                if (localStorage.getItem('emailFE') == null) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('logoutFE') }}",
                        dataType: "JSON",
                        success: function(response) {
                            // localStorage.removeItem('emailFE');
                            // localStorage.removeItem('idFE');
                            // localStorage.removeItem('ho_tenFE');
                            window.location = "{{ route('loginViewFE') }}"
                        }
                    });
                }

            }

            function Forgot_Password() {
                $('.forgotPassword').click(function() {

                    let EmailForgot = $('#EmailForgot').val();
                    // console.log(EmailForgot);
                    let form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            EmailForgot: {
                                required: true,
                                email: true,
                            },
                        },
                        messages: {
                            EmailForgot: {
                                required: "Email không được để trống!",
                                email: "Vui lòng nhập một địa chỉ email hợp lệ!"
                            }
                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');

                        },
                        submitHandler: function() {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('forgotPassword') }}",
                                data: {
                                    EmailForgot: EmailForgot
                                },
                                dataType: "json",
                                success: function(data) {
                                    if (data.success) {
                                        $('#successForgotPassword').addClass(
                                            'btn btn-success');
                                        $('#successForgotPassword').fadeIn();

                                        $('#successForgotPassword').text(data
                                            .success);
                                        setTimeout(() => {
                                            $('#successForgotPassword')
                                                .fadeOut();
                                        }, 3000);
                                        location.reload();
                                    } else {
                                        $("#errorForgotPassword").fadeIn();

                                        $('#errorForgotPassword').css('color',
                                            'red');

                                        setTimeout(() => {
                                            $('#errorForgotPassword')
                                                .fadeOut();
                                        }, 3000);
                                        $('#errorForgotPassword').text(data.error);
                                        setTimeout(() => {
                                            $('.errorForgotPassword')
                                                .fadeOut();
                                        }, 3000);
                                    }
                                }
                            });
                        }
                    })


                })
            }

            function Lay_lai_mat_khau() {
                $('#ForgotPassword').click(function() {
                    let email = $("input[name='email']").val();
                    let Password = $("input[name='Password']").val();
                    let ConfirmPassword = $("input[name='ConfirmPassword']").val();
                    // alert(ConfirmPassword)
                    var form = $(this).parents('form');

                    $(form).validate({
                        rules: {

                            Password: {
                                required: true,
                                minlength: 3,
                            },
                            ConfirmPassword: {
                                required: true,
                                equalTo: "#Password"
                            },
                        },
                        messages: {

                            Password: {
                                required: "Mật khẩu không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 3 ký tự!"

                            },
                            ConfirmPassword: {
                                required: "Xác nhận mật khẩu không được để trống!",
                                equalTo: "Xác nhận mật khẩu không khớp!",
                            },

                        },

                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');

                        },

                        //Submit Form
                        submitHandler: function() {
                            // var formData = new FormData(form[0]);
                            // Method Post
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('Postreset_password') }}",
                                data: {
                                    email: email,
                                    Password: Password
                                },
                                dataType: 'JSON',
                                // processData: false,
                                // contentType: false,
                                success: function(data) {
                                    if (data.success) {
                                        $('.success').addClass('btn btn-success');
                                        $('.success').fadeIn();

                                        $('.success').text(data.success);
                                        setTimeout(() => {
                                            $('.success').fadeOut();
                                        }, 3000);




                                        window.location =
                                            "{{ route('index') }}";

                                    }
                                }
                            });
                        }

                    });



                    // alert(email)
                })
            }

            function CreatePost() {
                $('#Createpost').click(function(e) {
                    var id = localStorage.getItem('idFE');
                    let title = $('#title').val();
                    let desc_post = $('#desc_post').val();
                    let fileUpload = $('#file-upload').val();
                    var form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            title: {
                                required: true,

                            },
                        },
                        messages: {
                            title: {
                                required: "Tiêu đề không được để trống!"
                            }
                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            element.closest('.form-group').append(error);
                            // $('.required').css('color', 'red')
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
                                url: "{{ route('CreatePost') }}",
                                data: formData,
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response.success) {
                                        $('#successPost').addClass(
                                            'btn btn-success');
                                        $('#successPost').fadeIn();
                                        $('#successPost').text(response.success);
                                        setTimeout(() => {
                                            $('#successPost').fadeOut();
                                        }, 3000);
                                        location.reload();
                                    } else {
                                        $("#errorsPost").fadeIn();

                                        $('#errorsPost').css('color', 'red');

                                        setTimeout(() => {
                                            $('#errorsPost').fadeOut();
                                        }, 3000);
                                        $('#errorsPost').text(response.error);
                                        setTimeout(() => {
                                            $('#errorsPost').fadeOut();
                                        }, 3000);
                                    }
                                }
                            });
                        }

                    })
                })

            }

            function Xoa_Post() {
                $('.RemovePostFE').click(function() {
                    var slug = $(this).val();
                    // alert(slug);
                    var check = confirm("Bạn có muốn xóa không?");
                    // alert(check)
                    if (check == true) {
                        $.ajax({
                            type: "delete",
                            url: "{{ route('removePostFE') }}",
                            data: {
                                slug: slug
                            },
                            dataType: "json",
                            success: function(response) {
                                location.reload();

                            }
                        });
                    }
                    // if (check == true) {

                    //     $.ajax({
                    //         type: "DELETE",
                    //         url: "{{ route('removePostFE') }}",
                    //         data: {
                    //             slug: slug
                    //         },
                    //         dataType: "json",
                    //         success: function(response) {


                    //             location.reload();


                    //         }
                    //     });

                    // }
                })
            }

            



         







        });
    </script>
@endpush
