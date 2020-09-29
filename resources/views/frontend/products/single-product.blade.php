@extends('frontend.layouts.app')

@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li ><a href="{{ route('frontend.products.index') }}">Các sản phẩm</a></li>
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
                        <h4>{{ $product->name }}</h4>
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
                            <label class="tab" id="one-tab" for="one">Tổng quan</label>
                            <label class="tab" id="two-tab" for="two">Chi tiết tính năng</label>
                            <!-- <label class="tab" id="three-tab" for="three">Tài liệu</label> -->
                            <label class="tab" id="four-tab" for="four">Sản phẩm liên quan</label>

                        </div>
                        <div class="panels">
                            <div class="panel" id="one-panel">
                                {!! $product->content !!}
                            </div>
                            <div class="panel" id="two-panel">
                                {!! $product->detail_feature !!}

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
                                                <p>{{ $r_product->base_feature }}</p>
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

                    <div class="taituychon">
                        <!-- tải báo giá -->
                        <!-- tải khóa cứng -->
                    </div>
                    <div class="them1">
                        <a href="">Liên hệ</a>
                    </div>
                    <div class="taituychon">
                        <div class="kdmbac">
                            <div class="muoi">
                                <p>Đinh Trần Tuấn <span><a href="tel:085 999 9698" rel="nofollow"> 085 999 9698</a></span></p>
                            </div>
                        </div>

                    </div>
                    <div class="them1">
                        <a href="">Liên hệ hỗ trợ kỹ thuật</a>
                    </div>
                    <div class="taituychon">
                        <div class="kdmbac">
                            <div class="muoi">
                                <p>Huỳnh Thái <span><a href="tel:0939 261 463" rel="nofollow"> 0939 261 463</a></span></p>

                            </div>
                        </div>

                    </div>
                    <div class="them1">
                        <a href="">Liên hệ kinh doanh Miền Nam</a>
                    </div>
                    <div class="taituychon">
                        <div class="kdmbac">
                            <div class="muoi">
                                <p>Huỳnh Thái <span><a href="tel:0939 261 463" rel="nofollow"> 0939 261 463</a></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="taituychon">
                        <div class="kdmbac">
                            <div class="muoi">
                                <p>Hoàng Yến <span><a href="tel:0934 045 088" rel="nofollow"> 0934 045 088</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!--blog-end-->
@endsection
