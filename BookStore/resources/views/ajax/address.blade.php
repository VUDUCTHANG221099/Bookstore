@push('scripts')
    <script>
        AddAddress();
        AddAddressView();
        RemoveAddress();
        UpdateAddressView();
        UpdateAddress();

        function AddAddress() {
            $.ajax({
                type: "GET",
                url: "{{ route('Province') }}",
                success: function(data) {
                    // console.log(data);
                    data.forEach(element => {
                        $('#ProvinceData').append(`
                        <option value="${element.id}">${element.name}</option>
                        `)
                    });
                }
                // $('#DistrictData').
            });
            $('#DistrictData').attr('disabled', 'disabled');
            $('#ProvinceData').change(function() {
                let province_id = $('#ProvinceData').val();

                $('#DistrictData').removeAttr('disabled');
                $.ajax({
                    type: "GET",
                    url: "/api/District/" + province_id,
                    success: function(data) {
                        $('#DistrictData').empty();
                        $('#WardData').empty();
                        $('#WardData').attr('disabled', 'disabled');


                        $('#DistrictData').html('<option value="" hidden="">---</option>');

                        data.forEach(element => {
                            $('#DistrictData').append(`
                        <option value="${element.id}">${element.name}</option>
                        `)
                        });
                    }
                });
                // console.log($('#ProvinceData').val());
            })

            $('#WardData').attr('disabled', 'disabled');

            $('#DistrictData').change(function() {
                let district_id = $('#DistrictData').val();
                $('#WardData').removeAttr('disabled');
                $.ajax({
                    type: "GET",
                    url: "/api/Ward/" + district_id,
                    success: function(data) {
                        $('#WardData').empty();
                        $('#WardData').html('<option value="" hidden="">---</option>');
                        data.forEach(element => {
                            $('#WardData').append(`
                        <option value="${element.id}">${element.name}</option>
                        `)
                        });
                    }
                });
                // console.log($('#ProvinceData').val());
            })
            // New Add
            $('#addnew').click(function() {
                let id = localStorage.getItem('idFE');
                let address_default = $('#address_default_address_0').val();
                // alert(address_default)
                let check_default = Number($('#address_default_address_0').is(':checked'));
                let ProvinceData = $('#ProvinceData').val();
                let DistrictData = $('#DistrictData').val();
                let WardData = $('#WardData').val();
                let Phone = $('#Phone').val();
                let address_Customer = $('#address_Customer').val();

                var form = $(this).parents('form');
                $(form).validate({
                    rules: {
                        ProvinceData: {
                            required: true,

                        },
                        DistrictData: {
                            required: true,

                        },
                        WardData: {
                            required: true,
                        },
                        Phone: {
                            required: true,
                            maxlength: 12,
                            minlength: 3,
                        },
                        address_Customer: {
                            required: true,
                        }
                    },
                    messages: {

                        ProvinceData: {
                            required: "Tỉnh/Thành phố chưa được chọn!",

                        },
                        DistrictData: {
                            required: "Quận/Huyện chưa được chọn!",

                        },
                        WardData: {
                            required: "Xã/Phường chưa được chọn!",

                        },
                        Phone: {
                            required: "Số điện thoại không được để trống!",
                            maxlength: "Số điện thoại không được lớn hơn 12!",
                            minlength: "Số điện thoại không được nhỏ hơn 3!"
                        },
                        address_Customer: {
                            required: "Địa chỉ không được để trống!",

                        }



                    },

                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        error.css('color', 'red');
                        $('.modal_address').css('height', '410px')
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

                        $('.modal_address').css('height', '340px');
                        $.ajax({
                            type: "POST",
                            url: "{{ route('AddAddressFE') }}",
                            data: {
                                id: id,
                                phone: Phone,
                                address: address_Customer,
                                province_id: ProvinceData,
                                district_id: DistrictData,
                                ward_id: WardData,
                                IsDefault: check_default,
                            },
                            dataType: "json",
                            success: function(response) {

                                window.location =
                                    "{{ route('profileFEAddress') }}";
                            }
                        });
                        // var formData = new FormData(form[0]);
                        // Method Post

                    }


                });

            })
            //Format Phone
            $('.phone').change(function(e) {
                let phone = $('.phone').val();


                if (phone != '') {
                    $('.phone').addClass('has-content');
                } else {
                    $('.phone').removeClass('has-content');

                }
            })
            $('.address_Customer').change(function(e) {
                let address_Customer = $('.address_Customer').val();
                if (address_Customer != '') {
                    $('.address_Customer').addClass('has-content');
                } else {
                    $('.address_Customer').removeClass('has-content');

                }
            })
            //Format Phone
        }

        function AddAddressView() {
            //  $('.Addaddress').click(function(e) {
            const Addaddress = $("#Addaddress");
            const modalAddress = $(".add_address");
            const btnCloseAddress = $('.btn-close');
            const btnCancel = $('.btn-Cancel')
            //  const btnClose = $(".close-window");
            Addaddress.click(function(e) {
                e.preventDefault();

                modalAddress.show();
                $('#add_address').show();

            })
            btnCloseAddress.click(function() {
                modalAddress.hide();
                $('#add_address').hide();

            });
            btnCancel.click(function() {
                modalAddress.hide();
                $('#add_address').hide();

            });
            $(window).on("click", function(e) {
                // e.preventDefault();

                if ($(e.target).is(".add_address")) {
                    $('#add_address').hide();
                    modalAddress.hide();
                }
            });
            //  })
        }



        function RemoveAddress() {

            //Remove Address
            $('.btn-delete').click(function() {
                let id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('CheckAddressFE') }}",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                // alert(data)

                        // console.log(data);
                        // alert(data)
                        
                        if (data.id == id) {
                            alert("Xin lỗi địa chỉ này của bạn không được xóa!")
                            // alert(id)
                        } else {
                            var check = confirm("Bạn có muốn xóa địa chỉ không?");

                            if (check == true) {
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('DeleteAddress') }}",
                                    data: {
                                        id: id
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        location.reload();

                                    }
                                });
                            }
                        }
                    }
                });


            });
            //Remove Address
        }

        function UpdateAddressView() {


            const btn_edit = $(".btn-edit");
            const modalAddress = $(".update_address");
            const btnCloseAddress = $('.btn-close');
            const btnCancel = $('.btn-Cancel')
            //  const btnClose = $(".close-window");
            btn_edit.click(function(e) {
                e.preventDefault();

                modalAddress.show();
                $('#update_address').show();

            })
            btnCloseAddress.click(function() {
                modalAddress.hide();
                $('#update_address').hide();

            });
            btnCancel.click(function() {
                modalAddress.hide();
                $('#update_address').hide();

            });
            $(window).on("click", function(e) {
                // e.preventDefault();

                if ($(e.target).is(".update_address")) {
                    $('#update_address').hide();
                    modalAddress.hide();
                }
            });
            //Get Address
            $('.btn-edit').click(function() {
                let id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetAddress') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        response.status == 1 ? $('#address_default_address_1').attr('checked', true) :
                            false;

                        $('#PhoneUpdate').val(response.phone)
                        $('#AddressUpdate').val(response.address)


                        let PhoneUpdate = $('.PhoneUpdate').val();
                        let AddressUpdate = $('.AdddressUpdate').val();


                        // console.log(PhoneUpdate);
                        if (PhoneUpdate != '') {
                            $('.PhoneUpdate').addClass('has-content');
                        } else {
                            $('.PhoneUpdate').removeClass('has-content');

                        }
                        if (AddressUpdate != '') {
                            $('.AddressUpdate').addClass('has-content');
                        } else {
                            $('.AddressUpdate').removeClass('has-content');

                        }
                        let ProvinceGET = response.province_id;
                        let DistrictGET = response.district_id;
                        let WardGET = response.ward_id;
                        // console.log(WardGET);
                        //Province
                        $.ajax({
                            type: "GET",
                            url: "{{ route('Province') }}",
                            success: function(data) {
                                // console.log(data);
                                data.forEach(element => {
                                    if (ProvinceGET == element.id) {
                                        $('#ProvinceDataUpdate').append(`
                                                <option value="${element.id}" selected>${element.name}</option>
                                                `)
                                    } else {
                                        $('#ProvinceDataUpdate').append(`
                                                <option value="${element.id}">${element.name}</option>
                                                `)
                                    }
                                });
                            }
                            // $('#DistrictData').
                        });
                        //District
                        $('#DistrictDataUpdate').attr('disabled', 'disabled');
                        // console.log(ProvinceGET);
                        let province_id = ProvinceGET;
                        $('#DistrictDataUpdate').removeAttr('disabled');
                        $.ajax({
                            type: "GET",
                            url: "/api/District/" + province_id,
                            success: function(data) {
                                $('#DistrictDataUpdate').empty();
                                $('#WardDataUpdate').empty();
                                // $('#WardDataUpdate').attr('disabled',
                                //     'disabled');
                                $('#DistrictDataUpdate').html(
                                    '<option value="" hidden="">---</option>'
                                );
                                data.forEach(element => {
                                    if (DistrictGET == element.id) {

                                        $('#DistrictDataUpdate')
                                            .append(`
                                                        <option value="${element.id}" selected>${element.name}</option>
                                                         `)
                                    } else {
                                        $('#DistrictDataUpdate').append(`
                                                <option value="${element.id}">${element.name}</option>
                                                `)
                                    }
                                });
                            }



                        })
                        $('#ProvinceDataUpdate').change(function() {
                            let province_id = $('#ProvinceDataUpdate').val();

                            $('#DistrictDataUpdate').removeAttr('disabled');
                            $.ajax({
                                type: "GET",
                                url: "/api/District/" + province_id,
                                success: function(data) {
                                    $('#DistrictDataUpdate').empty();
                                    $('#WardDataUpdate').empty();
                                    $('#WardDataUpdate').attr(
                                        'disabled', 'disabled');


                                    $('#DistrictDataUpdate').html(
                                        '<option value="" hidden="">---</option>'
                                    );

                                    data.forEach(element => {
                                        $('#DistrictDataUpdate')
                                            .append(`
                                                    <option value="${element.id}">${element.name}</option>
                                                    `)
                                    });
                                }
                            });
                            // console.log($('#ProvinceData').val());
                        })
                        //Ward
                        // $('#WardDataUpdate').attr('disabled', 'disabled');
                        // console.log(district_id);
                        let district_id = DistrictGET;
                        // $('#WardDataUpdate').removeAttr('disabled');

                        $.ajax({
                            type: "GET",
                            url: "/api/Ward/" + district_id,
                            success: function(data) {
                                // console.log(data);
                                // $('#DistrictDataUpdate').empty();
                                $('#WardDataUpdate').empty();
                                // $('#WardDataUpdate').attr('disabled',
                                //     'disabled');
                                $('#WardDataUpdate').html(
                                    '<option value="" hidden="">---</option>'
                                );
                                data.forEach(element => {
                                    if (WardGET == element.id) {

                                        $('#WardDataUpdate')
                                            .append(`
                                                        <option value="${element.id}" selected>${element.name}</option>
                                                         `)
                                    } else {
                                        $('#WardDataUpdate').append(`
                                                <option value="${element.id}">${element.name}</option>
                                                `)
                                    }
                                });
                            }



                        })
                        $('#DistrictDataUpdate').change(function() {
                            let district_id = $('#DistrictDataUpdate').val();
                            $('#WardDataUpdate').removeAttr('disabled');
                            $.ajax({
                                type: "GET",
                                url: "/api/Ward/" + district_id,
                                success: function(data) {
                                    $('#WardDataUpdate').empty();
                                    $('#WardDataUpdate').html(
                                        '<option value="" hidden="">---</option>'
                                    );
                                    data.forEach(element => {
                                        $('#WardDataUpdate')
                                            .append(`
                                            <option value="${element.id}">${element.name}</option>
                                            `)
                                    });
                                }
                            });
                            // console.log($('#ProvinceData').val());
                        })


                        //Address



                    }
                });
            })



        }

        function UpdateAddress() {
            $('.btn-edit').click(function() {
                let id_user = localStorage.getItem('idFE');
                let id = $(this).val();
                $('#updateAddress').click(function() {

                    let address_default = $('#address_default_address_1').val();
                    // alert(address_default)
                    let check_default = Number($('#address_default_address_1').is(':checked'));
                    let PhoneUpdate = $('#PhoneUpdate').val();
                    let AddressUpdate = $('#AddressUpdate').val();
                    let ProvinceDataUpdate = $('#ProvinceDataUpdate').val();
                    let DistrictDataUpdate = $('#DistrictDataUpdate').val();
                    let WardDataUpdate = $('#WardDataUpdate').val();
                    var form = $(this).parents('form');
                    $(form).validate({
                        rules: {
                            ProvinceDataUpdate: {
                                required: true,
                            },
                            DistrictDataUpdate: {
                                required: true,

                            },
                            WardDataUpdate: {
                                required: true,
                            },
                            PhoneUpdate: {
                                required: true,
                                minlength: 3,
                            },
                            AddressUpdate: {
                                required: true,

                            }

                        },
                        messages: {
                            ProvinceDataUpdate: {
                                required: "Tỉnh/Thành phố chưa được chọn!"
                            },
                            DistrictDataUpdate: {
                                required: "Quận/Huyện chưa được chọn!"
                            },
                            WardDataUpdate: {
                                required: "Xã/Phường chưa được chọn!",
                            },
                            PhoneUpdate: {
                                required: "Số điện thoại không được để trống!",
                                minlength: "Số điện thoại không được nhỏ hơn 3!"
                            },
                            AddressUpdate: {
                                required: "Địa chỉ không được để trống!",
                            },

                        },

                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            error.css('color', 'red');
                            $('.modal_address').css('height', '410px')
                            element.closest('.form-group').append(error);
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        },
                        submitHandler: function() {
                            // var formData = new FormData(form[0]);

                            $('.modal_address').css('height', '340px');
                            $.ajax({
                                type: "POST",
                                url: "{{ route('UpdateAddressFE') }}",
                                data: {
                                    id: id,
                                    IsDefault: check_default,
                                    phone: PhoneUpdate,
                                    address: AddressUpdate,
                                    province_id: ProvinceDataUpdate,
                                    district_id: DistrictDataUpdate,
                                    ward_id: WardDataUpdate,
                                    id_user: id_user,
                                },
                                dataType: "json",
                                success: function(response) {

                                    window.location =
                                        "{{ route('profileFEAddress') }}";
                                }
                            });

                        }

                    });

                })
            })
        }
    </script>
@endpush
