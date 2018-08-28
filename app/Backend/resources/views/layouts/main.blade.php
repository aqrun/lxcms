<!DOCTYPE html>
<html>
<head>
  @include('b::partials._html_header')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('b::partials._header')
@include('b::partials._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="pjax-container" style="min-height:800px;">

    <section class="content-header">
      <h1>@yield('title', 'Home')<small>@yield('description', 'more description')</small>
      </h1>
      @yield('breadcrumb')
    </section>

    <section class="content">

      <div class="row">
        <div class="col-md-12">

          @include('b::partials._message')

          @yield('content')

        </div>
      </div>

    </section>
    <section>
      <script data-exec-on-popstate>@yield('pjax-js')</script>
    </section>
  </div>
  <!-- /.content-wrapper -->

  @include('b::partials._footer')

  @include('b::partials._scripts')

</div>
<!-- ./wrapper -->


</body>
</html>
