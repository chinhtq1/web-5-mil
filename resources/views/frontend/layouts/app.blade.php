<!DOCTYPE html>
<html>

<head>
    <title>
        {{ appSettings()->app_name ? appSettings()->app_name : app_name() }}
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('meta', view('frontend.includes.partials.seo'))

    <link type="image/x-icon" href="{{ appSettings()->favicon ?  Storage::disk('public')->url('img/settings/favicon/'.appSettings()->favicon) : '' }}" rel="icon">

    <!-- CSS -->
    @yield('before-css')
    @include('frontend.includes.base-css')
    @yield('after-css')
    <!-- End CSS -->

    <!-- Fonts -->
    @include('frontend.includes.base-font')
    @yield('extra-fonts')
    <!-- End Fonts -->
</head>

<body>
<!--header-top-->
@include('frontend.includes.header')
<!--header-top-->

<!--navigation-starts-->
@include('frontend.includes.nav')
<!--navigation-end-->

<!--banner-starts-->
@yield('banner')
<!--banner-end-->


<!-- START CONTENT -->
@yield('main-content')
<!-- END CONTENT -->

<!--footer-starts-->
@include('frontend.includes.footer')
<!--footer-end-->

<!-- SCRIPT -->
@yield('before-js')
@include('frontend.includes.base-js')
<script>
    $(document).ready(function() {
        // get current URL path and assign 'active' class
        var pathname = window.location.href;
        if(pathname.endsWith('/')) pathname = pathname.slice(0, -1);
        $('.menu  .menu-item > a[href="'+pathname+'"]').parent().addClass('active');
    })
</script>
<?php
if (!empty($google_analytics)) {
    echo $google_analytics;
}
?>
@yield('after-js')
<!-- End SCRIPT -->
</body>

</html>
