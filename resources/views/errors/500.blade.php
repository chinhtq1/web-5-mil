<!DOCTYPE HTML>
<html>
<head>
    <title>How to Create a Custom 404 Page in Laravel 7</title>
    <meta name="keywords" content="404 iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link href="{{ asset('css/404.css') }}" rel="stylesheet" type="text/css"  media="all" />

</head>
<body>
<!--start-wrap--->
<div class="wrap">
    <!---End-header---->
    <!--start-content------>
    <div class="content">
        <img src="https://p.w3layouts.com/demos/ohh/web/images/error-img.png" title="error" />
        <p><span><label>O</label>hh.....</span>Không tìm thấy trang của bạn</p>
        <a href="{{ route('frontend.index') }}">Quay lại trang chủ</a>
    </div>
    <!--End-Cotent------>
</div>
<!--End-wrap--->
</body>
</html>
