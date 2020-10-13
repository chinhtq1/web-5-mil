@extends('frontend.layouts.app')
@section('title')
   | {{ $blog->name }}
@endsection

@section('meta')
    @include('frontend.blogs.partials.seo')
@endsection

@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li ><a href="{{ route('frontend.blogs.index') }}">Tin tức</a></li>
                    <li class="active">{{ $blog->name }}</li>
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
                    <img class="img-single-blog" src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                </div>
                <div class="single-bottom">
                    <h1>{{ $blog->name }}</h1>
                    <p class="sn">{{ $blog->publish_datetime }}</p>

                    <hr>

                    <div style="font-weight: bold">
                        {!! $blog->description !!}
                    </div>
                    <div class="blog-content" style="margin-top: 3rem;">
                        {!! $blog->content !!}
                    </div>
                </div>
                <div class="comments heading">
                    <div class="post heading">
                        <h4 style="color: tomato;">{{ __('Bài viết liên quan') }}</h4>
                        <div class="post-top">

                            @foreach($related_blogs as $blog)
                                <div class="col-md-4 post-left">
                                    <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}"><img class="img-related-blog-thumbnail " src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt=""></a>
                                    <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}"><h6>{{  $blog->name }}</h6></a>
                                    <p class="fz-80">{{ Illuminate\Support\Str::limit($blog->description, 100, '...') }}</p>
                                </div>
                            @endforeach

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Menu -->
            <div class="col-md-3 blog-left">
                @include('frontend.blogs.partials.categories-menu')
            </div>
        </div>
    </div>
    <!--single-end-->
@endsection
