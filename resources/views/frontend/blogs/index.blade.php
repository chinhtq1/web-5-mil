@extends('frontend.layouts.app')
@section('title')
     @isset($active_category) | {{ $active_category->name }} @else  {{ appSettings()->blog_title ? '| '.appSettings()->blog_title : '' }}  @endisset
@endsection

@section('meta')
    @include('frontend.blogs.partials.seo-index')
@endsection

@section('after-css')
    <link rel="stylesheet" href="{{ asset('css/frontend/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
@endsection

@section('main-content')

    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                        <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    @isset($active_category)
                        <li><a href="{{ route('frontend.blogs.index') }}">Tin tức</a></li>
                        <li class="active">{{ $active_category->name }}</li>
                    @else
                        <li class="active">Tin tức</li>
                    @endisset
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->

    <!--blog-starts-->
    <div class="blog">
        <div class="container">
            <div class="blog-top heading">
                @isset($active_category)
                    <h1>{{ $active_category->name }}</h1>
                    @else
                    <h1>Tin tức</h1>
                @endisset

                    @if(count($blogs)==0)<h4>Không có bài viết</h4> @endif
            </div>
            <div class="blog-bottom">
                <div class="col-md-3 blog-left">
                    @include('frontend.blogs.partials.categories-menu')
                </div>

                <!-- LIST BLOG -->
                <div class="col-md-9 blog-left">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-md-6 col-lg-4 blog-one">
                                <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                                    <img class="img-blog-thumbnail img-blog-border" src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                                </a>
                                <div class="blog-btm">
                                    <div class="blog-title">
                                        <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                                            <h2>{{ Illuminate\Support\Str::limit($blog->name, 35, '...') }}</h2>
                                        </a>
                                    </div>
                                    <p>{{ $blog->publish_datetime }}</p>

                                    <div class="blog-description">
                                        <p class="one">{{  Illuminate\Support\Str::limit($blog->description, 100, '...')}}</p>
                                    </div>
                                    <div class="b-btn">
                                        <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">Xem tiếp</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END LIST BLOG -->

                <div class="clearfix"></div>
            </div>

            <div>
                <div class="col-md-3 blog-left">
                </div>
                <div>
                    {{ $blogs->links() }}
                </div>

            </div>
        </div>
    </div>
    <!--blog-end-->
@endsection

@section('after-js')
    <script src="{{ asset('js/frontend/modernizr.custom.97074.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.chocolat.js') }}"></script>
    <!--light-box-files-->
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('.gallery-grids a').Chocolat();
        });
    </script>
@endsection
