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
    <div class="row">
        <div class="col-md-12">

            {{-- TODO: add alert message --}}

            <div id="box_container"></div>

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

