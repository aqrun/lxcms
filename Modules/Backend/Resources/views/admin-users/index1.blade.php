@extends('backend::layouts.main')

@section('title')
    @lang('backend::admin.admin_users')
@stop
@section('description')
    @lang('backend::admin.admin_users_list_desc')
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('backend::common.home')</a></li>
        <li>@lang('backend::admin.admin')</li>
        <li class="active">@lang('backend::admin.admin_users')</li>
    </ol>
@endsection

@section('content')


            {{-- TODO: add alert message --}}

            <div class="box">
                <div class="box-header with-border">
                    <div class="pull-left">
                        <a class="btn btn-sm btn-primary grid-refresh"><i class="fa fa-refresh"></i> 刷新</a>
                        <a class="btn btn-sm btn-dropbox btn-filter"><i class="fa fa-filter"></i> 筛选</a>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group pull-right" style="margin-right: 10px;">
                            <a href="/zh/backend/admin-users/create" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;新建</a>
                        </div>
                    </div>
                </div>
                <div class="box-header with-border" id="filter-box" style="display: none;">
                    <form action="" class="form-horizontal">
                        <div class="box-body">
                            <div class="fields-group">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">ID</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="btn btn-sm btn-info pull-left submit">
                                    <i class="fa fa-search"></i>应用
                                </div>
                                <a href="" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-undo"></i>重置</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive no-padding1">

                    {!! $html->table() !!}

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

    <script>
        g.page_admin_users_test_index = true;
    </script>
@endsection

@section('page_script')
    {!! $html->scripts() !!}
@endsection

