<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Finance <?php echo e($finance->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Finance'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/finance/finance')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($finance->id); ?></td>
                            </tr>
                            <tr><th> Name </th><td> <?php echo e($finance->name); ?> </td></tr><tr><th> Email </th><td> <?php echo e($finance->email); ?> </td></tr><tr><th> Phone </th><td> <?php echo e($finance->phone); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/finance/finance/show.blade.php ENDPATH**/ ?>