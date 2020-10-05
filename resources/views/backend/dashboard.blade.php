@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info" style="height: 80vh">
        <div class="box-body">
            <div class="text-center"><h3 class="box-title ">Chào mừng bạn đến với hệ thống do <span class="text-bold text-danger">Zero2Hero </span> Team phát triển</h3></div>

            <div class="text-center" style="margin-top: 5rem">
                <img src="{{ asset('img/backend/zeroes2heroes.png') }}" alt="">
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-info-->
@endsection
