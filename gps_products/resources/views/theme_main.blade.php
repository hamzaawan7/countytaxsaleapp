<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-title" content="County Tax Sale App">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>@yield('title')</title>

    <link rel="icon" type="images/png" href="{{ 'assets/images/ctsa.ico' }}"/>
    <link rel="apple-touch-icon" type="images/png" href="{{ 'assets/images/ctsa.ico' }}"/>
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{  asset('assets/css/muckrack_stylesheet1.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{  asset('assets/css/muckrack_stylesheet2.css') }}" type="text/css"/>
    <!--[if IE]>
    <link href="https://cdn.muckrack.com/static/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css">
    <![endif]-->
    <!--[if IE 8]>
    <link href="https://cdn.muckrack.com/static/css/ie8.css" media="screen, projection" rel="stylesheet"
          type="text/css">
    <![endif]-->
    <!--[if lte IE 7]>
    <link href="https://cdn.muckrack.com/static/css/ie7.css" media="screen, projection" rel="stylesheet"
          type="text/css">
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" src="{{  asset('assets/js/jquery.min.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-8926455-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-8926455-6');
    </script>
</head>

<body class="mr-front">
{{--@include('layouts.message')--}}
    <div class="mr-navbar-primary navbar navbar-inverse navbar-fixed-top js-navbar-primary" role="navigation">
        <center>
            <a href="{{ route('/') }}">
                <img src="{{ asset('assets/images/tlogo.png') }}">
            </a>
        </center>
    </div>

    <div class="mr-body">
        <div class="mr-homepage-intro mr-front-section mr-front-section-inverse bg-navy-2 bk-repeat">
            <div class="mr-homepage-desk"></div>
            <div class="mr-container-wide container">
                <div class="row">
                    <center>
                        @yield('content')
                        <script type="text/javascript" src="{{  asset('assets/js/muckrack_js1.js') }}"></script>
                        <script type="text/javascript" src="{{  asset('assets/js/muckrack_js2.js') }}"></script>
                        @yield('scripts')
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
