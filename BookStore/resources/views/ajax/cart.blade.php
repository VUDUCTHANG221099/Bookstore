@push('scripts')
    {{-- <script src="{{ asset('FrontEnd/assets/js/jquery.min.js') }}" type="text/javascript"></script> --}}

    <script>
        Xem_nhanh()
        Them_gio_hang()
        Gio_Hang_Detals();

        // // AddToCart();
        Gio_Hang();
        let modalThemGioHangGlobal = $("#popup-cart");;


        function Them_Gio_Hang_Ajax() {

            const modalThemGioHang = $("#popup-cart");
            $.ajax({
                type: "GET",
                url: "{{ route('Them_Gio_Hang') }}",
                success: function(data) {
                    $('#ThemGioHang').html(data
                        .TotalCart)
                }
            });
            modalThemGioHang.show();
        }

        function AddToCart_Ajax(AddUrl, quantity) {
            const modal = $("#quick-view-product");
            const quickviewModal = $("#popup-cart");
            $.ajax({
                type: "GET",
                url: AddUrl,
                data: {
                    quantity: quantity
                },
                success: function(data) {
                    modal.hide();

                    Them_Gio_Hang_Ajax();

                    Gio_Hang();

                    quickviewModal.show();
                }
            });
        }

        function Gio_Hang() {

            $.ajax({
                type: "GET",
                url: "{{ route('Gio_Hang') }}",
                success: function(data) {
                    // console.log(data.TotalCart);
                    $('.Gio_Hang_Right').html(data.TotalCart);
                }
            });
        }


        function Xem_nhanh() {
            const xem_nhanh = $(".xem_nhanh");
            const modal = $("#quick-view-product");
            const quickviewModal = $("#popup-cart");

            const btnClose = $(".close-window");
            xem_nhanh.click(function() {
                var slug = $(this).val();
                // quantity = $('#quantity-detail').val();

                if ("{{ auth()->check() }}") {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('viewquick') }}",
                        data: {
                            slug: slug,
                        },
                        dataType: "json",
                        success: function(data) {


                            $('#viewProduct').html(data.bookView);





                            function AddToCart() {

                                let quantity = $('#quantity-detail').val();
                                let AddUrl = $('.quantity_wanted_p').data('url');

                                if (quantity > data.book.quantity) {
                                    if (data.book.quantity == 0) {
                                        alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                    } else {

                                        alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                            .book
                                            .quantity + " sản phẩm")
                                    }
                                } else {
                                    // console.log(data.session);
                                    // alert(data.session);
                                    if (data.session === null) {
                                        // alert(5400)

                                        AddToCart_Ajax(AddUrl, quantity)
                                    } else {
                                        // alert(400)
                                        if (data.session.quantity < data.book.quantity) {
                                            AddToCart_Ajax(AddUrl, quantity)
                                        } else if (data.session.quantity > data.book.quantity) {

                                            if (data.book.quantity == 0) {
                                                alert("Sản phẩm " + data.book.book_name +
                                                    " hết sản phẩm")
                                            } else {

                                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " +
                                                    data.book
                                                    .quantity + " sản phẩm")
                                            }
                                        } else {
                                            if (data.book.quantity == 0) {
                                                alert("Sản phẩm " + data.book.book_name +
                                                    " hết sản phẩm")
                                            } else {

                                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " +
                                                    data.book
                                                    .quantity + " sản phẩm")
                                            }
                                        }
                                    }
                                }








                                // location.reload();



                                // alert(AddUrl);
                            }


                            $('.btn_add_cart').on('click', AddToCart)
                        },
                    });
                    modal.show();
                } else {
                    window.location = "{{ route('loginViewFE') }}"
                }
            });
            btnClose.click(function(e) {


                modal.hide();
            });
            $(window).on("click", function(e) {
                // e.preventDefault();

                if ($(e.target).is(modal)) {
                    modal.hide();
                }
            });

        }




        function Them_gio_hang() {
            const modalThemGioHang = $("#popup-cart");
            /*Thêm vào giỏ*/
            var btnCart = $(".btn-cart");

            const xem_nhanh = $(".xem_nhanh");
            const modal = $("#quick-view-product");
            const btnClose = $(".close-window");

            btnCart.click(function(e) {
                // console.log('1000');

                e.preventDefault();


                if ("{{ auth()->check() }}") {
                    let AddUrl = $(this).data('url');
                    let idBook = $(this).data('id');
                    // alert(idBook);
                    $.ajax({
                        type: "GET",
                        url: "{{ route('GetdataBook') }}",
                        data: {
                            id: idBook,
                        },
                        dataType: "json",
                        success: function(data) {

                            let quantity = $('#qtym').val();
                            if (quantity > data.book.quantity) {
                                if (data.book.quantity == 0) {
                                    alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                } else {

                                    alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data.book
                                        .quantity + " sản phẩm")
                                }
                            } else {
                                if (data.session === null) {
                                    SubThemGioHangAjax(AddUrl, quantity)
                                } else {
                                    if (data.session.quantity < data.book.quantity) {
                                        SubThemGioHangAjax(AddUrl, quantity)
                                    } else if (data.session.quantity > data.book.quantity) {
                                        if (data.book.quantity == 0) {
                                            alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                        } else {

                                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                                .book
                                                .quantity + " sản phẩm")
                                        }
                                    } else {
                                        if (data.book.quantity == 0) {
                                            alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                        } else {

                                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                                .book
                                                .quantity + " sản phẩm")
                                        }
                                    }
                                }
                            }
                            // Them_Gio_Hang_Ajax();




                        }
                    });


                    modal.hide();

                } else {
                    window.location = "{{ route('loginViewFE') }}"
                }

            });
            btnClose.click(function() {
                modalThemGioHang.hide();
            });
            $(window).on("click", function(e) {
                if ($(e.target).is(modalThemGioHang)) {
                    modalThemGioHang.hide();
                }
            });
        }

        function Gio_Hang_Detals() {
            function AddToCart() {
                let AddUrl = $(this).data('url');
                let idBook = $(this).data('id');

                // Them_Gio_Hang_Ajax();
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetdataBook') }}",
                    data: {
                        id: idBook,
                    },
                    dataType: "json",
                    success: function(data) {

                        let quantity = $('#qtymDetals').val();

                        if (quantity > data.book.quantity) {
                            if (data.book.quantity == 0) {
                                alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                            } else {

                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data.book
                                    .quantity + " sản phẩm")
                            }
                            // alert(data.session.quantity)
                        } else {
                            if (data.session === null) {
                                SubThemGioHangAjax(AddUrl, quantity)
                            } else {
                                if (data.session.quantity < data.book.quantity) {
                                    SubThemGioHangAjax(AddUrl, quantity)
                                } else if (data.session.quantity > data.book.quantity) {
                                    if (data.book.quantity == 0) {
                                        alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                    } else {

                                        alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data.book
                                            .quantity + " sản phẩm")
                                    }
                                } else {
                                    if (data.book.quantity == 0) {
                                        alert("Sản phẩm " + data.book.book_name + " hết sản phẩm")
                                    } else {

                                        alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data.book
                                            .quantity + " sản phẩm")
                                    }
                                }
                                // alert(5000);

                            }
                        }
                        // Them_Gio_Hang_Ajax();




                    }
                });
                // SubThemGioHangAjax(AddUrl,quantity
            }
            $('.add_to_cartDetals').on('click', AddToCart)


        }

        function SubThemGioHangAjax(AddUrl, quantity) {
            $.ajax({
                type: "GET",
                url: AddUrl,
                data: {
                    quantity: quantity
                },
                success: function(response) {
                    Them_Gio_Hang_Ajax();
                    Gio_Hang();
                }
            });
        }
    </script>
@endpush
