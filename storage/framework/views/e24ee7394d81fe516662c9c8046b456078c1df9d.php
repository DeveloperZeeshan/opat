<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">UserAssessment <?php echo e($userassessment->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('UserAssessment'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/userAssessment/user-assessment')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($userassessment->id); ?></td>
                            </tr>
                            <tr><th> Name </th><td> <?php echo e($userassessment->name); ?> </td></tr><tr><th> Email </th><td> <?php echo e($userassessment->email); ?> </td></tr><tr><th> Answer </th><td> <?php echo e($userassessment->answer); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/userAssessment/user-assessment/show.blade.php ENDPATH**/ ?>