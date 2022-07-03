<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script src="{{ asset('BackEnd/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('BackEnd/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('BackEnd/plugins/chart.js/Chart.min.js')}}"></script> --}}
<!-- Sparkline -->
{{-- <script src="{{ asset('BackEnd/plugins/sparklines/sparkline.js')}}"></script> --}}
<!-- JQVMap -->
<script src="{{ asset('BackEnd/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('BackEnd/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('BackEnd/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('BackEnd/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('BackEnd/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('BackEnd/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('BackEnd/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('BackEnd/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('BackEnd/dist/js/adminlte.js') }}"></script>
<!--DataTable-->
<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>




<!--Upload Avatar-->
<script src="{{ asset('assets/upload/js/avatar.js') }}"></script>
<!--Upload Avatar-->
<!--Money-->
<script src="{{ asset('assets/money/js/simple.money.format.js') }}"></script>
<script>
    $(".money").simpleMoneyFormat();
</script>
<!--Money-->

@yield('js')




<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('BackEnd/dist/js/pages/dashboard.js')}}"></script> --}}
