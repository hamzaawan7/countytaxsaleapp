<?php $__env->startSection('title', 'County Tax Sale App (CTSA)'); ?>
<?php $__env->startSection('content'); ?>

    <div class="mr-front-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="js-typed-text">
            <h1 class="mr-front-heading">
            </h1>
            <h2 class="mr-front-subheading">
            </h2>
        </div>
        <br/>
        <br/>
        <div class="mr-front-cta">
            <a href="<?php echo e(route('login')); ?>" class="btn btn-lg btn-blue btn-outline">Sign In</a>
            <a href="<?php echo e(route('signup')); ?>" class="btn btn-lg btn-blue">Register</a>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            var typedText = $(".js-typed-text");
            typedText.text('');
            typedText.typed({
                strings: [
                    '<h2 class="mr-front-heading"><?php echo e($questions[0]->question); ?></h2> <br/> <h2 class="mr-front-subheading"><?php echo e($questions[0]->answer); ?> <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading"><?php echo e($questions[1]->question); ?></h2> <br/> <h2 class="mr-front-subheading"><?php echo e($questions[1]->answer); ?> <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading"><?php echo e($questions[2]->question); ?></h2> <br/> <h2 class="mr-front-subheading"><?php echo e($questions[2]->answer); ?> <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading"><?php echo e($questions[3]->question); ?></h2> <br/> <h2 class="mr-front-subheading"><?php echo e($questions[3]->answer); ?> <span class="typed-cursor">|</span> </h2>',
                ],
                loop: true,
                startDelay: 500,
                backDelay: 2000
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>