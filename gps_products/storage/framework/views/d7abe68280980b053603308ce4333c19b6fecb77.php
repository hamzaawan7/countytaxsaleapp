<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Users'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <form action="<?php echo e(route('admin-selected-group')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="page-title">
                <h3>
                    User
                    <button type="submit" class="btn btn-primary">Send Email / Message</button>
                </h3>
            </div><!--end page title-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-box">
                        <?php if(count($users) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable" id="table-2">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select-all"/>
                                        </th>
                                        <th>Sl Id.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Account Type</th>
                                        <th>Last4</th>
                                        <th>Subscribe/Unsubscribe</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" value="<?php echo e($user->id); ?>" name="users[]"
                                                       id="select-one-<?php echo e($i); ?>">
                                            </td>
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->phone_number); ?></td>
                                            <td>
                                                <?php $user_type = App\Premium_user::where('user_id', $user->id)->orderBy('id', 'DESC')->first(); ?>
                                                <?php if(count($user_type) >0): ?>
                                                    <?php
                                                    $end_date = $user_type->end_date;
                                                    if ($end_date > date('Y-m-d')) {
                                                        $status = ucfirst($user_type->status);
                                                    } else {

                                                        $status = "EXPIRED";
                                                    }


                                                    ?>
                                                    <button class="btn btn-success btn-xs"><?php echo e($status); ?></button>


                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $userhascard = 0;
                                                $user_card = App\Payment::where('user_id', $user->id)->orderBy('id')->first(); ?>
                                                <?php if(count($user_card) >0): ?>
                                                    <?php  $userhascard = 1; ?>
                                                    <?php echo e(ucfirst( $user_card->card_number )); ?>

                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <?php
                                                if($userhascard == 1){
                                                ?>

                                                <?php if($user->is_subscribed == '1' ): ?>
                                                    <label>Subscribed / </label>
                                                    <button class="btn btn-success btn-xs btn-unsubscribe"
                                                            type="button" data-id="<?php echo $user->id; ?>">Unsubscribe
                                                    </button>
                                                <?php elseif($user->is_subscribed == '0'): ?>
                                                    <button class="btn btn-success btn-xs btn-subscribe"
                                                            type="button" data-id="<?php echo $user->id; ?>">Subscribe
                                                    </button>
                                                    <label> / Unsubscribed</label>
                                                <?php endif; ?>
                                                <?php }else {
                                                    echo "No card";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if($user->status == 'active'): ?>
                                                    <button type="button" class="btn btn-success btn-xs">Active</button>
                                                <?php elseif($user->status == 'inactive'): ?>
                                                    <button type="button" class="btn btn-warning btn-xs">In-Active
                                                    </button>
                                                <?php elseif($user->status == 'block'): ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Block</button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Remove</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin-user-view', ['id' => $user->id ])); ?>"
                                                   class="btn btn-info btn-xs"> <i class="fa fa-eye"></i> </a>
                                                <a href="<?php echo e(route('admin-user-edit', ['id' => $user->id ])); ?>"
                                                   class="btn btn-danger btn-xs"> <i class="fa fa-edit"></i> </a>
                                                <a href="<?php echo e(route('admin-user-delete', ['id' => $user->id ])); ?>"
                                                   class="btn btn-success btn-xs"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <input id="size-users" value="<?php echo e($i); ?>" type="hidden"/>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl Id.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Account Type</th>
                                        <th>Last4</th>
                                        <th>Subscribe/Unsubscribe</th>
                                        <th>Status</th>
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
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#select-all').click(function () {
            var size = $("#size-users").val();
            for (var i = 1; i <= size; i++) {
                $('#select-one-' + i).not(this).prop('checked', this.checked);
            }
        });
        $('.btn-unsubscribe').click(function () {
            var id = $(this).attr('data-id');
            if (confirm("You are sure want to Unsubscribe?")) {
                $.ajax({
                    url: "unsubsctibe_user/" + id, dataType: 'json', success: function (result) {

                        if (result.status == 1) {
                            location.reload();
                        }
                        else
                            alert("Something went wrong");

                    }
                });


            }

        });
        $('.btn-subscribe').click(function () {
            var id = $(this).attr('data-id');
            if (confirm("You are sure want to Subscribe?")) {
                $.ajax({
                    url: "subsctibe_user/" + id, dataType: 'json', success: function (result) {
                        if (result.status == 1) {
                            location.reload();
                        }
                        else {
                            alert("Something went wrong");
                        }
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>