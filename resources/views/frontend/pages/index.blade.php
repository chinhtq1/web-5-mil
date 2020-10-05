@extends('frontend.layouts.app')

@section('banner')
    @include('frontend.includes.partials.banner')
@endsection

@section('main-content')
    <div class="blog">

        <div class="breadcrumbs" style="margin-bottom: 2rem">
            <div class="container">
                <div class="breadcrumbs-main">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                        <li class="active">{{ $page->title }}</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="contact-top heading">
                <h3 style="color: rgba(247, 114, 51, 1) !important;">{{ $page->title }}</h3>
            </div>
            <br>
            {!! $page->description  !!}
        </div>

    </div>
@endsection
