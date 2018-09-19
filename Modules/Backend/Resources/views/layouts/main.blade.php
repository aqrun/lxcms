<!DOCTYPE html>
<html>
<head>
  @include('backend::partials._html_header')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('backend::partials._header')
@include('backend::partials._sidebar')

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

          @include('backend::partials._message')

          @yield('content')

        </div>
      </div>

    </section>
    <section>
      <script data-exec-on-popstate>@yield('pjax-js')</script>
    </section>
  </div>
  <!-- /.content-wrapper -->

  @include('backend::partials._footer')

  @include('backend::partials._scripts')

</div>
<!-- ./wrapper -->

<div id="react_container"></div>
</body>
</html>
