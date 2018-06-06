
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Property'); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .successModal .modal-dialog {
            width: 280px !important;
            margin: 210px auto !important;
        }
    </style>

    <div id="wrapper">

        <!-- Sidebar -->
    <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
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
                    <h4 class="text-center head_apps">County App</h4>
                </div>
                <div class="col-xs-3">
                    <ul class="list-inline filete_box  pull-right">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo e(route('search-results')); ?>"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="search_boxes  wow fadeInRight">
                        <form action="<?php echo e(route('search-view')); ?>" method="get" role="search">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control searches" id="usr"
                                       placeholder="&#xF002;   Search Properties" value="<?php echo e(Request::get('search')); ?>"
                                       autocomplete="off">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="product_contents wow fadeInUp" style="padding-top: 1.5%">
                        <div class="col-xs-12 col-md-2">
                            <div class="pro_img">
                                <?php if(count($product->image_url)>0): ?>
                                    <img src="<?php echo e($product->image_url); ?>" class="img-responsive" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('asset/images/thumb.jpg')); ?>" class="img-responsive" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10">
                            <div class="col-xs-8">
                                <div class="row pro_details">
                                    <h3 class="pro_title">
                                        <a href="<?php echo e(route('products-views', ['id' => $product->id ])); ?>"><?php echo e($product->address); ?></a>
                                    </h3>
                                    <p><span class="pro_price">
                          <?php
                                            //echo sprintf('$ %s', number_format($product->min_bid, 2));
                                            echo $product->min_bid;
                                            ?>
                          </span> <a href="#" onclick="return false">Minimum Bid</a></p>
                                    <p><b>PCT # <?php echo e($product->precinct); ?> <?php echo e($product->type); ?>

                                            # <?php echo e($product->sale); ?> CAUSE # <?php echo e($product->cause); ?> </b></p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="favorites">
                                    <a href="#" onclick="return false"
                                       id="product<?php echo e($product->id); ?>"
                                       style="color: <?php if(count($product->favorite) >0 && $product->favorite->user_id == Auth::user()->id): ?> #E24244 <?php else: ?> #eee  <?php endif; ?>;">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <script>
                                        $("#product<?=$product->id?>").click(function () {
                                            $.ajax({
                                                url: "<?php echo e(route('add-favorite', ['id' => $product->id ])); ?>",
                                                success: function (result) {
                                                    if (result == 1) {
                                                        $('#product<?= $product->id ?>').css('color' , '#E24244');
                                                    } else {
                                                        $('#product<?= $product->id ?>').css('color' , '#EEE');
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row auctions">
                                    <?php if($product->status == 'active'): ?>
                                        <p>STATUS: <span
                                                    style="color:green;text-transform: uppercase;"><?php echo e($product->status); ?></span>
                                        </p>
                                    <?php else: ?>
                                        <p>STATUS: <span
                                                    style="color:indianred;text-transform: uppercase;"><?php echo e($product->status); ?> </span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <br><br><br>


            </div>
        </div>

    </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>