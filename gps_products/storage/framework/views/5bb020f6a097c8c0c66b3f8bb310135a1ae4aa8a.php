<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-title" content="County Tax Sale App">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" type="images/png" href="<?php echo e('assets/images/ctsa.ico'); ?>"/>
    <link rel="apple-touch-icon" type="images/png" href="<?php echo e('assets/images/ctsa.ico'); ?>"/>
    <link href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/muckrack_stylesheet1.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/muckrack_stylesheet2.css')); ?>" type="text/css"/>
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
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-8926455-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-8926455-6');
    </script>

    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1955520044514354'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1955520044514354&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>

<body class="mr-front">

    <div class="mr-navbar-primary navbar navbar-inverse navbar-fixed-top js-navbar-primary" role="navigation">
        <center>
            <a href="<?php echo e(route('/')); ?>">
                <img src="<?php echo e(asset('assets/images/tlogo.png')); ?>">
            </a>
        </center>
    </div>

    <div class="mr-body">
        <div class="mr-homepage-intro mr-front-section mr-front-section-inverse bg-navy-2 bk-repeat">
            <div class="mr-homepage-desk"></div>
            <div class="mr-container-wide container">
                <div class="row">
                    <center>
                        <?php echo $__env->yieldContent('content'); ?>
                        <script type="text/javascript" src="<?php echo e(asset('assets/js/muckrack_js1.js')); ?>"></script>
                        <script type="text/javascript" src="<?php echo e(asset('assets/js/muckrack_js2.js')); ?>"></script>
                        <?php echo $__env->yieldContent('scripts'); ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
