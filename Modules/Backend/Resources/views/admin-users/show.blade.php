@extends('backend::layouts.main')

@section('title', 'Admin Users View')
@section('description', 'Backend users detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin users</li>
    </ol>
@endsection

@section('content')
    <div class="row admin-user-content">
        <div class="col-md-3 admin-user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{ $adminUser->avatar }}"/>
                        </div>
                        <div class="media-body">
                            <hr>
                            <h4><strong>{{ __('Introduction') }}</strong></h4>
                            <p>{{ $adminUser->introduction??'Empty introduction' }}</p>
                            <hr/>
                            <h4><strong>{{ __('Registered At') }}</strong></h4>
                            <p>{{ $adminUser->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px">
                            {{ $adminUser->name }} <small>{{ $adminUser->email }}</small>
                        </h1>
                    </span>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    empty ^_^
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
        g.page_admin_users_show = true;
    </script>
@endsection

