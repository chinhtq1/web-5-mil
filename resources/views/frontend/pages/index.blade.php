@extends('frontend.layouts.app')

@section('banner')
    @include('frontend.includes.partials.banner')
@endsection

@section('main-content')
    <!--starts-welcome-->
    <div class="welcome" id="welcome">
        <div class="container">
            <div class="welcome-top heading">
                <h2>Welcome</h2>
                <!--				<p>Mauris malesuada mi sit amet quam euismod auctor quis quis urna. Cras a maximus ex. Vestibulum vitae vestibulum lectus, at maximus libero.</p>-->
            </div>
            <div class= "welcome-bottom">
                @foreach($blogs as $blog)
                    <div class="col-md-4 welcome-left">
                        <img src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                        <div class="welcome-btm">
                            <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">{{ $blog->name }}<span class="arw"> </span></a>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--welcome-End-->
    <!--our-starts-->
    <!--	<div class="our" id="furniture">-->
    <!--		<div class="container">-->
    <!--			<div class="our-top">-->
    <!--				<div class="col-md-7 our-left heading">-->
    <!--					<h3>Our Furniture</h3>-->
    <!--					<p>Curabitur volutpat turpis et metus molestie tincidunt. Morbi blandit dapibus efficitur. Fusce a efficitur massa. Donec a fermentum libero.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras condimentum euismod mollis. </p>-->
    <!--				</div>-->
    <!--				<div class="col-md-5 our-right">-->
    <!--					<a href="single.html"><img src="{{ asset('img/frontend/o-1.jpg')}}" alt="" /></a>-->
    <!--				</div>-->
    <!--				<div class="clearfix"></div>-->
    <!--			</div>-->
    <!--			<div class="our-top">-->
    <!--				<div class="col-md-7 o-left">					-->
    <!--					<a href="single.html"><img src="{{ asset('img/frontend/o-2.jpg')}}" alt="" /></a>-->
    <!--				</div>-->
    <!--				<div class="col-md-5 o-right  heading">-->
    <!--					<h3>Furniture Design</h3>-->
    <!--					<p>Curabitur volutpat turpis et metus molestie tincidunt. Morbi blandit dapibus efficitur. Fusce a efficitur massa. Donec a fermentum libero.</p>-->
    <!--				</div>-->
    <!--				<div class="clearfix"></div>-->
    <!--			</div>-->
    <!--			<div class="our-top">-->
    <!--				<div class="col-md-7 our-left heading">-->
    <!--					<h3>Special Design</h3>-->
    <!--					<p>Curabitur volutpat turpis et metus molestie tincidunt. Morbi blandit dapibus efficitur. Fusce a efficitur massa. Donec a fermentum libero.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras condimentum euismod mollis. </p>-->
    <!--				</div>-->
    <!--				<div class="col-md-5 our-right">-->
    <!--					<a href="single.html"><img src="{{ asset('img/frontend/o-3.jpg')}}" alt="" /></a>-->
    <!--				</div>-->
    <!--				<div class="clearfix"></div>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--our-End-->
    <!--news-starts-->
    <div class="news" id="news">
        <div class="container">
            <div class="news-top heading">
                <h3>News & Events</h3>
                <!--				<p>Mauris malesuada mi sit amet quam euismod auctor quis quis urna. Cras a maximus ex. Vestibulum vitae vestibulum lectus, at maximus libero.</p>-->
            </div>
            <div class="news-bottom">
                <div class="col-md-4 news-left">
                    <img src="{{ asset('img/frontend/n-1.jpg')}}" alt="" />
                    <div class="mask">
                        <h4>29/11</h4>
                        <p>Morbi eget mauris ut urna iaculis ultrices ut nec turpis.</p>
                    </div>
                </div>
                <div class="col-md-4 news-left">
                    <img src="{{ asset('img/frontend/n-2.jpg')}}" alt="" />
                    <div class="mask">
                        <h4>29/11</h4>
                        <p>Morbi eget mauris ut urna iaculis ultrices ut nec turpis.</p>
                    </div>
                </div>
                <div class="col-md-4 news-left">
                    <img src="{{ asset('img/frontend/n-3.jpg')}}" alt="" />
                    <div class="mask">
                        <h4>29/11</h4>
                        <p>Morbi eget mauris ut urna iaculis ultrices ut nec turpis.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="partner" id="partner">
        <div class="container">
            <div class="news-top heading">
                <h3>Partner</h3>
            </div>

            <div class="news-bottom">
                <div class="owl-carousel owl-theme">
                    <div class="item text-center">
                        <img class="logo" src="{{ asset('img/frontend/logo/1.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/2.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/3.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/4.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/5.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/6.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/7.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/8.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/9.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/10.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/11.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/12.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/13.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/14.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/15.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/16.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/17.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/18.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/19.png')}}"/>
                    </div>
                    <div class="item">
                        <img class="logo" src="{{ asset('img/frontend/logo/20.png')}}"/>
                    </div>
                </div>
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
