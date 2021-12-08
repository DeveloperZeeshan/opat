<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Cognitive Psycological <?php echo e($cognitivepsycological->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CognitivePsycological'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/cognitivePsycological/cognitive-psycological')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($cognitivepsycological->id); ?></td>
                            </tr>
                            <tr> <th>Resident</th>
                                <td><?php echo e($cognitivepsycological->consumer_name); ?></td></tr>
                            <tr><th> Memory Problem </th><td> <?php echo e($cognitivepsycological->memory_problem); ?> </td></tr><tr><th> Perception </th><td> <?php echo e($cognitivepsycological->perception); ?> </td></tr><tr><th> Language </th><td> <?php echo e($cognitivepsycological->language); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/cognitivePsycological/cognitive-psycological/show.blade.php ENDPATH**/ ?>