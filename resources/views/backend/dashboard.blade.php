@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="text-center"><h3 class="box-title ">Chào mừng bạn đến với hệ thống do <span style="color:#00feff; font-weight: 700">Zeroes 2 Heroes </span> Team phát triển</h3></div>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <h4></h4>
        </div><!-- /.box-body -->
    </div><!--box box-info-->
@endsection
