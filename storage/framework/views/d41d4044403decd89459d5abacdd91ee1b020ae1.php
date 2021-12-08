<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Job <?php echo e($job->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Job'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/job/job')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <!-- <th>ID</th> -->
                                <!-- <td><?php echo e($job->id); ?></td> -->
                            </tr>
                            <tr><th> Title </th><td> <?php echo e($job->title); ?> </td></tr><tr><th> Location </th><td> <?php echo e($job->location); ?> </td></tr><tr><th> Description </th><td> <?php echo e($job->description); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/job/job/show.blade.php ENDPATH**/ ?>