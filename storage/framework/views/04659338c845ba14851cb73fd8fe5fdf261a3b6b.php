<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Package #<?php echo e($package->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Package'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/package/package')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(url('/package/package/' . $package->id)); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(method_field('PATCH')); ?>

                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('package.package.form', ['submitButtonText' => 'Update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        CKEDITOR.replace('description');
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/package/package/edit.blade.php ENDPATH**/ ?>