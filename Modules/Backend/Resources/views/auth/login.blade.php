
@extends('backend::layouts.main_clean')

@section('title', '登录')

@section('style')
  <!-- iCheck -->
  <link rel="stylesheet" href="/vendor/AdminLTE-2.4.5/plugins/iCheck/square/blue.css">
@stop

@section('body_class', 'hold-transition login-page')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="{{ \Backend::baseUrl() }}"><b>LX</b>CMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    @include('backend::partials._errors')

    <form action="{{ \Backend::baseUrl('/login') }}" method="post">
      @csrf
      <div class="form-group has-feedback{{ $errors->first('username', ' has-error') }}">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback{{ $errors->first('password', ' has-error') }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop

@section('script')
<!-- iCheck -->
<script src="/vendor/AdminLTE-2.4.5/plugins/iCheck/icheck.min.js?v=0.23"></script>
@stop

@section('page_script')
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
@stop

