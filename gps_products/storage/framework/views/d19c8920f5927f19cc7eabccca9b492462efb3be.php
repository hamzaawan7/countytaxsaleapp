<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Auction Date'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="page-title">
            <h3>Edit Auction Date</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form class="form-horizontals" method="POST" action="<?php echo e(route('admin-update-auction-date')); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('date') ? ' has-error' : ''); ?>">
                                        <label for="date" class="control-label">Next Auction Date</label>
                                        <input name="date" value="<?php echo e($adate->date); ?>" id="date" type="date" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-sm btn-lg btn-theme" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>