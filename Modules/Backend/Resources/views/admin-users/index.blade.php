@extends('backend::layouts.main')

@section('title', 'Admin Users')
@section('description', 'Backend users management')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin users</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- TODO: add alert message --}}

            <div class="box">
                {{--box header start--}}
                <div class="box-header with-border">
                    <div class="pull-left">
                        <a class="btn btn-sm btn-primary grid-refresh">
                            <i class="fa fa-refresh"></i>  {{ __('Refresh') }}
                        </a>
                        <a class="btn btn-sm btn-dropbox btn-filter">
                            <i class="fa fa-filter"></i>  {{ __('Filter') }}
                        </a>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group pull-right" style="margin-right:10px">
                            <a href="{{ \Backend::baseUrl('/admin-users/create') }}" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;{{ __('New') }}
                            </a>
                        </div>
                    </div>
                </div>
                {{--box header end--}}

                @include('backend::admin-users._index_filter')

                <div class="box-body table-responsive no-padding1">

                    <table class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
                        <tr class="th_search_w">
                            <th></th>
                            <th></th>
                            <th>
                                <input type="text" class="form-control" name="username" placeholder="Search username">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="name" placeholder="Search name">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="email" placeholder="Search email">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="weight" placeholder="Search weight">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="status" placeholder="Search status">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="created_at" placeholder="Search created_at">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="updated_at" placeholder="Search updated_at">
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>@lang('admin.actions')</th>
                        </tr>
                        </thead>
                    </table>

                </div>


            </div>

        </div>
    </div>

    @component('backend::components.modal', ['type'=>'danger'])
        @slot('title')
            删除用户
        @endslot

    @endcomponent

    <script>
        g.page_admin_users_list = true;
    </script>
@endsection

