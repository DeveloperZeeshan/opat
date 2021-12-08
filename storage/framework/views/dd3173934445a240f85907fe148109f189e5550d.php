<?php $__env->startPush('js'); ?>
<style>
    .Form_p1:before, .Form_p2:before, .Form_p3:before, .Form_p4:before, .Form_p5:before {
        color:white;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Resident #<?php echo e($consumer->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Consumer'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/consumer/consumer/'. $consumer->id)); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div style="text-align: center;">
                    <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                        <?php if(!auth()->user()->hasrole('caretaker')): ?>
                            <a title="Rent Payments" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="rent_payment">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Rent Payments+
                                </button>
                            </a>
                        <?php endif; ?>
                        <a title="Incident Reports" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="incident_report">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Incident Reports
                            </button>
                        </a>
                        <a title="Medications" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="medications">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Medications
                            </button>
                        </a>
                    </div>
                     <hr>

                    <form method="POST" action="<?php echo e(url('/consumer/consumer/' . $consumer->id)); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(method_field('PATCH')); ?>

                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('consumer.consumer.form', ['submitButtonText' => 'Update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
$(document).on('click','.check_consumer_detail',function(e){
            var consumer_id = $(this).attr('consumer_id');
            var type = $(this).attr('type');
            e.preventDefault(); 
            $.ajax({
                url: '<?php echo e(route("creat_consumer_detail_session")); ?>',
                type: "POST",
                data:{ 
                    _token:'<?php echo e(csrf_token()); ?>',consumer_id:consumer_id,type:type
                },
                dataType: 'json',
                success: function(data){
                    if (data.result=='ok') {


                        if(data.type=='rent_payment'){
                            window.location.href = "<?php echo e(url('rentPayment/rent-payment')); ?>";
                        }else if(data.type=='incident_report'){
                            window.location.href = "<?php echo e(url('incidentReport/incident-report')); ?>";
                        }else if(data.type=='medications'){
                            window.location.href = "<?php echo e(url('medication/medication')); ?>";
                        }
                    }
                }
            }); 

        });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/consumer/consumer/edit.blade.php ENDPATH**/ ?>