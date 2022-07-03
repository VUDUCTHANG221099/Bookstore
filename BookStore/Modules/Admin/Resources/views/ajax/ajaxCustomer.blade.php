@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             /*GET Customer*/
             $('.EyeCustomer').click(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#ViewCustomer').modal('show');
                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose')
                btn.click(function() {
                    $('#ViewCustomer').modal('hide');

                })
                btnIcon.click(function() {
                    $('#ViewCustomer').modal('hide');

                })
                $.ajax({
                    type: "GET",
                    url: "/api/GetCustomer/" + id,

                    success: function(response) {
                        $('#ViewCustomer_name').attr('disabled', 'disabled');
                        $('#ViewCustomer_email').attr('disabled', 'disabled');
                        $('#ViewCustomer_phone').attr('disabled', 'disabled');
                        $('#ViewCustomer_address').attr('disabled', 'disabled');
                        $('#ViewCustomer_name').val(response.users.full_name);
                        $('#ViewCustomer_email').val(response.users.email);
                        $('#ViewCustomer_phone').val(response.users.phone);
                        $('#ViewCustomer_address').val(response.users.address);
                    }
                });
            });
            /*GET Customer*/  
              /*DELETE Customer*/
              $('.RemoveCustomer').click(function() {
                var id = $(this).val();

                $('#RemoveCustomer').modal('show');

                var btn = $('.modal-footer');
                var btnIcon = $('.btnClose');

                btn.click(function() {
                    $('#RemoveCustomer').modal('hide');

                })
                btnIcon.click(function() {
                    $('#RemoveCustomer').modal('hide');
                })
                var btnYes = $('#YesRemoveCustomer');
                var btnNo = $('#NoRemoveCustomer');
                btnYes.click(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/api/RemoveCustomer/" + id,
                        success: function(response) {
                            if (response.success) {
                                $('#destroyCustomer').addClass(
                                    'btn btn-success');
                                $('#destroyCustomer').fadeIn();

                                $('#destroyCustomer').text(response
                                    .success);
                                setTimeout(() => {
                                    $('#destroyCustomer')
                                        .fadeOut();
                                }, 3000);
                                location.reload();
                            }
                        }
                    });
                })
                btnNo.click(function() {
                    $('#RemoveCustomer').modal('hide');

                })
            })
            /*DELETE Customer*/

    });
</script>
@endpush