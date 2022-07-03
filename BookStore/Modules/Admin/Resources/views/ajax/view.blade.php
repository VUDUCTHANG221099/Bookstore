@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.admin_fullName').html(localStorage.getItem('full_nameBE'));
            /*DataTable*/
            $('.datatable').DataTable();
            /*DataTable*/
            /*VIEW Dashboard*/
            $('.admin_dashboard').addClass(
                "{{ Request::route()->getName() == 'admin_dashboard' ? 'active' : false }}")
            $('.admin_dashboard').click(function() {
                window.location = "{{ route('admin_dashboard') }}";
            })
            /*VIEW Dashboard*/
            /*View Admin*/
            $('.admin').addClass(` {{ Request::route()->getName() == 'Admin' ? 'active' : false }}`)
            $('.admin').click(function() {
                window.location = "{{ route('Admin') }}";
            })
            /*View Admin*/

            /*VIEW Users*/
            $('.admin_users').addClass("{{ Request::route()->getName() == 'admin_users' ? 'active' : false }}");
            $('.admin_users').click(function() {
                window.location = "{{ route('admin_users') }}";
            })
            /*VIEW Users*/
            /*VIEW Category*/
            $('.admin_categories').addClass(
                "{{ Request::route()->getName() == 'admin_categories' ? 'active' : false }}")
            $('.admin_categories').click(function() {
                window.location = "{{ route('admin_categories') }}";
            })
            /*VIEW Category*/
            /*VIEW Author*/
            $('.admin_author').addClass("{{ Request::route()->getName() == 'admin_author' ? 'active' : false }}");
            $('.admin_author').addClass(
                "{{ Request::route()->getName() == 'ViewAddAuthor' ? 'active' : false }}");
            $('.admin_author').addClass(
                "{{ Request::route()->getName() == 'authorDetails' ? 'active' : false }}");
            $('.admin_author').addClass("{{ Request::route()->getName() == 'getAuthor' ? 'active' : false }}");
            $('.admin_author').click(function() {
                window.location = "{{ route('admin_author') }}";
            })
            /*VIEW Author*/
            /*VIEW Book*/
            $('.admin_book').addClass("{{ Request::route()->getName() == 'admin_book' ? 'active' : false }}");
            $('.admin_book').addClass("{{ Request::route()->getName() == 'ViewAddBook' ? 'active' : false }}");
            $('.admin_book').addClass("{{ Request::route()->getName() == 'getBook' ? 'active' : false }}");
            $('.admin_book').addClass("{{ Request::route()->getName() == 'bookDetails' ? 'active' : false }}");
            $('.admin_book').click(function() {
                window.location = "{{ route('admin_book') }}";
            })
            /*VIEW Book*/
            /*VIEW Ads*/
            $('.admin_ads').addClass("{{ Request::route()->getName() == 'admin_ads' ? 'active' : false }}")
            $('.admin_ads').addClass("{{ Request::route()->getName() == 'ViewAddAds' ? 'active' : false }}")
            $('.admin_ads').addClass("{{ Request::route()->getName() == 'GetAdsUpdate' ? 'active' : false }}")
            $('.admin_ads').click(function() {
                window.location = "{{ route('admin_ads') }}";
            })
            /*VIEW Ads*/
            /*VIEW Order*/
            $('.admin_order').click(function() {
                window.location = "{{ route('admin_order') }}";
            })
            /*VIEW Order*/
            /*VIEW Post*/
            $('.admin_posts').addClass("{{ Request::route()->getName() == 'admin_posts' ? 'active' : false }}");
            $('.admin_posts').addClass("{{ Request::route()->getName() == 'postDetails' ? 'active' : false }}");
            $('.admin_posts').click(function() {
                window.location = "{{ route('admin_posts') }}";
            })
            /*VIEW Post*/
            /*VIEW Pay*/
            $('.admin_pay').addClass("{{ Request::route()->getName() == 'admin_pay' ? 'active' : false }}");
            $('.admin_pay').click(function() {
                window.location = "{{ route('admin_pay') }}";
            })
            /*VIEW Pay*/
            /*VIEW Shipper*/
            $('.admin_shipper').addClass(
                "{{ Request::route()->getName() == 'admin_shipper' ? 'active' : false }}");
            $('.admin_shipper').addClass(
                "{{ Request::route()->getName() == 'ViewAddShipper' ? 'active' : false }}")
            $('.admin_shipper').click(function() {
                window.location = "{{ route('admin_shipper') }}";
            })
            /*VIEW Shipper*/
            /*Logout*/
            $('.admin_logout').click(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin_logout') }}",
                    dataType: "JSON",
                    success: function(response) {
                        localStorage.removeItem('id_admin');
                        localStorage.removeItem('full_nameBE');
                        window.location = "{{ route('admin_login_View') }}";
                    }
                });
            });
            /*Logout*/
            /*Count Users*/
            $.ajax({
                type: "GET",
                url: "{{ route('countUsers') }}",
                dataType: "JSON",
                success: function(response) {
                    $('#CountUsers').html(response.countUsers);
                }
            });
            /*Count Users*/
            /*Count Order*/
            $.ajax({
                type: "GET",
                url: "{{ route('countOrder') }}",
                dataType: "JSON",
                success: function(response) {
                    $('#CountOrder').html(response.countOrder);
                }
            });
            /*Count Order*/
            $('.admin_profile').click(function() {
                var idlogin = localStorage.getItem('id_admin')

                $('#Profile').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#Profile').modal('hide');
                })
                btnIcon.click(function() {
                    $('#Profile').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "/api/GetAdmin/" + idlogin,
                    success: function(response) {
                        $('#id_profile').val(response.users.id);
                        $('#admin_name_profile').val(response.users.full_name);
                    }
                });
                //Profile
                $('#profile').click(function(e) {
                    // var idlogin = localStorage.getItem('id_admin')
                    var id_profile = $('#id_profile').val();
                    var password_new = $('#password_new').val();
                    var confirm_password_new = $('#confirm_password_new').val();
                    var form = $(this).parents('form');
                    // handling validate
                    $(form).validate({
                        rules: {
                            admin_name_profile: {
                                required: true,
                            },
                            password_new: {
                                required: true,
                                minlength: 6,
                            },
                            confirm_password_new: {
                                required: true,
                                equalTo: "#password_new",
                            }
                        },
                        messages: {
                            admin_name_profile: {
                                required: "Họ và tên không được để trống!",
                            },
                            password_new: {
                                required: "Mật khẩu không được để trống!",
                                minlength: "Mật khẩu không được nhỏ hơn 6 ký tự",
                            },
                            confirm_password_new: {
                                required: "Xác nhận mật khẩu không được để trống!",
                                equalTo: "Xác nhận mật khẩu không khớp!",
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
                                url: "{{ route('profile') }}",
                                data: formData,
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                success: function(data) {}
                            });
                            /*Logout*/
                            $.ajax({
                                type: "GET",
                                url: "{{ route('admin_logout') }}",
                                dataType: "JSON",
                                success: function(response) {
                                    localStorage.removeItem('id_admin');
                                    localStorage.removeItem('full_nameBE');
                                    window.location =
                                        "{{ route('admin_login_View') }}";
                                }
                            });
                            /*Logout*/
                        }
                    })
                })
            })
            /*Total Book*/
            $.ajax({
                type: "GET",
                url: "{{ route('totalbook') }}",

                success: function(response) {
                    // console.log(response.Totals);
                    if(response.Totals==null){
                        $('#total_book').text(
                        `Tổng doanh thu: 0đ `)      
                    }else{

                        $('#total_book').text(
                            `Tổng doanh thu: ${response.Totals.toLocaleString('en-US')}đ `)
                    }
                }
            });
            /*Total Book*/
            //Logout localStorage.getItem('full_nameBE')
            if (localStorage.getItem('full_nameBE') == null) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin_logout') }}",
                    dataType: "JSON",
                    success: function(response) {
                        // localStorage.removeItem('id_admin');
                        // localStorage.removeItem('full_nameBE');
                        
                        window.location =
                            "{{ route('admin_login_View') }}";
                    }
                });
            }

        })
    </script>
@endpush
