<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<?php $__env->stopPush(); ?>
<div class="form-group <?php echo e($errors->has('consumer_name') ? 'has-error' : ''); ?>">
    <label for="consumer_name" class="col-md-4 control-label"><?php echo e('Resident'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="consumer_name" type="text" id="consumer_name" value="<?php echo e($consumer->getUserDetail->name??''); ?>" readonly >
        <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="<?php echo e($consumer->user_id??''); ?>">
        <?php echo $errors->first('consumer_name', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('eligibility') ? 'has-error' : ''); ?>">
    <label for="eligibility" class="col-md-4 control-label"><?php echo e('Eligibility'); ?></label>
    <div class="col-md-6">
        <select class="selectpicker" name="eligibility[]" id="eligibility" required multiple  data-live-search="true">
            <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($services->name); ?>" ><?php echo e($services->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo $errors->first('eligibility', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <div class="col-md-6">
        <?php echo $__env->make('includes.status_dropdown',['status'=>$facility->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php $__env->startPush('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>$('select').selectpicker();</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/socialServiceEligibility/social-service-eligibility/form.blade.php ENDPATH**/ ?>