<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Manager <?php echo e(@$manager->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Manager'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/manager/manager')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($manager->id??"Not Available"); ?></td>
                            </tr>
                            <tr>
                                <th> Full Name </th>
                                <td> <?php echo e($manager->getUserDetail->name??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> <?php echo e($manager->getUserDetail->email??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Phone </th>
                                <td> <?php echo e($manager->getUserDetail->profile->phone??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Date of Birth </th>
                                <td> <?php echo e($manager->getUserDetail->profile->dob??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Social Security Number </th>
                                <td> <?php echo e($manager->getUserDetail->profile->nation_id_card??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Country </th>
                                <td> <?php echo e($manager->getUserDetail->profile->country??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> City </th>
                                <td> <?php echo e($manager->getUserDetail->profile->city??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img src="<?php echo e(asset('website/').'/'. $manager->getUserDetail->profile->pic??'Not Available'); ?>" style="width: 100px;height: 100px" ></td>
                            </tr>
                            <tr>
                                <th> Company </th>
                                <td> <?php echo e($manager->getUserDetail->profile->company_name??"Not Available"); ?> </td>
                            </tr>
                            <tr>
                                <th> Package </th>
                                <td>  <?php echo e($manager->getPackageDetails->name??"Not Available"); ?></td>
                            </tr>
                            <tr>
                                <th> Address </th>
                                <td> <?php echo e($manager->getUserDetail->profile->address??"Not Available"); ?> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/manager/manager/show.blade.php ENDPATH**/ ?>