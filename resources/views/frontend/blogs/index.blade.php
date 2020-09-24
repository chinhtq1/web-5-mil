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
                    <li><a href="index.html">Trang chủ</a></li>
                    <li class="active">Tin tức</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->

    <!--blog-starts-->
    <div class="blog">
        <div class="container">
            <div class="blog-top heading">
                <h3>Tin tức</h3>
            </div>
            <div class="blog-bottom">
                <div class="col-md-3 blog-left">
                    <div class="section2_left1 menu">
                        <ul>
                            <li class=" active"><a class="muiten" href="#">Tin
                                    công ty</a>
                            </li>
                            <li class=" "><a class="muiten" href="#">Tin
                                    chuyên ngành</a>
                            </li>
                            <li class=" "><a class="muiten" href="#">Tin
                                    khuyến mại</a>
                            </li>
                            <li class=" "><a class="muiten" href="#">Tin
                                    tuyển dụng</a>
                            </li>
                            <li class=" "><a class="muiten" href="#">Quan
                                    hệ cổ đông</a>
                            </li>
                            <li class=" "><a class="muiten" href="#">Tin phần mềm trong
                                    nước</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <!-- LIST BLOG -->

                @foreach($blogs->chunk(2) as $chunk_blog)
                    <div class="col-md-3 blog-left">
                        @foreach($chunk_blog as $blog)
                            <div class="blog-one">
                                <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                                    <img class="img-blog-thumbnail" src="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" alt="" />
                                </a>
                                <div class="blog-btm">
                                    <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">
                                        <h2>{{ $blog->name }}</h2>
                                    </a>
                                    <p>{{ $blog->publish_datetime }}</p>
                                    <p class="one">Vestibulum mollis metus et ligula lacinia tempus. Duis aliquet mi pretium
                                        purus
                                        sagittis fringilla. Fusce vulputate varius erat quis egestas. Proin tempus condimentum
                                        sodales.</p>
                                    <div class="b-btn">
                                        <a href="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}">Xem tiếp</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <!-- END LIST BLOG -->

                <div class="clearfix"></div>
            </div>

            <div>
                <div class="col-md-3 blog-left">
                </div>
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
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
