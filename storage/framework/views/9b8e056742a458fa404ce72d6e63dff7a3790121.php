<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">EducationLevel <?php echo e($educationlevel->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('EducationLevel'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/educationLevel/education-level')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($educationlevel->id); ?></td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> <?php echo e($educationlevel->name); ?> </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td> <?php echo $educationlevel->status_detail; ?> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/educationLevel/education-level/show.blade.php ENDPATH**/ ?>