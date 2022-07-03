@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.addBook').click(function() {
                window.location = "{{ route('ViewAddBook') }}";
            })
            /*ADD Book*/
            $('.add_book').click(function(e) {
                var book_name = $('#book_name').val();
                var language = $('#language').val();
                var category = $('#category').val();
                var nxb = $('#nxb').val();
                var year_publish = $('#year_publish').val();
                var author = $('#author').val();
                var quantity = $('#quantity').val();
                var price = $('#price').val();
                var pages = $('#pages').val();
                var is_top = $('#is_top').val();
                var file_upload = $('#file-upload').val();
                
                var book_desc = $('#book_desc').val();
                var form = $(this).parents('form');

                $(form).validate({
                    rules: {
                        book_name: {
                            required: true
                        },
                        quantity: {
                            required: true,
                            number: true,
                        },
                        price: {
                            required: true,
                            number: true,
                        },
                        language:{
                            required: true,
                        },
                        category:{
                            required: true,

                        },author:{
                            required: true,

                        }
                    },
                    messages: {
                        book_name: {
                            required: "Tên sách không được để trống!"
                        },
                        quantity: {
                            required: "Số lượng không được để trống!",
                            number:"Vui lòng nhập một số hợp lệ!"
                        },
                        price: {
                            required: "Giá tiền không được để trống!",
                            number:"Vui lòng nhập một số hợp lệ!"
                        },language:{
                            required:"Ngôn ngữ chưa được chọn!"
                        },category:{
                            required:"Thể loại chưa được chọn!"

                        },author:{
                            required:"Tác giả chưa được chọn!"
                            

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
                            url: "{{ route('addBook') }}",
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
                                    window.location = "{{ route('admin_book') }}"
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
            })
            /*DELETE Book*/
            $('.RemoveBook').click(function(e) {

                var slug = $(this).val();
                $('#RemoveBook').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveBook').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveBook').modal('hide');
                })
                var btnYes = $('#YesRemoveBook');
                var btnNo = $('#NoRemoveBook');
                btnYes.click(function() {

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('removeBook') }}",
                        data: {
                            book_slug: slug
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#destroyBook').addClass(
                                    'btn btn-success');
                                $('#destroyBook').fadeIn();
                                $('#destroyBook').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyBook')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                });
                btnNo.click(function() {
                    $('#RemoveBook').modal('hide');
                })
            })

            /*UPDATE Book*/
            $('.update_book').click(function() {
                var book_slug = $('#book_slug').val();
                // alert(book_slug);
                var book_name = $('#book_name').val();
                var language = $('#language').val();
                var category = $('#category').val();
                var nxb = $('#nxb').val();
                var year_publish = $('#year_publish').val();
                var author = $('#author').val();
                var quantity = $('#quantity').val();
                var price = $('#price').val();
                var pages = $('#pages').val();
                var is_top = $('#is_top').val();
                var file_upload = $('#file-upload').val();
                
                var book_desc = $('#book_desc').val();
                var form = $(this).parents('form');

                $(form).validate({
                    rules: {
                        book_name: {
                            required: true
                        },
                        quantity: {
                            required: true
                        },
                        price: {
                            required: true
                        }
                    },
                    messages: {
                        book_name: {
                            required: "Tên sách không được để trống!"
                        },
                        quantity: {
                            required: "Số lượng không được để trống!"
                        },
                        price: {
                            required: "Giá tiền không được để trống!"
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
                            type: "post",
                            url: "{{ route('updateBook') }}",
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
                                    window.location = "{{ route('admin_book') }}"
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
        });
    </script>
@endpush
