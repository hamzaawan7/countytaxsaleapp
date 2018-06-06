
<?php $__env->startSection('title', 'GPS Product | Sign Up Credit Card'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container wow fadeInUp">
        <div class="row">
            <div class="credit-contents ">
                <h4 class="text-center">Add Credit Card</h4>
                <form class="m-t" role="form" action="<?php echo e(route('credit-card-info')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="creadit_forms">
                        <div class="form-group">
                            <img src="<?php echo e(asset('asset/images/credit-cards.png')); ?>" class="img-responsive creadit_card"
                                 alt="">
                        </div>
                        <div class="form-group<?php echo e($errors->has('card_number') ? ' has-error' : ''); ?>">
                            <input id="card_number" type="text" class="form-control" name="card_number"
                                   placeholder="Card Number">
                            <?php if($errors->has('card_number')): ?>
                                <span class="help-block">
                                            <strong><?php echo e($errors->first('card_number')); ?></strong>
                                        </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('expire_date') ? ' has-error' : ''); ?>">
                            <input id="expire_date" type="text" class="form-control" name="expire_date"
                                   placeholder="Expiration Date (MM/YY)">
                            <?php if($errors->has('expire_date')): ?>
                                <span class="help-block">
                                            <strong><?php echo e($errors->first('expire_date')); ?></strong>
                                        </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('cvv') ? ' has-error' : ''); ?>">
                            <input id="cvv" type="text" class="form-control" name="cvv" placeholder="CVV">
                            <?php if($errors->has('cvv')): ?>
                                <span class="help-block">
                                            <strong><?php echo e($errors->first('cvv')); ?></strong>
                                        </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input id="referal_id" type="text" class="form-control" name="referal_id"
                                   placeholder="Referal ID">
                        </div>
                        <div class="form-group<?php echo e($errors->has('cardholder_name') ? ' has-error' : ''); ?>">
                            <input id="cardholder_name" type="text" class="form-control" name="cardholder_name"
                                   placeholder="Cardholder Name">
                            <?php if($errors->has('cardholder_name')): ?>
                                <span class="help-block">
                                            <strong><?php echo e($errors->first('cardholder_name')); ?></strong>
                                        </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <!-- <input id="email" type="text" class="form-control" name="email" placeholder="Country"> -->
                            <div class="bfh-selectbox bfh-countries" data-country="US" data-flags="true">
                                <input type="hidden" value="" name="country">
                                <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                    <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                    <b class="caret"></b>
                                </a>
                                <div class="bfh-selectbox-options">
                                    <input type="text" class="bfh-selectbox-filter">
                                    <div role="listbox">
                                        <ul role="option">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="congratess text-center">
                                <p>Your credit card will be charged after free trail period ends unless you cancel </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12"><!-- data-toggle="modal" data-target="#successModal" -->
                        <button type="submit" class="btn btn-theme btn-lg btn-block card_pay">Sign Up</button>
                        <br>
                    </div>
                </form>

                <!-- Modal -->
                <div id="successModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h4>Thanks for Registering!</h4>
                                <p>You can Now login with the credentials that you set in the previous step.</p>
                            </div>
                            <div class="modal-footer">
                                <!-- <p class="text-center"><a href="#" data-dismiss="modal" style="color:#00AEEE">Okay</a></p> -->
                                <p class="text-center"><a href="<?php echo e(route('dashboard')); ?>" style="color:#00AEEE">Okay</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
    <script src="<?php echo e(asset('assets/checkout-stripe.js')); ?>"></script>
    <style>
        .bfh-selectbox .bfh-selectbox-options {
            width: 100% !important;
        }
    </style>
    <?php if(session('modal')): ?>
        <script>
            $(window).on('load', function () {
                $('#success<?php echo session('modal'); ?>').modal('show');
            });
        </script>


    <?php endif; ?>

    <link href="<?php echo e(asset('asset/css/bootstrap-formhelpers.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('asset/js/bootstrap-formhelpers.min.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>