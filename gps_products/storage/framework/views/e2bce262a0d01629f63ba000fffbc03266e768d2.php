<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="google" content="notranslate">
        <link rel="icon" type="images/png" href="<?php echo e(asset('assets/images/ctsa.ico')); ?>"/>
        <link rel="apple-touch-icon" type="images/png" href="<?php echo e(asset('assets/images/ctsa.ico')); ?>"/>
        <link href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/metisMenu.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/morris-0.4.3.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/bootstrap-multiselect.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('asset/css/jquery-ui.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('asset/js/modernizr.js')); ?>"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-8926455-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-8926455-6');
        </script>
    </head>
    <body>
        <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

        <!-- Plugins  -->
        <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/metisMenu.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/core.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/mediaquery.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/equalize.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/bootstrap-multiselect.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/jquery-ui.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/jquery.ui.touch-punch.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/validator.min.js')); ?>"></script>
        <style type="text/css">
            .alert{    
                position: fixed;
                top: 0px;
                right: 0;
                width: 20%;
                z-index: 9999;
                border-radius: 0px;
            }
            .container .alert{
                display: none;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                new WOW().init();

                setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 3000);

            });
        </script>

        <?php echo $__env->yieldContent('scripts'); ?>

    </body>

</html>
