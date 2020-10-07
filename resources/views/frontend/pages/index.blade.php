@extends('frontend.layouts.app')
@section('title')
    | {{ $page->title }}
@endsection
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li class="active">{{ $page->title }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="blog-top heading">
                <h3>{{ $page->title }}</h3>
            </div>
            <br>
            {!! $page->description  !!}
        </div>
    </div>
@endsection
