<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Feedback <?php echo e($feedback->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Feedback'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/feedback/feedback')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($feedback->id); ?></td>
                            </tr>
                            <tr><th> Company Id </th><td> <?php echo e($feedback->company_id); ?> </td></tr><tr><th> Message </th><td> <?php echo e($feedback->message); ?> </td></tr><tr><th> Status </th><td> <?php echo $feedback->status_detail; ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/fedback/feedback/show.blade.php ENDPATH**/ ?>