
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Properties'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>Properties</h3>
                        </div><!--end page title-->

                       

                       

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php if(count($products) > 0): ?>
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Address</th>
                                                    <th>Zip-Code</th>
                                                    <th>Precinct</th>
                                                    <th>Sale </th>
                                                    <th>Type</th>
                                                    <th>Cause</th>
                                                    <th>Minimum Bid</th>
                                                    <th>Adjusted Value</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($product->address); ?></td>
                                                    <td><?php echo e($product->zipcode); ?></td>
                                                    <td><?php echo e($product->precinct); ?></td>
                                                    <td><?php echo e($product->sale); ?></td>                   
                                                    <td><?php echo e($product->type); ?></td>                   
                                                    <td><?php echo e($product->cause); ?></td>
                                                    <td><?php echo e($product->min_bid); ?></td>                   
                                                    <td><?php echo e($product->adjudged_value); ?></td>
                                                    <td>
                                                    <?php if($product->status == 'active'): ?>
                                                    <button class="btn btn-success btn-xs"><?php echo e($product->status); ?></button>
                                                    <?php else: ?>
                                                    <button class="btn btn-warning btn-xs"><?php echo e($product->status); ?></button>
                                                    <?php endif; ?>
                                                    </td>                   
                                                    <td>
                                                        <a href="<?php echo e(route('admin-auction-products', ['id' => $product->id ])); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                                        <a href="<?php echo e(route('admin-edit-products', ['id' => $product->id ])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo e(route('admin-del-products', ['id' => $product->id ])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php else: ?>
                                    <h2>Data Not Found !</h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>

                   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>