<!DOCTYPE html>
<html>

<head>
    <title>Heroes And Zeroes Team
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Heroes And Zeroes Team" />

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
@yield('after-js')
<!-- End SCRIPT -->
</body>

</html>
