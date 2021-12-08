<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Caretaker <?php echo e($caretaker->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Caretaker'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/caretaker/caretaker')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo e(@$caretaker->id); ?></td>
                                </tr>
                                <tr>
                                    <th> Full Name </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->name); ?> </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->email); ?> </td>
                                </tr>
                                <tr>
                                    <th> Phone </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->phone); ?> </td>
                                </tr>
                                <tr>
                                    <th> Date of Birth </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->dob); ?> </td>
                                </tr>
                                <tr>
                                    <th> Social Security Number </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->nation_id_card); ?> </td>
                                </tr>
                                <tr>
                                    <th> Country </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->country); ?> </td>
                                </tr>
                                <tr>
                                    <th> Address </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->address); ?> </td>
                                </tr>
                                <tr>
                                    <th> City </th>
                                    <td> <?php echo e(@$caretaker->getUserDetail->profile->city); ?> </td>
                                </tr>
                                <tr>
                                    <th> Image </th>
                                    <td> <img src="<?php echo e(asset('website/').'/'. $caretaker->getUserDetail->profile->pic??'Not Available'); ?>" style="width: 100px;height: 100px" ></td>
                                </tr>
                                <tr>
                                    <th> Company </th>
                                    <td> <?php echo e($caretaker->getCompanyDetail->getUserDetail->name); ?> </td>
                                </tr>
                                <tr>
                                    <th> Package </th>
                                    <td>  <?php echo e($caretaker->getPackageDetails->name); ?></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/caretaker/caretaker/show.blade.php ENDPATH**/ ?>