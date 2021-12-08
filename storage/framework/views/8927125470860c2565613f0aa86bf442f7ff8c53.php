<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">JobType <?php echo e($jobtype->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('JobType'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/jobType/job-type')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($jobtype->id); ?></td>
                            </tr>
                            <tr><th> Name </th><td> <?php echo e($jobtype->name); ?> </td></tr><tr><th> Status </th><td> <?php echo $jobtype->status_detail; ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/jobType/job-type/show.blade.php ENDPATH**/ ?>