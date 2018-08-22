<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'LXCMS')</title>
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/morris.js/morris.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@yield('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">