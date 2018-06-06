<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Dashboard'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>My Dashboard</h3>
                            
                        </div><!--end page title-->

                        <div class="widget-row">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Total User</h4>
                                            <h2><?php echo e($users); ?></h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Premium User</h4>
                                            <h2><?php echo e($preusers); ?></h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Active Product</h4>
                                            <h2><?php echo e($productss); ?></h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Cancelled Product</h4>
                                            <h2><?php echo e($productsss); ?></h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end widget-->

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="panel-box">
                                    <h4>Total Products</h4>
                                    <div><canvas id="lineChart" height="120"></canvas></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel-box">
                                    <h4>Monthly Favorites Compare</h4>
                                    <canvas id="polarChart" height="242"></canvas>
                                </div>
                            </div>
                        </div>


                   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>