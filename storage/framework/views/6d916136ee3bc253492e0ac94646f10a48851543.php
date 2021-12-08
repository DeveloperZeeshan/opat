<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Package <?php echo e($package->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Package'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/package/package')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($package->id); ?></td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> <?php echo e($package->name); ?> </td>
                            </tr>
                            <tr>
                                <th> Price </th>
                                <td> <?php echo e($package->price); ?> </td>
                            </tr>
                            <!-- <tr>
                                <th> Beds </th>
                                <td> <?php echo e($package->beds); ?> </td>
                            </tr> -->
                             <tr>
                                <th> Managers </th>
                                <td> <?php echo e($package->managers); ?> </td>
                            </tr>
                             <tr>
                                <th> Caretaker </th>
                                <td> <?php echo e($package->caretakers); ?> </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td > <?php echo $package->description; ?> </td>
                            </tr>
                            <tr>
                                <th> Logo </th>
                                <td> <img src="<?php echo e(asset('website/').'/'.$package->logo??'Not Available'); ?>" style="width: 100px;height: 100px" > </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/package/package/show.blade.php ENDPATH**/ ?>