@push('scripts')
  
  
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            


            $('.addAuthor').click(function() {
                window.location = "{{ route('ViewAddAuthor') }}";
            });

            /*View Add Author*/



            /*ADD Author*/
            $('.add_Author').click(function(e) {

                var Author_name = $('#Author_name').val();
                var Author_date = $('#Author_date').val();
                var Cate = $('#Cate').val();
                var Author_desc = $('textarea#Author_desc').val();
                var avatar=$('#imageUpload').val();
                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        Author_name: {
                            required: true
                        },
                        Author_date: {
                            required: true
                        },
                        Cate:{
                            required: true
                        }
                    },
                    messages: {
                        Author_name: {
                            required: "Họ và tên không được để trống!"
                        },
                        Author_date: {
                            required: "Ngày sinh không được để trống!"
                        },Cate:{
                            required:'Thể loại chưa được chọn!'
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
                            url: "{{ route('addAuthor') }}",
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
                                    window.location = "{{ route('admin_author') }}"
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
            /*ADD Author*/

           



           

            /*DELETE Author*/
            $('.RemoveAuthor').click(function() {
                var slug = $(this).val();
                
                
                $('#RemoveAuthor').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveAuthor').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveAuthor').modal('hide');
                })
                var btnYes = $('#YesRemoveAuthor');
                var btnNo = $('#NoRemoveAuthor');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/api/RemoveAuthor/" + slug,
                        success: function(response) {
                            if (response.success) {
                                $('#destroyAuthor').addClass(
                                    'btn btn-success');
                                $('#destroyAuthor').fadeIn();
                                $('#destroyAuthor').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyAuthor')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemoveAuthor').modal('hide');
                })
            })
            /*DELETE Admin*/

            /*UPDATE Book*/
            $('.update_author').click(function() {
                
                var author_slug = $('#author_slug').val();
            
                // alert(book_slug);
                var author_name = $('#author_name').val();
                var author_date = $('#author_date').val();
                var Cate = $('#Cate').val();
                var author_desc = $('textarea#author_desc').val();
                var avatar=$('#imageUpload').val();

                var form = $(this).parents('form');


                $(form).validate({
                    rules: {
                        author_name: {
                            required: true
                        },
                        author_date: {
                            required: true

                        }
                    },
                    messages: {
                        author_name: {
                            required: "Họ và tên không được để trống!"
                        },
                        author_date: {
                            required: "Ngày sinh không được để trống!"
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
                            url: "{{ route('updateAuthor') }}",
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
                                    window.location = "{{ route('admin_author') }}"
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
    </script>
@endpush
