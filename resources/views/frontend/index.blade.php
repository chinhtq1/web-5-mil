@extends('frontend.layouts.app')

@section('banner')
    @include('frontend.includes.partials.banner')
@endsection

@section('main-content')
    <!--starts-welcome-->
    <div class="welcome" id="welcome" style="background: {{ appSettings()->section_index_1_background }}">
        <div class="container">
            <div class="welcome-top section heading">
                <h3>{{ \Illuminate\Support\Str::upper(appSettings()->section_index_1 ? appSettings()->section_index_1 : "Welcome" )}}</h3>
                <!--				<p>Mauris malesuada mi sit amet quam euismod auctor quis quis urna. Cras a maximus ex. Vestibulum vitae vestibulum lectus, at maximus libero.</p>-->
            </div>
            <div class= "welcome-bottom">
                @forelse($blogs as $blog)
                    <div class="col-md-4 welcome-left">
                        <img src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                        <div class="welcome-btm">
                            <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                                {{ Illuminate\Support\Str::limit($blog->name, 40, '...') }}
                                <span class="arw" style="float: right"> </span></a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h4>Không có bài viết</h4>
                    </div>
                @endforelse
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="news" id="news" style="background: {{ appSettings()->section_index_2_background }}">
        <div class="container">
            <div class="news-top section heading">
                <h3>{{ \Illuminate\Support\Str::upper(appSettings()->section_index_2 ? appSettings()->section_index_2 : "News and Events")}}</h3>
                <!--				<p>Mauris malesuada mi sit amet quam euismod auctor quis quis urna. Cras a maximus ex. Vestibulum vitae vestibulum lectus, at maximus libero.</p>-->
            </div>
            <div class="news-bottom">
                @forelse($products as $product)
                    <div class="col-md-4 news-left">
                        <img src="{{ Storage::disk('public')->url('img/product/' . $product->feature_image) }}" alt="" />
                        <div class="mask">
                            <h4>{{ $product->publish_datetime->format('d/m') }}</h4>
                            <a href="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}" class="event-name" style="word-break: break-word">{{ Illuminate\Support\Str::limit($product->name, 50, '...') }}</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h4>Không có sản phẩm</h4>
                    </div>
                @endforelse
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="partner" id="partner" style="background: {{ appSettings()->section_index_3_background }}">
        <div class="container">
            <div class="news-top section heading">
                <h3>{{ \Illuminate\Support\Str::upper(appSettings()->section_index_3 ? appSettings()->section_index_3 : "Partner") }}</h3>
            </div>

            <div class="news-bottom">
                @if(count($partners) == 0)
                    <div class="text-center">
                        <h4>Không có đối tác</h4>
                    </div>
                @else
                <div class="owl-carousel owl-theme">
                    @foreach($partners as $partner)
                        <div class="item text-center">
                            <img class="logo" src="{{ Storage::disk('public')->url('img/partner/').$partner->featured_image }}" alt="{{ $partner->name }}"/>
                        </div>
                    @endforeach
                </div>
                @endempty
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
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
