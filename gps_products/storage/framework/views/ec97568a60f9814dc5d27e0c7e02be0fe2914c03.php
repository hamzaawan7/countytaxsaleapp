<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Premium Payments'); ?>
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
                    <h4 class="text-center head_apps">Payment Info</h4>
                </div>
                <div class="col-xs-3">

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="account_stat  wow fadeInUp">
                        <div class="col-xs-6"><h4>Account Status</h4></div>
                        <div class="col-xs-6"><h4
                                    class="pull-right"><?php if(isset(Auth::user()->premium_user->status)): ?> <?php echo e(ucfirst(Auth::user()->premium_user->status)); ?> <?php endif; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-sm-12 col-md-11">
                    <h4 style="text-align: center;">YOUR CREDIT CARD WILL NOT BE CHARGED UNTIL FREE TRIAL PERIOD
                        ENDS</h4>
                </div>
            </div>

            <div class="row">
                <?php if($cards->count()<2): ?>
                    <div class="col-xs-12" style="text-align: center;">
                        <form action="<?php echo e(route('new-card')); ?>"
                        " method="post">
                        <?php echo e(csrf_field()); ?>


                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $stripe_pub_key; ?>"
                                data-description="Add Credit Card"
                                data-label="Add Credit Card"
                                data-email="<?php echo $user->email; ?>"
                                data-allow-remember-me=false
                                data-panel-label="Save"
                                data-locale="auto">

                        </script>
                        </form>
                    </div>
                <?php endif; ?>
                <div class=" widget stored-cards full-size">
                    <ul>
                        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="col-xs-11 col-sm-4 col-md-3 visa stored-card cr-cd<?php echo e($list->id); ?>"
                                data-vendor="visa"
                                style="margin-left: 5px;">
                                <div class="vendor"><?php echo e($list->card_type); ?></div>
                                <div class=""></div>
                                <div class="card-number"><span>✖✖✖✖</span> <span>✖✖✖✖</span> <span>✖✖✖✖</span>
                                    <span><?php echo e(substr($list->card_number, -4)); ?></span></div>
                                <div class="card-name"><?php echo e($list->cardholder_name); ?></div>
                                <button style="margin-top: 170px;margin-bottom: 10px; " data-id="<?php echo e($list->id); ?>"
                                        class="r<?php echo e($list->id); ?> btn btn-danger btn-remove pull-right">Remove
                                </button>
                            </li>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('scripts'); ?>
            <script type="text/javascript">
                $('.btn-remove').click(function () {
                    var id = $(this).attr('data-id');
                    if (confirm("You are sure want to delete this card?")) {
                        $.ajax({
                            url: "removecard/" + id, dataType: 'json', success: function (result) {
                                console.log(result.a.length)
                                if (result.status == 1) {
                                    $('.cr-cd' + id).fadeOut(300, function () {
                                        $(this).remove();
                                    });
                                    if (result.a.length == 1) {
                                        $('.r' + result.a[0]).hide();
                                        location.reload();
                                    }
                                }
                                else
                                    alert("You can not delete this card!");

                            }
                        });


                    }

                })
            </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>