<!DOCTYPE html>
<html>
<head>
  @include('backend::partials._html_header')
</head>
<body class="@yield('body_class')">

@yield('content')

@include('backend::partials._scripts')
</body>
</html>
