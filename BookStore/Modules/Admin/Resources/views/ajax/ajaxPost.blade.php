@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
              /*DELETE Post*/
              $('.RemovePost').click(function() {
                var slug = $(this).val();
                // alert(slug);
                $('#RemovePost').modal('show');

                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');

                btn.click(function() {
                    $('#RemovePost').modal('hide');

                })
                btnIcon.click(function() {
                    $('#RemovePost').modal('hide');
                })
                var btnYes = $('#YesRemovePost');
                var btnNo = $('#NoRemovePost');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('removePost') }}",
                        data: {
                            slug: slug
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#destroyPost').addClass(
                                    'btn btn-success');
                                $('#destroyPost').fadeIn();
                                $('#destroyPost').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyPost')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemovePost').modal('hide');

                })
            })
            /*DELETE Customer*/

    });
</script>
@endpush