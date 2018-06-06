<!DOCTYPE html>
<html>
    
<head>
        <title>County Tax Sale App (CTSA)</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/css/metisMenu.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/css/morris-0.4.3.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('assets/js/modernizr.js')); ?>"></script>
    </head>
    <body class="fixed-left">
<div class="container">
            <div class="row">
                <div class="locksreen-col text-center">
                    <h3>Login to Dashboard</h3>
                    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form class="m-t" action="<?php echo e(route('admin-loggedin')); ?>" method="post">
                     <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                         <div class="form-group<?php echo e($errors->has('email') ? ' has-error': ''); ?>">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error': ''); ?>">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-theme btn-lg btn-block">Login</button><br>
                        <p>Copyright © 2016</p>
                    </form>
                </div>
            </div>
        </div>
        <!-- Plugins  -->
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/metisMenu.js')); ?>"></script>
         <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/mediaquery.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/equalize.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>

    </body>

</html>
