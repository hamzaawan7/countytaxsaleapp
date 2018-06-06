<?php $__env->startSection('title', 'GPS Product | Sign In'); ?>
<?php $__env->startSection('content'); ?>

        <div class="container">
            <div class="row">
                <div class="locksreen-col text-center  wow fadeInUp">
                    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <img src="<?php echo e(asset('asset/images/tax.png')); ?>" class="img-responsive">
                    <form class="m-t" method="POST" action="<?php echo e(route('logedin')); ?>">
                    <?php echo e(csrf_field()); ?>

                        <div class="input-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="jhondoe@gmail.com" value="<?php echo e(old('email')); ?>" autofocus>
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <div class="input-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="*******">
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <br>
                        <button type="submit" class="btn btn-theme btn-lg btn-block ">Sign In</button><br>
                        <p><a href="<?php echo e(route('forgot-what')); ?>" style="color:#000; font-size:14px;">Having login Issues?</a></p>
						<hr>
						<a href="<?php echo e(route('signup')); ?>" class="btn btn-warns btn-lg btn-block ">Sign Up</a><br>
                
                    </form>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>