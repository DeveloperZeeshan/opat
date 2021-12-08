<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Leadership <?php echo e($leadership->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Leadership'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/leadership/leadership')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($leadership->id); ?></td>
                            </tr>
                            <tr><th> Image </th><td><img src="<?php echo e(asset('website')); ?>/<?php echo e($leadership->image??''); ?>" id="imagePreview_1" width="100" height="100"></td></tr><tr><th> Name </th><td> <?php echo e($leadership->name); ?> </td></tr><tr><th> Designation </th><td> <?php echo e($leadership->designation); ?> </td></tr><tr><th> Description </th><td> <?php echo $leadership->description; ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/leadership/leadership/show.blade.php ENDPATH**/ ?>