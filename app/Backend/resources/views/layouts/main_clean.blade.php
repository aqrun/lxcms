<!DOCTYPE html>
<html>
<head>
  @include('b::partials._html_header')
</head>
<body class="@yield('body_class')">

@yield('content')

@include('b::partials._scripts')
</body>
</html>
