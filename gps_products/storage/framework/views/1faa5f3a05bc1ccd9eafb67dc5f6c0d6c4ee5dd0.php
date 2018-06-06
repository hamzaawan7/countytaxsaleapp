<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Forgot'); ?>
<?php $__env->startSection('content'); ?>


    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            <?php echo e(csrf_field()); ?>

            <a href="<?php echo e(route('forgot-username')); ?>" class="btn btn-blue btn-lg btn-block ">Forgot Username</a>
            <br/>
            <a href="<?php echo e(route('password.request')); ?>" class="btn btn-blue btn-outline btn-lg btn-block ">Forgot
                Password</a>
        </div>
    </div>
    <div class="col-md-4">
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>