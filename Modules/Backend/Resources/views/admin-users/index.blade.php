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

                {{--filter start--}}
                <div class="box-header with-border" id="filter-box">
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
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="btn btn-sm btn-info pull-left submit"><i class="fa fa-search"></i> {{ __('Search') }}</div>
                                <a href="" class="btn btn-sm btn-default" style="margin-left:10px;"><i class="fa fa-undo"></i> {{__('Reset')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
                {{--filter end--}}

                <div class="box-body table-responsive no-padding1">

                    @include('backend::admin-users.test_table')

                </div>


            </div>

        </div>
    </div>
@endsection

