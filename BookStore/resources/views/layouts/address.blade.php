 <!-- Modal -->
 <style>
    

     

     .add_address {
         display: none;
         position: fixed;
         z-index: 100;
         padding-top: 10px;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         overflow: auto;
         background-color: rgb(0, 0, 0);
         background-color: rgba(0, 0, 0, 0.4);
     }

     .update_address {
         display: none;
         position: fixed;
         z-index: 100;
         padding-top: 10px;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         overflow: auto;
         background-color: rgb(0, 0, 0);
         background-color: rgba(0, 0, 0, 0.4);
     }

 </style>
 <!-- <div class="modal-1"> -->
 <!--Xem nhanh-->
 

 
 <!--Thêm địa chỉ-->
 <div class="add_address">

     <div id="add_address" class="form-list modal_address modal" style="height: 340px;">
         <div class="btn-close closed_pop"><i class="fa fa-times"></i></div>
         <h2 class="title_pop">
             Thêm địa chỉ mới

         </h2>
         <form class="has-validation-callback">
             {{-- @csrf method="post" action="{{ route('AddAddressFE') }}" --}}
             <div class="pop_bottom">
                 <div class="form_address">

                     <div class="field">
                         <fieldset class="form-group">
                             <input type="tel" class="form-control phone" id="Phone" name="Phone" value="">
                             <label>Số điện thoại</label>
                         </fieldset>
                     </div>
                     <div class="field">
                         <fieldset class="form-group">
                             <input type="text" class="form-control address_Customer" name="address_Customer" value=""
                                 id="address_Customer">
                             <label>Địa chỉ</label>
                         </fieldset>
                     </div>

                     <div class="group-country">
                         <fieldset class="form-group select-field not-vn">
                             <select name="ProvinceData" value="" class="form-control add has-content"
                                 id="ProvinceData">
                                 <option value="" hidden="">---</option>
                             </select>
                             <label>Tỉnh thành</label>
                         </fieldset>
                         <fieldset class="form-group select-field not-vn">
                             <select name="DistrictData" class="form-control add has-content" value=""
                                 id="DistrictData"></select>
                             <label>Quận huyện</label>
                         </fieldset>
                         <fieldset class="form-group select-field not-vn">
                             <select name="WardData" class="form-control add has-content" value=""
                                 id="WardData"></select>
                             <label>Phường xã</label>
                         </fieldset>
                     </div>


                 </div>
                 <div class="checkbox">
                     <label class="c-input c-checkbox" style="padding-left: 20px;">
                         <input type="checkbox" id="address_default_address_0" name="IsDefault" value="">
                         <span class="c-indicator">Đặt là địa chỉ mặc định?</span>
                     </label>
                 </div>
                 <div class="btn-row">
                     <button class="btn-Cancel btn btn-lg btn-dark-address btn-outline article-readmore btn-close"
                         type="button"><span>Hủy</span></button>
                     <button class="btn btn-lg btn-primary btn-submit" id="addnew" type="submit"><span>Thêm địa
                             chỉ</span></button>
                 </div>
             </div>
         </form>
     </div>
 </div>


 <!--Cập nhật địa chỉ-->
 <div class="update_address">

     <div id="update_address" class="form-list modal_address modal" style="height: 340px;">
         <div class="btn-close closed_pop"><i class="fa fa-times"></i></div>
         <h2 class="title_pop">
             Cập nhật địa chỉ

         </h2>
         <form class="has-validation-callback">
             {{-- @csrf method="post" action="{{ route('UpdateAddressFE') }}" --}}
             <div class="pop_bottom">
                 <div class="form_address">

                     <div class="field">
                         <fieldset class="form-group">
                             <input type="tel" class="form-control PhoneUpdate" id="PhoneUpdate" name="PhoneUpdate"
                                 value="">
                             <label>Số điện thoại</label>
                         </fieldset>
                     </div>
                     <div class="field">
                         <fieldset class="form-group">
                             <input type="text" class="form-control AddressUpdate" name="AddressUpdate" value=""
                                 id="AddressUpdate">
                             <label>Địa chỉ</label>
                         </fieldset>
                     </div>

                     <div class="group-country">
                         <fieldset class="form-group select-field not-vn">
                             <select name="ProvinceDataUpdate" value="" class="form-control add has-content"
                                 id="ProvinceDataUpdate">
                                 <option value="" hidden="">---</option>
                                 {{-- <option value="" aria-checked="true">2</option> --}}
                             </select>
                             <label>Tỉnh thành</label>
                         </fieldset>
                         <fieldset class="form-group select-field not-vn">
                             <select name="DistrictDataUpdate" class="form-control add has-content" value=""
                                 id="DistrictDataUpdate"></select>
                             <label>Quận huyện</label>
                         </fieldset>
                         <fieldset class="form-group select-field not-vn">
                             <select name="WardDataUpdate" class="form-control add has-content" value=""
                                 id="WardDataUpdate"></select>
                             <label>Phường xã</label>
                         </fieldset>
                     </div>


                 </div>
                 <div class="checkbox">
                     <label class="c-input c-checkbox" style="padding-left: 20px;">
                         <input type="checkbox" id="address_default_address_1" name="IsDefault" value="">
                         <span class="c-indicator">Đặt là địa chỉ mặc định?</span>
                     </label>
                 </div>
                 <div class="btn-row">
                     <button class="btn-Cancel btn btn-lg btn-dark-address btn-outline article-readmore btn-close"
                         type="button"><span>Hủy</span></button>
                     <button class="btn btn-lg btn-primary btn-submit" id="updateAddress" type="submit"><span>Cập nhật
                             địa chỉ</span></button>
                 </div>
                 {{--  --}}
             </div>
         </form>
     </div>
 </div>



 @push('scripts')
     {{-- <script>
         $(document).ready(function(e) {
             /*Xem nhanh*/
             const xem_nhanh = $(".xem_nhanh");
             const modal = $("#quick-view-product");
             const btnClose = $(".close-window");
             xem_nhanh.click(function(e) {
                 // e.preventDefault();
                var slug = $(this).val();
             
                 if (localStorage.getItem('idFE')) {

                     modal.show();
                 } else {
                     window.location = "{{ route('loginViewFE') }}"
                 }
             });
             btnClose.click(function(e) {
                 // e.preventDefault();

                 modal.hide();
             });
             $(window).on("click", function(e) {
                 // e.preventDefault();

                 if ($(e.target).is("#quick-view-product")) {
                     modal.hide();
                 }
             });
             /*Thêm vào giỏ*/
             const btnCart = $(".btn-cart");
             const quickviewModal = $("#popup-cart");

             btnCart.click(function(e) {
                 e.preventDefault();
                 var slug = $(this).val();
                 $.ajax({
                     type: "GET",
                     url: "{{ route('viewQuick') }}",
                     data: {
                         book_slug: slug
                     },
                     dataType: "json",
                     success: function(response) {
                         $(".cart-popup-name>a").text(response.book.book_name);
                         $(".cart-popup-name>a").attr('title', response.book.book_name);
                         if (response.book.avatar == null) {
                             var image = "/images/default.jpg";
                         } else {
                             var image = `/images/book/${response.book.avatar}`;

                         }
                         $('.tbody-popup').append(` <div class="item-popup productid">
                         <div style="width: 20%" class="border height image_ text-left">
                             <div class="item-image">
                                 <a class="product-image" href="#" title="${response.book.book_name}">
                                     <img alt="${response.book.book_name}" src="${image}"
                                         width="90" /></a>
                             </div>
                         </div>
                         <div style="width: 36%" class="height text-left fix_info">
                             <div class="item-info">
                                 <p class="item-name">
                                     <a class="text3line textlinefix" href="#" title="${response.book.book_name}">${response.book.book_name}</a>
                                 </p>
                                 <span class="variant-title-popup"> </span><a href="javascript:;"
                                     class="remove-item-cart" title="Xóa">
                                     <i class="fa fa-close"></i>&nbsp;&nbsp;Bỏ sản phẩm</a>
                                 <p class="addpass" style="color: #fff; margin: 0px">1</p>
                             </div>
                         </div>
                         <div style="width: 15%" class="border height text-center">
                             <div class="item-price">
                                 <span class="price">${(response.book.price*0.8).toLocaleString('en-US')}₫</span>
                             </div>
                         </div>
                         <div style="width: 14%" class="border height text-center">
                             <div class="qty_h check_">
                                 <input class="variantID" type="hidden" name="variantId" value="" /><button
                                     class="num1 reduced items-count btn-minus" type="button">
                                     -</button><input type="text" maxlength="3" min="0" readonly=""
                                     class="input-text number-sidebar" id="qtyItem" name="Lines" size="4"
                                     value="1" /><button class="num2 increase items-count btn-plus" type="button">
                                     +
                                 </button>
                             </div>
                         </div>

                     </div>`);
                         console.log(response.book.book_name);
                     }
                 });
                 if (localStorage.getItem('idFE')) {

                     quickviewModal.show();
                     modal.hide();
                 } else {
                     window.location = "{{ route('loginViewFE') }}"
                 }

             });
             btnClose.click(function() {
                 quickviewModal.hide();
             });
             $(window).on("click", function(e) {
                 if ($(e.target).is("#popup-cart")) {
                     quickviewModal.hide();
                 }
             });

             //Địa chỉ
           




         });
     </script> --}}
 @endpush
 <!-- Modal -->
