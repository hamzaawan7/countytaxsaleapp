<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Sign In'); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            
            <form class="m-t" method="POST" action="<?php echo e(route('logedin')); ?>">
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
                <br/>
                <div class="input-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="*******">
                </div>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                <?php endif; ?>
                <br/>
                <div class="mr-front-cta">
                    <button type="submit" class="btn btn-lg btn-blue btn-block">Sign In</button>
                </div>
                <br/>
                <p>
                    <a href="<?php echo e(route('forgot-what')); ?>" style="color:#fff; font-size:14px;">
                        Having login Issues?
                    </a>
                </p>
                <a href="<?php echo e(route('signup')); ?>" class="btn btn-lg btn-blue btn-outline btn-block">
                    Register
                </a>
                <br/>
                <br/>
                <i style="color:#fff; font-size:14px;">Next Harris County Delinquent Tax Sale Date
                    <br/>
                    <b><?php echo e(date('F d, Y', strtotime($auction_date->date))); ?> </b>
                    <br/>
                </i>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>