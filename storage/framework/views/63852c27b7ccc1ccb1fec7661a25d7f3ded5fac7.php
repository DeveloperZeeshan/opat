<?php $__env->startPush('css'); ?>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
    <link href="<?php echo e(asset('plugins/components/calendar/dist/fullcalendar.css')); ?>" rel="stylesheet" />        
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>             
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <h1 align="center">Consumer Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="white-box bg-primary color-box">
                    <h1 class="text-white font-light">000 <span class="font-14">Transport</span></h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="white-box bg-success color-box">
                    <h1 class="text-white font-light">000 <span class="font-14">Medications</span></h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="white-box bg-danger color-box">
                    <h1 class="text-white font-light">000 <span class="font-14">Progress Report</span></h1>
                </div>
            </div>
            
        </div>            
    </div>
    <div class="row"> 
        <div class="col-md-12">
            <div class="white-box">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/db1.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/calendar/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/calendar/dist/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/calendar/dist/jquery.fullcalendar.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/dashboard/index.blade.php ENDPATH**/ ?>