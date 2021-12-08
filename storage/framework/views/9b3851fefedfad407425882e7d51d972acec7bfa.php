<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Facility <?php echo e($facility->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Facility'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/facility/facility')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($facility->id); ?></td>
                            </tr>
                            <tr><th> Name </th><td> <?php echo e($facility->name); ?> </td></tr>
                            <tr><th> Address </th><td> <?php echo e($facility->address); ?> </td></tr>
                            <tr><th> City </th><td> <?php echo e($facility->city); ?> </td></tr>
                            <tr><th> State </th><td> <?php echo e($facility->state); ?> </td></tr>
                            <tr><th> Phone </th><td> <?php echo e($facility->phone); ?> </td></tr>
                            <tr><th> Fax </th><td> <?php echo e($facility->fax); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/facility/facility/show.blade.php ENDPATH**/ ?>