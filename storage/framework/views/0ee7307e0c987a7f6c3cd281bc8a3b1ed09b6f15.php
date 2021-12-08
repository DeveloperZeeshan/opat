<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">JobRequest <?php echo e($jobrequest->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('JobRequest'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/jobRequest/job-request')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                               <!--  <th>ID</th>
                                <td><?php echo e($jobrequest->id); ?></td> -->
                            </tr>
                            <tr><th> Name </th>
                                <td> <?php echo e($jobrequest->name); ?> </td>
                            </tr>
                            <tr><th> Email </th><td> <?php echo e($jobrequest->email); ?> </td>
                            </tr>
                            <!-- <tr><th> Job Id </th><td> <?php echo e($jobrequest->job_id); ?> </td>
                            </tr> -->
                            <tr>
                                <th> Job </th>
                                <td> <?php echo e($jobrequest->getJobDetail->title??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td> <?php echo $jobrequest->status_detail; ?> </td>
                            </tr>
                            <tr>
                                <th> Attachment Download</th>
                                <td>  <a href="<?php echo e(asset('website').'/'.$jobrequest->attachment??"Not Available"); ?> ">Download File</a> </td>
                            </tr>
                           <!--  <tr>
                                <th> Attachment View</th>
                                <td> <iframe src="<?php echo e(asset('website').'/'.$jobrequest->attachment??"Not Available"); ?>" style="width: 95%;height: 330px"></iframe> </td>
                            </tr> -->
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/jobRequest/job-request/show.blade.php ENDPATH**/ ?>