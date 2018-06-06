
<?php $__env->startSection('title', 'GPS Product | Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <div id="wrapper">
        <!-- Page Content -->
        <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-content-wrapper">
            <div class="menus_headerss">
                <div class="col-xs-3">
                    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>
                <div class="col-xs-6">
                    <h4 class="text-center head_apps">Subscription Status</h4>
                </div>
                <div class="col-xs-3">

                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="account_stat  wow fadeInUp">
                        <div class="col-xs-6"><h3>Account Status</h3></div>
                        <div class="col-xs-6"><h3 class="pull-right">Trial</h3></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="col-xs-12">
                <div class="row">
                    <div class="account_prem  wow fadeInUp clearfix">
                        <div class="col-sm-4 col-sm-offset-4">
                            <h2 class="text-center">Payment</h2>
                            <img src="<?php echo e(asset('assets/images/payment_tab_credit_card.png')); ?>"
                                 style="width:150px; margin-bottom:30px" alt="">
                            <form id="checkoutform" class="clearfix" action="<?php echo e(route('payment-by-mastercard')); ?>"
                                  method="post">
                                <div class="form-group<?php echo e($errors->has('card-number') ? ' has-error' : ''); ?> mb_1">
                                    <input type="text" class="form-control" id="card-number" name="card-number"
                                           placeholder="Card Number"
                                           value="<?php echo e(old('card-number',isset($account)?$account->card_number:'')); ?>">
                                    <?php if( $errors->has('card-number')): ?>
                                        <span class="help-block"><?php echo e($errors->first('card-number')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('card-cvc') ? ' has-error' : ''); ?> mb_1">
                                    <input type="text" id="card-cvc" name="card-cvc" class="form-control"
                                           placeholder="CVC"
                                           value="<?php echo e(old('card-cvc',isset($account)?$account->cvv:'')); ?>">
                                    <?php if( $errors->has('card-cvc')): ?>
                                        <span class="help-block"><?php echo e($errors->first('card-cvc')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('card-expiry-month') ? ' has-error' : ''); ?> mb_1">
                                    <input type="text" id="card-expiry-month" name="card-expiry-month"
                                           class="form-control" placeholder="MM/YY"
                                           value="<?php echo e(old('card-expiry-month',isset($account)?Carbon\Carbon::parse($account->expire_date)->month:'')); ?>">
                                    <?php if( $errors->has('card-expiry-month')): ?>
                                        <span class="help-block"><?php echo e($errors->first('card-expiry-month')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('card-expiry-year') ? ' has-error' : ''); ?> mb_1">
                                    <input type="text" id="card-expiry-year" name="card-expiry-year"
                                           class="form-control" placeholder="Expiration Year"
                                           value="<?php echo e(old('card-expiry-month',isset($account)?Carbon\Carbon::parse($account->expire_date)->year:'')); ?>">
                                    <?php if( $errors->has('card-expiry-year')): ?>
                                        <span class="help-block"><?php echo e($errors->first('card-expiry-year')); ?></span>
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                </div>
                                <button type="submit" class="btn btn-info">Payment</button>
                            </form>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                    <div class="premium_det wow fadeInUp">
                        <div class="col-xs-2">
                            <img src="<?php echo e(asset('asset/images/premium.png')); ?>" class="img-responsive" alt="">
                        </div>
                        <div class="col-xs-10">
                            <div class="pre_conten">
                                <h3>Lorem Ipsum</h3>
                                <p>Lorem Ipsum dolor sit amet</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
    <script src="<?php echo e(asset('assets/checkout-stripe.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>