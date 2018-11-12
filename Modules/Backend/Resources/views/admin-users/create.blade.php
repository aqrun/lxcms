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
        <form action="{{ route('admin-users.store') }}" method="POST" class="form form-horizontal">
            @csrf
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ \Backend::baseUrl('admin-users') }}" class="btn btn-default btn-md">
                                <i class="fa fa-chevron-left"></i>&nbsp;@lang('backend::common.back_to_list')</a>
                        </div>
                        <div class="col-md-4 text-right">
                            <button href="{{ \Backend::baseUrl('admin-users') }}"
                                    type="submit"
                                    class="btn btn-primary btn-md">
                                <i class="fa fa-edit"></i>&nbsp;@lang('backend::common.save')
                            </button>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                        <div class="form-group required">
                            <label for="username" class="col-md-2 control-label">@lang('backend::common.username')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control"
                                       value="{{ old('username', $user->username) }}"
                                       name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.mobile')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $user->mobile) }}">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.name')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.email')</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.password')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="password" value="{{ old('password', $user->password) }}" required>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.password_confirmation')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="password_confirmation"
                                       value="{{ old('password_confirmation', $user->password_confirmation) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.avatar')</label>
                            <div class="col-md-2">
                                <div>
                                    <input type="file" class="form-control ipt_avatar"
                                           name="avatar" value="{{ old('avatar', $user->avatar) }}">
                                </div>
                                <div class="avatar-preview">
                                    <img src="/vendor/AdminLTE-2.4.5/dist/img/user2-160x160.jpg" alt="" id="img_avatar_preview">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.gender')</label>
                            <div class="col-md-2" style="width:130px;">
                                <select name="gender" id="" class="form-control">
                                    <option value="">--@lang('backend::common.choose')--</option>
                                    <option value="1" {{ old('gender', $user->gender)==1?'selected':'' }}>@lang('backend::common.male')</option>
                                    <option value="2" {{ old('gender', $user->gender)==2?'selected':'' }}>@lang('backend::common.female')</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.birthday')</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control datetimepicker"
                                       name="birthday" value="{{ old('birthday', $user->birthday) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.timezone')</label>
                            <div class="col-md-2">
                                <select name="timezone" id="timezone" class="form-control">
                                    <option value="">--@lang('backend::common.choose')--</option>
                                    @foreach($timezoneList as $title=>$val)
                                        <option value="{{ $val }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.weight')</label>
                            <div class="col-md-2" style="width:100px">
                                <input type="text" class="form-control" name="weight" value="{{ old('weight', $user->weight) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">@lang('backend::common.status')</label>
                            <div class="col-md-2" style="width:130px;">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status', $user->status)==1?'selected':'' }}>@lang('backend::common.active')</option>
                                    <option value="0" {{ old('status', $user->status)==2?'selected':'' }}>@lang('backend::common.lock')</option>
                                </select>
                            </div>
                        </div>


                </div>
            </div>
        </form>
    </div>

    <script>
        g.page_admin_users_create = true;
    </script>
@endsection

