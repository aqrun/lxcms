

<script src="/vendor/AdminLTE-2.4.5/plugins/axios/dist/axios.min.js"></script>

<script src="/vendor/AdminLTE-2.4.5/bower_components/react/umd/react.development.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/react-dom/umd/react-dom.development.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/react-table/react-table.js"></script>

<script src="/vendor/AdminLTE-2.4.5/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/toastr/build/toastr.min.js"></script>
<script src="/vendor/AdminLTE-2.4.5/bower_components/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
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

<script src="/static/backend/dist/app.{{ \Backend::assetHash() }}.js"></script>
@yield('page_script')
