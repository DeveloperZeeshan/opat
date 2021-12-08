<?php $__env->startPush('css'); ?>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Company Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="<?php echo e(url('/manager/manager')); ?>">
                                <div class="white-box small-box-widget">
                                    <ul class="list-inline row">
                                        <li class="col-xs-3 p-t-10">
                                            <div class="icon-box bg-primary">
                                                <?php echo e($managersCount??0); ?>

                                                <!-- <i class="icon-bag"></i> -->
                                            </div>
                                        </li>
                                        <li class="col-xs-9 p-l-20">
                                            <h4>Managers</h4>
                                            <div class="ct-sales-chart"></div>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(url('/facility/facility')); ?>">                            
                                <div class="white-box small-box-widget">
                                    <ul class="list-inline row">
                                        <li class="col-xs-3 p-t-10">
                                            <div class="icon-box bg-success">
                                                <?php echo e($facilityCount??0); ?>

                                                <!-- <i class="icon-user"></i> -->
                                            </div>
                                        </li>
                                        <li class="col-xs-9 p-l-20">
                                            <h4>Facilities</h4>
                                            <div class="ct-uq-chart chart-pos"></div>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(url('/caretaker/caretaker')); ?>">
                                <div class="white-box small-box-widget">
                                        <div class="p-t-10 p-b-10">
                                            <div class="icon-box bg-warning">
                                                <?php echo e($caretakerCount??0); ?>

                                                <!-- <i class="icon-refresh"></i> -->
                                            </div>
                                            <div class="detail-box">
                                                <h4>Caretakers <span class="pull-right text-warning font-22 font-normal"><?php echo e($caretakerCount??0); ?>%</span>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                         aria-valuenow="<?php echo e($caretakerCount??0); ?>" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: <?php echo e($caretakerCount??0); ?>%">
                                                        <span class="sr-only"><?php echo e($caretakerCount??0); ?>% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(url('/consumer/consumer')); ?>">
                                <div class="white-box small-box-widget">
                                    <div class="p-t-10 p-b-10">
                                        <div class="icon-box bg-danger">
                                            <!-- <i class="icon-cloud-download"></i> -->
                                            <?php echo e($consumerCount??0); ?>

                                        </div>
                                        <div class="detail-box">
                                            <h4>Consumers<span class="pull-right text-danger font-22 font-normal"><?php echo e($consumerCount??0); ?>%</span>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                     aria-valuenow="<?php echo e($consumerCount??0); ?>" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: <?php echo e($consumerCount??0); ?>%">
                                                    <span class="sr-only"><?php echo e($consumerCount??0); ?>% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box circle-chart-widget">
                        <div class="circle-chart">
                            <div class="c1">
                                <input class="knob" data-min="0" data-max="100" data-bgColor="#e4edef"
                                       data-fgColor="#0283cc" data-displayInput=false data-width="182" data-height="182"
                                       data-thickness=".05" data-linecap=round value="58" readonly>
                            </div>
                            <div class="c2">
                                <input class="knob" data-min="0" data-max="100" data-bgColor="#e4edef"
                                       data-fgColor="#e74a25" data-displayInput=false data-width="154" data-height="154"
                                       data-thickness=".05" data-linecap=round value="45" readonly>
                            </div>
                            <div class="c3">
                                <input class="knob" data-min="0" data-max="100" data-bgColor="#e4edef"
                                       data-fgColor="#00bbd9" data-displayInput=false data-width="125" data-height="125"
                                       data-thickness=".05" data-linecap=round value="32" readonly>
                            </div>
                            <div class="chart-overlap"><i class="icon-user"></i></div>
                        </div>
                        <ul class="list-inline m-b-0 m-t-30 t-a-c">
                            <li>
                                <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>58%</h6>
                            </li>
                            <li>
                                <h6 class="font-15"><i class="fa fa-circle m-r-5 text-danger"></i>45%</h6>
                            </li>
                            <li>
                                <h6 class="font-15"><i class="fa fa-circle m-r-5 text-info"></i>32%</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<!--             <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Company Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="<?php echo e(url('/manager/manager')); ?>">                   
                        <div class="white-box bg-primary color-box">
                            <h1 class="text-white font-light">000 <span class="font-14">Managers</span></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="<?php echo e(url('/caretaker/caretaker')); ?>">                   
                        <div class="white-box bg-success color-box">
                            <h1 class="text-white font-light">000 <span class="font-14">Caretakers</span></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="<?php echo e(url('/consumer/consumer')); ?>">                       
                        <div class="white-box bg-danger color-box">
                            <h1 class="text-white font-light">000 <span class="font-14">Consumers</span></h1>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="<?php echo e(url('/facility/facility')); ?>">                       
                        <div class="white-box bg-success color-box" style="background-color: #18FFFF !important">
                            <h1 class="text-white font-light">000 <span class="font-14">Facalities</span></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12">                    
                    <a href="<?php echo e(url('/feedback/feedback')); ?>">                       
                        <div class="white-box bg-primary color-box" style="background-color: #00838F !important">
                            <h1 class="text-white font-light">000 <span class="font-14">Feedback</span></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box" style="background-color: #607D8B !important">
                <h1 class="text-white font-light">000 <span class="font-14">News Letter</span></h1>
                    </div>
                </div>
                
            </div> -->
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
            
            
        <!-- </div> -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/db1.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/dashboard/company_dashboard.blade.php ENDPATH**/ ?>