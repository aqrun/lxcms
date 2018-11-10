@extends('backend::layouts.main')

@section('title')
    @lang('backend::admin.admin_users_create')
@stop
@section('description')
    @lang('backend::admin.admin_users_view_description')
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('backend::common.home')</a></li>
        <li>@lang('backend::admin.admin')</li>
        <li class="active">@lang('backend::admin.admin_users_create')</li>
    </ol>
@endsection

@section('content')
    <div class="admin-user-content">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ \Backend::baseUrl('admin-users') }}" class="btn btn-default btn-md">
                            <i class="fa fa-chevron-left"></i>&nbsp;@lang('backend::common.back_to_list')</a>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ \Backend::baseUrl('admin-users') }}" class="btn btn-primary btn-md">
                            <i class="fa fa-edit"></i>&nbsp;@lang('backend::common.save')
                        </a>
                    </div>
                </div>
            </div>
            <div class="box-body">

                <form action="{{ route('admin-users.store') }}" method="POST" class="form form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-md-2 control-label">@lang('backend::common.username')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control"
                                   value="{{ old('username', $user->username) }}"
                                   name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.name')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.email')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.gender')</label>
                        <div class="col-md-2">
                            <label for="">
                                <input type="radio" name="gender" value="1">@lang('backend::common.male')
                            </label>
                            <label for=""><input type="radio" name="gender" value="2"> @lang('backend::common.female')</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>

    <script>
        g.page_admin_users_create = true;
    </script>
@endsection

