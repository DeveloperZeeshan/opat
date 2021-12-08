<?php $__env->startPush('css'); ?>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
        .icoleaf {background-color:  #0F4C82 !important;}

        .text-blue {
            color: #0F4C82 !important;
        }

        .white-box.bg-success.color-box {
            background-color: #C45E1E !important;
        }


        .container-fluid .row:last-child .col-md-4:nth-child(2) {
        }

        .container-fluid .row:last-child .col-md-4:nth-child(2) .white-box {
            background-color: #D9CBB1 !important;
        }

        .container-fluid .row:last-child .col-md-4:last-child .white-box {
            background-color: #8D8F8E !important;
        }
        .container-fluid .row:last-child .col-md-4:last-child .white-box {
            background-color: #8D8F8E !important;
        }
        .taxt-blue {
            color: #0f4c82 !important;
        }

        .label-success, .label-danger {
            background-color: #D9CBB1 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
         <div class="row m-0">
            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf text-white"><i
                                    class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count taxt-blue"><?php echo e($company??0); ?></h3>
                        <p class="info-text font-12">Companies</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">Active Companies<span class="label label-rounded label-success"><?php echo e($companyactive??0); ?></span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf text-white"><i class="mdi mdi-comment-text-outline"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count taxt-blue"><?php echo e($users??0); ?></h3>
                        <p class="info-text font-12">Users</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">Active Users<span
                                    class="label label-rounded label-danger"><?php echo e($activeusers??0); ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf text-white"><i class="mdi mdi-coin"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count taxt-blue">&#36;<?php echo e($recievedAmount??0); ?></h3>
                        <p class="info-text font-12">Earning</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">Pending<span class="taxt-blue font-semibold"> &#36;<?php echo e($dueAmount??0); ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-box b-r-0">
                <div class="media">
                    <div class="media-left p-r-5">
                        <div id="earning" class="e" data-percent="60">
                            <div id="pending" class="p" data-percent="55"></div>
                            <div id="booking" class="b" data-percent="50"></div>
                        </div>
                    </div>
                    <div class="media-body">
                        <h2 class="taxt-blue font-22 m-t-0">Report</h2>
                        <ul class="p-0 m-b-20">
                            <li><i class="fa fa-circle m-r-5 text-primary"></i>60% Earnings</li>
                            <li><i class="fa fa-circle m-r-5 text-primary"></i>55% Pending</li>
                            <li><i class="fa fa-circle m-r-5 text-info"></i>50% Bookings</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Admin Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light"><?php echo e($managersCount??0); ?> <span class="font-14">Managers</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light"><?php echo e($caretakerCount??0); ?> <span class="font-14">Caretakers</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light"><?php echo e($consumerCount??0); ?> <span class="font-14">Residents</span></h1>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light"><?php echo e($packagesCount??0); ?> <span class="font-14">Packages</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light"><?php echo e($feedbackCount??0); ?> <span class="font-14">Feedback</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light">0 <span class="font-14">News Letter</span></h1>
                    </div>
                </div>
                
            </div>
<!--             <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>
                
            </div> -->
            
            
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/db1.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/dashboard/website_admin_dashboard.blade.php ENDPATH**/ ?>