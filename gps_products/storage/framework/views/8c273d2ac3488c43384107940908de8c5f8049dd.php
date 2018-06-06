
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Profile'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>Profile View</h3>
                            
                        </div><!--end page title-->

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                    <div class="col-sm-8 col-sm-offset-2">
                                    <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <h4>Profile View</h4>
                                        <img src="data:image/jpeg;base64,<?php echo e(base64_encode( $user->photo )); ?>" alt="<?php echo e($user->name); ?>" class="profile-user-img img-responsive img-circle">
                                       <br>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>Name</td>
                                                <td><?php echo e($user->name); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Email</td>
                                                <td><?php echo e($user->email); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Address</td>
                                                <td><?php echo e($user->address); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Zip Code</td>
                                                <td><?php echo e($user->zipcode); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Phone Number</td>
                                                <td><?php echo e($user->phone_number); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Country</td>
                                                <td><?php echo e($user->country); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Description</td>
                                                <td><?php echo e($user->description); ?></td>
                                              </tr>
                                               <tr>
                                                <td colspan="2"><b>All Alerts</b> </td>
                                              </tr>
                                              <tr>
                                                <td>Status Alert</td>
                                                <td><?php echo e($user->status_alert); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Email Alert</td>
                                                <td><?php echo e($user->status_alert); ?></td>
                                              </tr>
                                              <tr>
                                                <td>SMS Alert</td>
                                                <td><?php echo e($user->status_alert); ?></td>
                                              </tr>
                                              <?php if(count($user->payment) > 0): ?>
                                              <tr>
                                                <td colspan="2"><b>Payment Details</b> </td>
                                              </tr>
                                              <tr>
                                                <td>Card Number </td>
                                                <td><?php echo e($user->payment->card_number); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Expire Date </td>
                                                <td><?php echo e($user->payment->expire_date); ?></td>
                                              </tr>
                                              <tr>
                                                <td>CVV </td>
                                                <td><?php echo e($user->payment->cvv); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Referal Id </td>
                                                <td><?php echo e($user->payment->referal_id); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Country</td>
                                                <td><?php echo e($user->payment->country); ?></td>
                                              </tr>
                                              <?php endif; ?>
                                              <?php if(count($user->products) > 0): ?>
                                              <tr>
                                                <td colspan="2"><b>Favorite Products</b> </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2">
                                                   <?php $__currentLoopData = $user->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <a href="<?php echo e(route('admin-auction-products', ['id' => $product->id ])); ?>">
                                                    <div class="item  col-xs-4 col-lg-4">
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h5 class="group inner list-group-item-heading"><?php echo e($product->address); ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       </a>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                </td>
                                              </tr>
                                              <?php else: ?>
                                              <tr>
                                                <td colspan="2"><b>Favorite List Empty !</b> </td>
                                              </tr>
                                              <?php endif; ?>
                                            </tbody>
                                        </table>  
                                            
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>