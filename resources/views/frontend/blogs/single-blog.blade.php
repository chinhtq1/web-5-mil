@extends('frontend.layouts.app')

@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li ><a href="blog.html">Tin tức</a></li>
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
                    <img class="img-responsive" src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                </div>
                <div class="single-bottom">
                    <h4>{{ $blog->name }}</h4>
                    <p class="sn">{{ $blog->publish_datetime }}</p>
                    <div style="margin-top: 3rem;">
                        {!! $blog->content !!}
                    </div>
                </div>
                <div class="comments heading">
                    <div class="post heading">
                        <h4 style="color: tomato;">{{ __('Bài viết liên quan') }}</h4>
                        <div class="post-top">
                            <div class="col-md-4 post-left">
                                <a href="single.html"><img class="img-blog-thumbnail " src="images/r-1.jpg" alt=""></a>
                                <a href="single.html"><h6>Duis autem</h6></a>
                                <p>Lorem ipsum dolor sit amet, consectetuer .</p>
                            </div>
                            <div class="col-md-4 post-left">
                                <a href="single.html"><img class="img-blog-thumbnail " src="images/r-2.jpg" alt=""></a>
                                <a href="single.html"><h6>Duis autem</h6></a>
                                <p>Lorem ipsum dolor sit amet, consectetuer .</p>
                            </div>
                            <div class="col-md-4 post-left">
                                <a href="single.html"><img class="img-blog-thumbnail " src="images/r-3.jpg" alt=""></a>
                                <a href="single.html"><h6>Duis autem</h6></a>
                                <p>Lorem ipsum dolor sit amet, consectetuer .</p>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Menu -->
            <div class="col-md-3 blog-left">
                <div class="section2_left1 menu">
                    <ul>
                        <li class=" active"><a class="muiten" href="#">Sản phẩm 1</a>
                        </li>
                        <li class=" "><a class="muiten" href="#">Sản phẩm 2</a>
                        </li>
                        <li class=" "><a class="muiten" href="#">Sản phẩm 3</a>
                        </li>
                        <li class=" "><a class="muiten" href="#">Sản phẩm 4</a>
                        </li>
                        <li class=" "><a class="muiten" href="#">Sản phẩm 5</a>
                        </li>
                        <li class=" "><a class="muiten" href="#">Sản phẩm 6</a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
    <!--single-end-->
@endsection
