
@extends('backend.layouts.main')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <style>
                .title {
                    font-size: 50px;
                    color: #636b6f;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    display: block;
                    text-align: center;
                    margin: 20px 0 10px 0px;
                }

                .links {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .links > a {
                    color: #636b6f;
                    padding: 0 25px;
                    font-size: 12px;
                    font-weight: 600;
                    letter-spacing: .1rem;
                    text-decoration: none;
                    text-transform: uppercase;
                }
            </style>

            <div class="title">LXCMS-Backend</div>
            <div class="links">
                <a href="#" target="_blank">Github</a>
                <a href="#"  target="_blank">Documentation</a>
                <a href="#"  target="_blank">Demo</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Environment</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-weight="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" type="button" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @foreach($envs as $env)
                                <tr>
                                    <td width="120px">{{ $env['name'] }}</td>
                                    <td>{{ $env['value'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Available extensions</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-weight="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" type="button" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        @foreach($extensions as $extension)
                            <li class="item">
                                <div class="product-img">
                                    <i class="fa fa-{{$extension['icon']}} fa-2x ext-icon"></i>
                                </div>
                                <div class="product-info">
                                    <a href="{{ $extension['link'] }}" target="_blank" class="product-title">
                                        {{ $extension['name'] }}
                                    </a>
                                    @if($extension['installed'])
                                        <span class="pull-right installed"><i class="fa fa-check"></i></span>
                                    @endif
                                </div>
                            </li>
                    @endforeach

                    <!-- /.item -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Dependencies</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-weight="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" type="button" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @foreach($dependencies as $dependency => $version)
                                <tr>
                                    <td width="240px">{{ $dependency }}</td>
                                    <td><span class="label label-primary">{{ $version }}</span></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>

    </div>



@stop