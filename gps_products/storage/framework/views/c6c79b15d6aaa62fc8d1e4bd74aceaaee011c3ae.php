<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Forgot Password'); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            
            <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="input-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="jhondoe@gmail.com"
                           value="<?php echo e(old('email')); ?>" autofocus>
                </div>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                <?php endif; ?>
                <br>
                <button type="submit" class="btn btn-blue btn-lg btn-block ">Send Email</button>
                <br>
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('estatus')); ?>

                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>