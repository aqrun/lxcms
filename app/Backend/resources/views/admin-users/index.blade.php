@extends('b::layouts.main')

@section('title', 'Admin Users')
@section('description', 'Backend users management')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin users</li>
    </ol>
@endsection

@section('pjax-js')
    {{ \Backend::includePjaxScript('admin-users/script.js') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            admin users list
        </div>
    </div>
@endsection

