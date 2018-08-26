<!DOCTYPE html>
<html>
<head>
  @include('backend.partials._html_header')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('backend.partials._header')
@include('backend.partials._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          @include('backend.partials._message')
          @yield('content')

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('backend.partials._footer')

  @include('backend.partials._scripts')

</div>
<!-- ./wrapper -->


</body>
</html>
