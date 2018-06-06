        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
       <?php if(session('warning')): ?>
            <div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo e(session('warning')); ?>

            </div>
        <?php endif; ?>
       <?php if(session('danger')): ?>
            <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo e(session('danger')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('estatus')): ?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo e(session('estatus')); ?>

            </div>
        <?php endif; ?>