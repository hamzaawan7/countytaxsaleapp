<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Contacts'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="page-title">
            <h3>Contact Message</h3>
            <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div><!--end page title-->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel-box">
                    <?php if(count($contacts) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTable" id="table-2">
                                <thead>
                                <tr>
                                    <th>Sl Id.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->description); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin-contact-reply', ['id' => $user->id ])); ?>"
                                               class="btn btn-success btn-xs"> <i class="fa fa-reply"></i> </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin-contact-del', ['id' => $user->id ])); ?>"
                                               class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl Id.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else: ?>
                        <h3>Data Not Found.</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>