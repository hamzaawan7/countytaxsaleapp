
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Profile Update'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>Profile Update</h3>
                        </div><!--end page title-->


                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box clearfix">

                                  <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                  <form method="post" action="<?php echo e(route('admin-profile-update')); ?>" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                  <div class="box-body">
                                  <div class="col-md-8 col-md-offset-2">
                                    <!-- <img src="http://localhost/laravel_inventory/public/profiles/1486348083BpwScreenshot_1.png" alt="" class="profile-user-img img-responsive img-circle"> -->
                                    <img src="data:image/jpeg;base64,<?php echo e(base64_encode( Auth::user()->photo )); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="profile-user-img img-responsive img-circle">
                                    <div class="form-group logos">
                                      <label for="logo">Update Profile Image</label>
                                      <input type="file" name="logo" id="logo" >
                                    
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo e(Auth::user()->name); ?>">
                                      <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"  value="<?php echo e(Auth::user()->email); ?>">
                                      <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('zipcode') ? ' has-error' : ''); ?>">
                                      <label for="zipcode">Zip-Code</label>
                                      <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zipcode"  value="<?php echo e(Auth::user()->zipcode); ?>">
                                      <?php if($errors->has('zipcode')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('zipcode')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                                      <label for="country">Country</label>
                                      <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country"  value="<?php echo e(Auth::user()->country); ?>">
                                      <?php if($errors->has('country')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('country')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                      <label for="address">Address</label>
                                      <textarea class="form-control" name="address" id="address" placeholder="Enter Address"> <?php echo e(Auth::user()->address); ?></textarea>
                                      <?php if($errors->has('address')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                      <label for="description">Description</label>
                                      <textarea class="form-control" name="description" id="description" placeholder="Enter Description"> <?php echo e(Auth::user()->descripton); ?></textarea>
                                      <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="box-footer">
                                  <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-info btn-lg">Update Profile</button>
                                  </div>
                                  </div>
                                </form>


                                </div>
                            </div>
                        </div>

                   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>