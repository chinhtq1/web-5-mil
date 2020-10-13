<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/frontend/auth/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/auth/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/auth/et-line-font/et-line-font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/auth/themify-icons/themify-icons.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">

@yield('main-content')

<!-- jQuery 3 -->
<script src="{{ asset('js/frontend/jquery.min.js') }}"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>

<!-- template -->
<!--<script src="dist/js/niche.js"></script>-->
</body>
</html>
