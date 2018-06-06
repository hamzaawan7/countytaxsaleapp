
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Property Detail'); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .successModal .modal-dialog {
            width: 280px !important;
            margin: 210px auto !important;
        }

        .pro_detailss {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
    </style>

    <?php
    use App\Favorite;
    ?>
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
                                       placeholder="&#xF002;   Search Properties By Address/ Zip Code/ Account Number/ Cause Number"
                                       value="<?php echo e(old('search')); ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-12" style="display: none;">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="product_contents  wow fadeInUp">

                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="pull-right" href="<?php echo e(redirect()->back()->getTargetUrl()); ?>">
                                        Go back to Previous Search
                                    </a>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <p>Detailed</p>
                                        <h3 class="pro_title">
                                            <a href="<?php echo e(route('products-views', ['id' => $product->id ])); ?>">
                                                <?php echo e($product->address); ?>

                                            </a>
                                            <p class="pull-right">
                                                <?php
                                                $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
                                                ?>
                                                <a href="#" onclick="return false"
                                                   id="product<?php echo e($product->id); ?>"
                                                   style="color: <?php if(!empty($favorite)): ?> #E24244 <?php else: ?> #bbb8b8  <?php endif; ?>;">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <script>
                                                    $("#product<?=$product->id?>").click(function () {
                                                        $.ajax({
                                                            url: "<?php echo e(route('add-favorite', ['id' => $product->id ])); ?>",
                                                            success: function (result) {
                                                                if (result == 1) {
                                                                    $('#product<?= $product->id ?>').css('color', '#E24244');
                                                                } else {
                                                                    $('#product<?= $product->id ?>').css('color', '#bbb8b8');
                                                                }
                                                                return false;
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </p>
                                        </h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>STATUS</h4>
                                        <?php if($product->status == 'active'): ?>
                                            <p>
                                                <b><span style="color:green;text-transform: uppercase;"><?php echo e($product->status); ?></span></b>
                                            </p>
                                        <?php else: ?>
                                            <p>
                                                <b><span style="color:indianred;text-transform: uppercase;"><?php echo e($product->status); ?> </span></b>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Type</h4>
                                        <h3 class="pro_title"><?php echo e(ucfirst($product->type )); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Adjudged Value</h4>
                                        <h3 class="pro_title"><?php echo e($product->adjudged_value); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Minimum bid</h4>
                                        <h3 class="pro_title"><?php echo e($product->min_bid); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Precinct</h4>
                                        <h3 class="pro_title"><?php echo e($product->precinct); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Sale #</h4>
                                        <h3 class="pro_title"><?php echo e($product->sale); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Land SF</h4>
                                        <h3 class="pro_title"><?php echo e($product->land_sf); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Living SF</h4>
                                        <h3 class="pro_title"><?php echo e($product->living_sf); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Exemption Type</h4>
                                        <h3 class="pro_title"><?php echo e($product->exemption_type); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Cause #</h4>
                                        <h3 class="pro_title"><?php echo e($product->cause); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Account #</h4>
                                        <h3 class="pro_title"><?php echo e($product->account); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Tax Year In Judgement</h4>
                                        <h3 class="pro_title"><?php echo e($product->tax_years); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Judgment </h4>
                                        <h3 class="pro_title"> <?php echo e(Carbon\Carbon::parse($product->judgment)->subDay(0)->format('m-d-Y')); ?></h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Photo</h4>
                                        <?php if(count($product->image_url)>0): ?>
                                            <img src="<?php echo e($product->image_url); ?>" class="img-responsive" alt=""
                                                 style="width:300px; height:220px">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('asset/images/thumb.jpg')); ?>" class="img-responsive"
                                                 alt="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Description</h4>
                                        <p><?php echo e($product->description); ?></p>
                                    </div>
                                </div>
                            <!-- <div class="col-xs-12">
                          <div class="row auctions">
                            <p>Online Auction:  <?php echo e(date('M d', strtotime($product->auction_start))); ?> - <?php echo e(date('M d', strtotime($product->auction_end))); ?> </p>

                          </div>
                        </div> -->
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