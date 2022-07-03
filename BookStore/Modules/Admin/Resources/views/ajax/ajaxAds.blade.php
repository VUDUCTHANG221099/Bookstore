@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*GET Ads*/
            $('.EyeAds').click(function(e) {
                e.preventDefault();
                var slug = $(this).val();
                $('#ViewAds').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#ViewAds').modal('hide');
                })
                btnIcon.click(function() {
                    $('#ViewAds').modal('hide');
                })
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetAds') }}",
                    data: {
                        slug: slug,
                    },
                    dataType: 'json',
                    success: function(response) {

                        $('#View_title').attr('disabled', 'disabled');
                        // $('#ViewAdmin_email').attr('disabled', 'disabled');
                        $('#View_title').val(response.ads.title);
                        if (response.ads.avatar == null) {
                            $('.showOfhide').css('display', 'none')
                        } else {
                            $('.showOfhide').css('display', 'block');
                            $('#file-upload').attr('disabled', 'disabled');
                            $('#file-image').attr('src',
                                `{{ asset('images/ads/${response.ads.avatar}') }}`);


                        }
                        // $('#ViewAdmin_email').val(response.users.email);
                    }
                });
            });
            /*GET ads*/
            /*ADD Ads*/

            /*view*/

            $('.addAds').click(function() {
                window.location = "{{ route('ViewAddAds') }}";
            })
            /*view*/
            $('.add_ads').click(function(e) {
                var title = $('#title').val();
                var location=$('#location').val();
                var file_upload = $('#file-upload').val();

                var form = $(this).parents('form');
                // handling validate
                $(form).validate({
                    rules: {
                        title: {
                            required: true,
                        },

                    },
                    messages: {
                        title: {
                            required: "Tiêu đề không được để trống!"
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
                            url: "{{ route('AddAds') }}",
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
                                    window.location = "{{ route('admin_ads') }}"

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

            /*ADD Ads*/



            /*DELETE Admin*/

            $('.RemoveAds').click(function() {
                var slug = $(this).val();
                $('#RemoveAds').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');
                btn.click(function() {
                    $('#RemoveAds').modal('hide');
                })
                btnIcon.click(function() {
                    $('#RemoveAds').modal('hide');
                })
                var btnYes = $('#YesRemoveAds');
                var btnNo = $('#NoRemoveAds');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('RemoveAds') }}",
                        data: {
                            slug: slug
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#destroyAds').addClass(
                                    'btn btn-success');
                                $('#destroyAds').fadeIn();
                                $('#destroyAds').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyAds')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemoveAds').modal('hide');
                })
            })

            /*DELETE Admin*/

          

















        })
    </script>
@endpush
