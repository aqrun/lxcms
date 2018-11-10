@extends('backend::layouts.main')

@section('title')
    @lang('backend::admin.admin_users_view')
@stop
@section('description')
    @lang('backend::admin.description')
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('backend::common.home')</a></li>
        <li>@lang('backend::admin.admin')</li>
        <li class="active">@lang('backend::admin.admin_users_view')</li>
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
                        <a href="{{ \Backend::baseUrl('admin-users/create') }}" class="btn btn-success btn-md">
                            <i class="fa fa-edit"></i>&nbsp;@lang('backend::common.create')
                        </a>
                        <a href="{{ \Backend::baseUrl('admin-users/edit') }}" class="btn btn-primary btn-md">
                            <i class="fa fa-edit"></i>&nbsp;@lang('backend::common.edit')
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
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.username')</div>
                            <div class="col-md-6">{{ $adminUser->username }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.name')</div>
                            <div class="col-md-6">{{ $adminUser->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.email')</div>
                            <div class="col-md-6">{{ $adminUser->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.mobile')</div>
                            <div class="col-md-6">{{ $adminUser->mobile }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.weight')</div>
                            <div class="col-md-6">{{ $adminUser->weight }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.status')</div>
                            <div class="col-md-6">{{ $adminUser->status }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.created_at')</div>
                            <div class="col-md-6">{{ $adminUser->created_at->setTimezone(\Backend::timezone())->toDateTimeString() }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 text-right text-bold">@lang('backend::common.updated_at')</div>
                            <div class="col-md-6">{{ $adminUser->updated_at->setTimezone(\Backend::timezone())->toDateTimeString() }}</div>
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

