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

    <script type="text/template" id="tpl_action">
        <div class="btn-group btn_dropdownw">
            <a type="button" class="btn btn-default btn-sm btn_edit"
               href="" target="_blank">View</a>
            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="" class="btn_edit" target="_blank">Edit</a></li>
                <li><a href=""
                       data-id="[%=id%]" class="btn_delete">Delete</a></li>
            </ul>
        </div>
    </script>

    @component('backend::components.modal', ['type'=>'danger'])
        @slot('title')
            删除用户
        @endslot

    @endcomponent

    <script>
        g.page_admin_users_list = true;
    </script>
@endsection

