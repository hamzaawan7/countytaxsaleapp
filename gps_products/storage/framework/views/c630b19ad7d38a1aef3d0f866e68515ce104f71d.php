
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Change Password'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>Password Change</h3>
                        </div><!--end page title-->


                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box clearfix">

                                    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                  <form method="post" action="<?php echo e(route('admin-password-update')); ?>">
                                 <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                  <div class="box-body">
                                  <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group<?php echo e($errors->has('old_password') ? ' has-error' : ''); ?>">
                                      <label for="old_password">Old Password</label>
                                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                                      <?php if($errors->has('old_password')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('old_password')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
                                      <label for="new_password">New Password</label>
                                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                                      <?php if($errors->has('new_password')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('new_password')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                      <label for="password_confirmation">Confirm New Password</label>
                                      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm New Password">
                                      <?php if($errors->has('password_confirmation')): ?>
                                        <span class="help-block">
                                          <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="box-footer">
                                  <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-info">Change Password</button>
                                  </div>
                                  </div>
                                </form>


                                </div>
                            </div>
                        </div>

                   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>