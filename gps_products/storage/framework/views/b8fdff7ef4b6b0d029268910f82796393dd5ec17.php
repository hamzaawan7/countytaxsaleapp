<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Forgot Username'); ?>
<?php $__env->startSection('content'); ?>


    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            
            <form class="m-t" method="POST" action="<?php echo e(route('send-username')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                        <input id="phone" type="tel"  required
                               class="form-control" name="phone_number" placeholder="(___) ___-___"
                               autofocus value="<?php echo e(old('phone_number')); ?>">
                    </div>
                    <span>Please enter phone number and we will message you the username</span>
                    <?php if($errors->has('phone_number')): ?>
                        <span class="help-block">
                               <strong><?php echo e($errors->first('phone_number')); ?></strong>
                           </span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-blue btn-lg btn-block ">Send Message</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>