@extends('frontend.layouts.app')

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
                        <li><a href="{{ route('frontend.blogs.index') }}">Sản phẩm</a></li>
                        <li class="active">{{ $active_category->name }}</li>
                    @else
                        <li class="active">Tất cả sản phẩm</li>
                    @endisset
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->

    <!--product-starts-->
    <div class="blog">
        <div class="container">
            <div class="blog-top heading">
                @isset($active_category)
                    <h3>{{ $active_category->name }}</h3>
                @else
                    <h3>Tất cả sản phẩm</h3>
                @endisset
            </div>
            <div class="blog-bottom">
                <div class="col-md-3 blog-left">
                    @include('frontend.products.partials.categories-menu')
                </div>

                <!-- LIST BLOG -->
                <div class="col-md-9 blog-left">
                    @foreach($products->chunk(3) as $chunk_product)
                        <div class="row">
                            @foreach($chunk_product as $product)
                                <div class="col-md-4 blog-one">
                                    <div class="product-item">
                                        <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}" title="">
                                            <img class="product-image" src="{{ Storage::disk('public')->url('img/product/' . $product->feature_image) }}" alt="" class="img-responsive">
                                        </a>
                                        <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}">
                                            <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}">
                                                <h4 class="product-title">{{ $product->name }}</h4>
                                            </a>
                                        </a>
                                        <div class="wrap-text">
                                            <p class="content">{{ $product->base_feature }}</p><p><a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}" class="product-redirect"> [Xem tiếp ...]</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <!-- END LIST BLOG -->
                <div class="clearfix"></div>
            </div>

            <div>
                <div class="col-md-3 blog-left">
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--product-end-->
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
