<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/raphael/raphael.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/morris.js/morris.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/moment/min/moment.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/vendor/AdminLTE-2.4.5/dist/js/adminlte.min.js"></script>

@yield('script')

<script src="{{ asset('js/app.js') }}?v=0.2"></script>

@yield('page_script')