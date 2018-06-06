<?php $__env->startSection('title', 'GPS Product | Forgot Password'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="locksreen-col text-center  wow fadeInUp">
                <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <img src="<?php echo e(asset('asset/images/tax.png')); ?>" class="img-responsive">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('password.request')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <div class="input-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="jhondoe@gmail.com" value="<?php echo e(old('email')); ?>" autofocus>
                    </div>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                    <?php endif; ?>
                    <br>

                    <div class="input-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input placeholder="New Password" id="password" type="password" class="form-control" name="password" required>
                    </div>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>

                    <br>

                    <div class="input-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input placeholder="Confirm New Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <br>

                    <button type="submit" class="btn btn-theme btn-lg btn-block ">Change Password</button><br>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>