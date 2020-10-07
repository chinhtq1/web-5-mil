@extends('frontend.layouts.app')
@section('title')
    | {{ $event->name }}
@endsection
@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li>{{ appSettings()->event_title ? appSettings()->event_title : 'Sự kiện' }}</li>
                    <li class="active">{{ $event->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--single-starts-->
    <div class="single">
        <div class="container">
            <div class="col-md-9 blog-left">
                <div class="single-top">
                    <img class="img-single-blog" src="{{ Storage::disk('public')->url('img/event/' . $event->featured_image) }}" alt="" />
                </div>
                <div class="single-bottom">
                    <h4>{{ $event->name }}</h4>
                    <p class="sn">{{ $event->publish_datetime }}</p>
                    <hr>
                    <p>
                        <strong>Ngày bắt đầu: </strong>{{ $event->start_datetime->format('d/m/Y') }}
                        <span> - </span>
                        <strong>Ngày kết thúc: </strong>{{ $event->end_datetime->format('d/m/Y') }}
                    </p>
                    <div class="blog-content" style="margin-top: 3rem;">
                        {!! $event->content !!}
                    </div>
                </div>
            </div>


            <!-- Menu -->
            <div class="col-md-3 blog-left">
                @include('frontend.events.partials.categories-menu')
            </div>
        </div>
    </div>
    <!--single-end-->
@endsection
