@extends('frontend.layouts.app')
@section('title')
    | {{ $product->name }}
@endsection

@section('meta')
    @include('frontend.products.partials.seo')
@endsection


@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li ><a href="{{ route('frontend.products.index') }}">Sản phẩm</a></li>
                    <li class="active">{{ $product->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--blog-starts-->
    <div class="blog">
        <div class="container">

            <div class="about-bottom">
                <div class="col-md-6 about-left">
                    <img src="{{ Storage::disk('public')->url('img/product/' . $product->feature_image) }}" alt="" class="img-preview"/>
                </div>
                <div class="col-md-6 about-right" style="margin-top: 15px;">
                    <a>
                        <h1>{{ $product->name }}</h1>
                    </a>
                    <h5><strong>Giá:</strong><span style="color:red; margin-left: 1.5rem">Liên hệ</span></h5>
                    <h5><strong>Tính năng cơ bản</strong></h5>
                    <p>{{ $product->base_feature }}</p>
                    <a href="#contact-form" class="btn btn-primary">Liên hệ</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="blog-bottom">

                <div class="col-md-9 blog-left">

                    <div class="warpper">
                        <input class="radio" id="one" name="group" type="radio" checked>
                        <input class="radio" id="two" name="group" type="radio">
                        <!-- <input class="radio" id="three" name="group" type="radio"> -->
                        <input class="radio" id="four" name="group" type="radio">

                        <div class="tabs">
                            <label class="tab" id="one-tab" for="one">Nội dung</label>
                            <label class="tab" id="two-tab" for="two">Chi tiết tính năng</label>
                            <!-- <label class="tab" id="three-tab" for="three">Tài liệu</label> -->
                            <label class="tab" id="four-tab" for="four">Sản phẩm liên quan</label>

                        </div>
                        <div class="panels">
                            <div class="panel" id="one-panel">
                                <div id="product-content">
                                    {!! $product->content !!}
                                </div>
                                <button class="btn btn-info expand-button" id="expand-product-content">
                                    Đọc tiếp
                                </button>
                            </div>
                            <div class="panel" id="two-panel">
                                <div id="product-description">
                                    {!! $product->detail_feature !!}
                                </div>
                                <button class="btn btn-info expand-button" id="expand-product-description">
                                    Đọc tiếp
                                </button>

                            </div>
                            <!-- <div class="panel" id="three-panel">
                          <div class="panel-title">Note on Prerequisites</div>
                          <p>We recommend that you complete Learn HTML before learning CSS.</p>
                        </div> -->
                            <div class="panel" id="four-panel">
                                <div class="post heading">
                                    <div class="post-top">

                                        @foreach($related_products as $r_product)
                                            <div class="col-md-4 post-left">
                                                <a href="{{ route('frontend.products.detail', ['slug' => $r_product->slug ]) }}"><img class="img-blog-thumbnail "
                                                                                   src="{{ Storage::disk('public')->url('img/product/' . $r_product->feature_image) }}" alt=""></a>
                                                <a href="{{ route('frontend.products.detail', ['slug' => $r_product->slug ]) }}">
                                                    <h6>{{ $r_product->name }}</h6>
                                                </a>
                                                <p>{{ Illuminate\Support\Str::limit($r_product->base_feature, 100, '...') }}</p>
                                            </div>
                                        @endforeach

                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 blog-left">
                    @include('frontend.products.partials.contact')
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!--blog-end-->
@endsection

@section('after-css')
<style>

    #product-description, #product-content {
        position: relative;
        max-height: 300px;
        overflow: hidden;
        transition: max-height 1s ease;
    }
    #product-description.expanded, #product-content.expanded {
         max-height: 100%;
     }

    #product-description:not(.expanded)::after, #product-content:not(.expanded)::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
    }
</style>
@endsection

@section('after-js')
<script>
    $('#expand-product-description').on('click', function(){
        var productDescription = $('#product-description');
        productDescription.toggleClass('expanded');

        if (productDescription.hasClass('expanded')) {
            $(this).html('Đóng');
        } else {
            $(this).html('Đọc tiếp');
        }
    });
    $('#expand-product-content').on('click', function(){
        var productContent = $('#product-content');
        productContent.toggleClass('expanded');

        if (productContent.hasClass('expanded')) {
            $(this).html('Đóng');
        } else {
            $(this).html('Đọc tiếp');
        }
    });
</script>
@endsection
