
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Sign Up'); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-12 col-lg-4">
        <div class="locksreen-col text-center">
            
            <form class="m-t" id="basicform" role="form" method="post" action="<?php echo e(route('register')); ?>">
                <div class="congrates">
                            YOU QUALIFY FOR <span class="offers"><?= $trial_days->days ?> DAY</span> FREE TRIAL
                            <div class="text-center">
                                <span class="offers">
                                    $<?= $trial_amount->amount ?>/mo
                                </span>
                                <span style="font-weight: bold;font-family: arial;color: #fff;font-size: 13px">
                                    AFTER TRIAL PERIOD ENDS
                                    <br/>
                                    CANCEL ANYTIME
                                </span>
                            </div>
                        </div>
                        <br/>
                        <?php echo e(csrf_field()); ?>

                        <div class="input-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input id="name" type="text" class="form-control" name="name"
                                   autofocus placeholder="John Doe" value="<?php echo e(old('name')); ?>" required>
                        </div>
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('name')); ?></strong>
                                </span>
                        <?php endif; ?>
                        <br/>
                        <div class="input-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="text" class="form-control" name="email"
                                   placeholder="johndoe@gmail.com" value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('email')); ?></strong>
                                </span>
                        <?php endif; ?>
                        <br/>
                        <div class="input-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="*******" value="<?php echo e(old('password')); ?>" required>
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('password')); ?></strong>
                                </span>
                        <?php endif; ?>
                        <br/>
                        <div class="input-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input id="phone" type="tel"  required
                                   class="form-control" name="phone_number"
                                   placeholder="Enter your Mobile Number"
                                   value="<?php echo e(old('phone_number')); ?>">
                        </div>
                        <span style="font-size: 14px">A verification code will be sent to this number</span>
                        <?php if($errors->has('phone_number')): ?>
                            <span class="help-block">
                               <strong style="color:#a94442"><?php echo e($errors->first('phone_number')); ?></strong>
                           </span>
                        <?php endif; ?>
                        <br/>
                        <br/>
                        <div>
                        </div>
                        <button type="submit" name="next" class="btn btn-blue btn-lg btn-block">
                            Register
                        </button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <style>
        /*custom font*/
        @import  url(https://fonts.googleapis.com/css?family=Montserrat);

        /*form styles*/
        #basicform {
        }

        #basicform fieldset {
            position: relative;
        }

        #basicform fieldset:not(:first-of-type) {
            display: none;
        }

        #basicform .action-button {
            width: 100px;
            background: #27AE60;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #basicform .action-button:hover, #basicform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }

        /*headings*/
        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
        }

        #progressbar li:first-child:after {
            content: none;
        }

        #progressbar li.active:before, #progressbar li.active:after {
            background: #27AE60;
            color: white;
        }

        .help-inline-error {
            display: block;
            color: red;
            width: 100%;
            text-align: left;
        }


    </style>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/jquery.validate.js')); ?>"></script>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>