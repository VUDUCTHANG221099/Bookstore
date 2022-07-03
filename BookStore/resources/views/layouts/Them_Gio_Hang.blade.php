<style>
    #popup-cart {
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
<!-- Thêm vào giỏ -->

<div id="popup-cart" class="" role="dialog">
    <div id="popup-cart-desktop" class="clearfix">
       
        <div id="ThemGioHang"></div>
        <div class="wrap_popup">

            <a title="Close" class="close-window" href="javascript:;"><i class="fa fa-times"></i></a>
        </div>
    </div>

</div>
{{-- @include('layouts.sub_them_gio_hang') --}}
