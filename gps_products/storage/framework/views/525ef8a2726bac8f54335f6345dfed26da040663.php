<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Excel Upload'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="page-title">
            <h3>Import CSV File</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php if(session('nexmo_errors')): ?>
							<?php $__currentLoopData = session('nexmo_errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nexmo_error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="alert alert-danger alert-dismissible">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<?php echo e($nexmo_error); ?>

									</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
						<?php endif; ?>
                        <form class="form-horizontals" method="POST" action="<?php echo e(route('import-excel')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('import_file') ? ' has-error' : ''); ?>">
                                <label for="cause" class="control-label">Import in csv</label>
                                <input type="file" name="import_file" id="import_file" placeholder="Write Cause" class="form-control">
                                <?php if($errors->has('import_file')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('import_file')); ?></strong>
                                                    </span>
                                <?php endif; ?>
                            </div>





                            <!-- <input type="file" name="import_file" /> -->
                            <button class="btn btn-primary">Import File</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>