@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /*GET Category*/
            $('.EyeCate').click(function(e) {
                e.preventDefault();
                var slug = $(this).val();
                $('#ViewCate').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#ViewCate').modal('hide');

                })
                btnIcon.click(function() {
                    $('#ViewCate').modal('hide');

                })
                $.ajax({
                    type: "GET",
                    url: "/api/GetCategory/" + slug,

                    success: function(response) {
                        $('#ViewCategory_name').attr('disabled', 'disabled');
                        $('#ViewCategory_name').val(response.category.category_name);
                    }
                });
            });
            /*GET Category*/
            /*Add Category*/
            $('.addCate').click(function() {
                $('#AddCate').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#AddCate').modal('hide');
                })
                btnIcon.click(function() {
                    $('#AddCate').modal('hide');
                })
                $('.add_cate').click(function(e) {

                    var Category_name = $('#Category_name').val();

                    var form = $(this).parents('form');
                    // handling validate
                    $(form).validate({
                        rules: {
                            Category_name: {
                                required: true
                            },

                        },
                        messages: {
                            Category_name: {
                                required: "Thể loại sách không được để trống!"
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
                                url: "{{ route('AddCate') }}",
                                data: formData,
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.success) {
                                        $('#successCate').addClass(
                                            'btn btn-success');
                                        $('#successCate').fadeIn();
                                        $('#successCate').text(data
                                            .success);
                                        setTimeout(() => {
                                            $('#successCate')
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
            /*Add Category*/
            /*UPDATE GET Category*/
            $('.EditCate').click(function(e) {
                e.preventDefault();
                var slug = $(this).val();
                $('#UpdateCate').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#UpdateCate').modal('hide');

                })
                btnIcon.click(function() {
                    $('#UpdateCate').modal('hide');

                })
                $.ajax({
                    type: "GET",
                    url: "/api/GetCategory/" + slug,

                    success: function(response) {
                        $('#slug_category').val(response.category.category_slug);
                        $('#Cate_name_update').val(response.category.category_name);
                    }
                });
            });
            /*UPDATE GET Category*/

            /*Update Category*/
            $('.Update_cate').click(function(e) {
                var slug = $('#slug_category').val();

                var Cate_name_update = $('#Cate_name_update').val();
                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        Cate_name_update: {
                            required: true
                        },

                    },
                    messages: {
                        Cate_name_update: {
                            required: "Thể loại sách không được để trống!"
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
                            url: "/api/UpdateCate/" + slug,
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
                                } else {
                                    $("#errorCate").fadeIn();
                                    $('#errorCate').css('color', 'red');
                                    setTimeout(() => {
                                        $('#errorCate')
                                            .fadeOut();
                                    }, 3000);
                                    $('#errorCate').text(data.error);
                                    setTimeout(() => {
                                        $('#errorCate')
                                            .fadeOut();
                                    }, 3000);
                                }
                            }
                        });
                    }
                })
            });
            /*Update Category*/
            /*DELETE Category*/
            $('.RemoveCate').click(function() {
                var slug = $(this).val();
                $('#RemoveCate').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveCate').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveCate').modal('hide');
                })
                var btnYes = $('#YesRemoveCategory');
                var btnNo = $('#NoRemoveCategory');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/api/RemoveCategory/" + slug,
                        success: function(response) {
                            if (response.success) {
                                $('#destroyCate').addClass(
                                    'btn btn-success');
                                $('#destroyCate').fadeIn();
                                $('#destroyCate').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyCate')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemoveCate').modal('hide');
                })
            })
            /*DELETE Category*/

        });
    </script>
@endpush
