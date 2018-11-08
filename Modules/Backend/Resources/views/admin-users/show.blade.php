@extends('backend::layouts.main')

@section('title', __('Admin Users View'))
@section('description', __('Backend users detail'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('Home')</a></li>
        <li class="active">@lang('Admin users')</li>
    </ol>
@endsection

@section('content')
    <div class="admin-user-content">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ \Backend::baseUrl('admin-users') }}" class="btn btn-default btn-md">
                            <i class="fa fa-chevron-left"></i>&nbsp;@lang('Back')</a>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ \Backend::baseUrl('admin-users/edit') }}" class="btn btn-primary btn-md">
                            <i class="fa fa-edit"></i>&nbsp;@lang('Edit')
                        </a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-3 admin-user-info">
                        <div class="media">
                            <div align="center">
                                <img class="thumbnail img-responsive" src="{{ $adminUser->avatar }}"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">

                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Username')</div>
                            <div class="col-md-6">{{ $adminUser->username }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Name')</div>
                            <div class="col-md-6">{{ $adminUser->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Email')</div>
                            <div class="col-md-6">{{ $adminUser->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Mobile')</div>
                            <div class="col-md-6">{{ $adminUser->mobile }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Weight')</div>
                            <div class="col-md-6">{{ $adminUser->weight }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('Status')</div>
                            <div class="col-md-6">{{ $adminUser->status }}</div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script>
        g.page_admin_users_show = true;
    </script>
@endsection

