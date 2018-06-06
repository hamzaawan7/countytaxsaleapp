
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | HomePage Questions'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="page-title">
            <h3>HomePage Questions</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form class="form-horizontals" method="POST" action="<?php echo e(route('admin-update-questions')); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                                        <label for="q1" class="control-label">Question 1</label>
                                        <input name="q1" value="<?php echo e($q1->question); ?>" id="q1" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                                        <label for="a1" class="control-label">Answer 1</label>
                                        <input name="a1" value="<?php echo e($q1->answer); ?>" id="a1" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                                        <label for="q2" class="control-label">Question 2</label>
                                        <input name="q2" value="<?php echo e($q2->question); ?>" id="q2" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                                        <label for="a2" class="control-label">Answer 2</label>
                                        <input name="a2" value="<?php echo e($q2->answer); ?>" id="a2" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                                        <label for="q3" class="control-label">Question 3</label>
                                        <input name="q3" value="<?php echo e($q3->question); ?>" id="q3" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                                        <label for="a3" class="control-label">Answer 3</label>
                                        <input name="a3" value="<?php echo e($q3->answer); ?>" id="a3" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                                        <label for="q4" class="control-label">Question 4</label>
                                        <input name="q4" value="<?php echo e($q4->question); ?>" id="q4" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                                        <label for="a4" class="control-label">Answer 4</label>
                                        <input name="a4" value="<?php echo e($q4->answer); ?>" id="a4" class="form-control" required/>
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