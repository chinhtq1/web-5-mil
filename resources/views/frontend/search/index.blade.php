@extends('frontend.layouts.app')

@section('main-content')
    <!--starts-welcome-->
    @if(count($blogs) != 0)
        <div class="">
        <div class="container">
            <div class="">
                <h1 class="">Sản phẩm</h1>
            </div>
            <div class="row">
                @forelse($blogs as $blog)
                    <div class="col-md-6 col-lg-3 blog-one">
                        <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                            <img class="img-blog-thumbnail img-blog-border"
                                 src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt=""/>
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

                @empty
                    <div class="text-center"><h4>Không tìm thấy bài viết</h4></div>
                @endforelse
            </div>

        </div>
    </div>
    @endif

    @if(count($products) != 0)
        <div class="">
        <div class="container">
            <div class="">
                <h1 class="">Sản phẩm</h1>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-3 blog-one">
                        <div class="product-item">
                            <div class="text-center" style="display: block; width: 100%">
                                <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}"
                                   title="">
                                    <img class="product-image"
                                         src="{{ Storage::disk('public')->url('img/product/' . $product->feature_image) }}"
                                         alt="{{ $product->name }}">
                                </a>
                            </div>

                            <div class="blog-title">
                                <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}">
                                    <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}">
                                        <h4 class="product-title">{{ Illuminate\Support\Str::limit($product->name, 30, '...') }}</h4>
                                    </a>
                                </a>
                            </div>

                            <div class="wrap-text">
                                <p class="content blog-description">{{ Illuminate\Support\Str::limit($product->base_feature, 100, '...') }}</p>
                                <p><a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}"
                                      class="product-redirect"> [Xem tiếp ...]</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if(count($documents) != 0)
        <div class="">
            <div class="container">
                <div class="">
                    <h1 class="">Tài liệu</h1>
                </div>
                <div class="row">
                    @foreach($documents as $document)
                        <div class="single-youtube-channel">
                            <img src="{{ asset(config('common.file-type')[$document->type]) }}" style="width: 30px; height: 30px; margin-right: 2rem;"  alt="{{ $document->description }}"/>
                            <a href="{{ Storage::disk('public')->url('img/document/' . $document->file) }}">
                                {{ Illuminate\Support\Str::limit($document->name, 96, "...") }}
                            </a>
                            <a style="float: right" href="javascript:void(0)" class="download-file"
                               target="_blank"
                               data-file-url="{{ Storage::disk('public')->url('img/document/' . $document->file) }}"
                               data-file-name="{{ $document->file }}">
                                <i class="fa fa-download" aria-hidden="true"></i>  Tải về</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($documents) == 0 && count($products) ==0 && count($documents) == 0)
        <div class="text-center">
            <h3>Không có dữ liệu</h3>
        </div>
    @endif

    <!--news-end-->
    <!--product-starts-->
    <!--	<div class="product" id="product">-->
    <!--		<div class="container">-->
    <!--			<div class="product-top">-->
    <!--				<div class="col-md-4 product-left heading">-->
    <!--					<h3>New Arrivals</h3>-->
    <!--					<ul>-->
    <!--						<li><a href="#">Maecenas suscipit non eros vel consequat</a></li>-->
    <!--						<li><a href="#">Suspendisse ac nunc nec dui imperdiet</a></li>-->
    <!--						<li><a href="#">Fusce consectetur tellus sed commodo</a></li>-->
    <!--						<li><a href="#">Pellentesque egestas dolor vel sapien</a></li>-->
    <!--						<li><a href="#">Cras a ipsum id nisl dignissim pharetra</a></li>-->
    <!--						<li><a href="#">Nulla sodales neque et risus imperdiet</a></li>-->
    <!--					</ul>-->
    <!--				</div>-->
    <!--				<div class="col-md-8 product-right heading">-->
    <!--					<h3>New Products</h3>-->
    <!--					<div class="prdt">-->
    <!--						<div class="col-md-6 prdt-left">-->
    <!--							<a href="single.html"><img src="{{ asset('img/frontend/p-1.jpg')}}" alt="" /></a>-->
    <!--							<a href="single.html"><h4>Proin euismod a mi non</h4></a>-->
    <!--							<p>Fusce lacinia metus eget sapien ullamcorper accumsan. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>-->
    <!--						</div>-->
    <!--						<div class="col-md-6 prdt-left">-->
    <!--							<a href="single.html"><img src="{{ asset('img/frontend/p-1.jpg')}}" alt="" /></a>-->
    <!--							<a href="single.html"><h4>Proin euismod a mi non</h4></a>-->
    <!--							<p>Fusce lacinia metus eget sapien ullamcorper accumsan. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>-->
    <!--						</div>-->
    <!--						<div class="clearfix"></div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				<div class="clearfix"></div>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--product-end-->
@endsection
