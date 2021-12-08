<div class="form-group <?php echo e($errors->has('consumer_id') ? 'has-error' : ''); ?>">
    <label for="consumer_id" class="col-md-4 control-label"><?php echo e('Resident Name'); ?></label>
    <div class="col-md-6">
        <select class="form-control" name="consumer_id" required>
            <option <?php if(!isset($rentpayment->consumer_id)): ?> selected <?php endif; ?> disabled value="">Select Resident</option>
            <?php $__currentLoopData = $consumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($consumer->user_id); ?>" <?php if(isset($rentpayment->consumer_id) && $consumer->getUserDetail->id == $rentpayment->consumer_id): ?> selected <?php endif; ?> ><?php echo e($consumer->getUserDetail->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="<?php echo e($rentpayment->consumer_id??''); ?>" > -->
        <?php echo $errors->first('consumer_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('rent_date') ? 'has-error' : ''); ?>">
    <label for="rent_date" class="col-md-4 control-label"><?php echo e('Rent Date'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="rent_date" type="date" max="<?php echo e(Date('Y-m-d', strtotime('+1 day'))); ?>" id="rent_date" value="<?php echo e($rentpayment->rent_date??''); ?>" >
        <?php echo $errors->first('rent_date', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('bed_amount') ? 'has-error' : ''); ?>">
    <label for="bed_amount" class="col-md-4 control-label"><?php echo e('Bed Amount'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="bed_amount" type="number" id="bed_amount" value="<?php echo e($rentpayment->bed_amount??''); ?>" >
        <?php echo $errors->first('bed_amount', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('actual_amount') ? 'has-error' : ''); ?>">
    <label for="actual_amount" class="col-md-4 control-label"><?php echo e('Actual Amount'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="actual_amount" type="number" id="actual_amount" value="<?php echo e($rentpayment->actual_amount??''); ?>" >
        <?php echo $errors->first('actual_amount', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('recieved_amount') ? 'has-error' : ''); ?>">
    <label for="actual_amount" class="col-md-4 control-label"><?php echo e('Recieved Amount'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="recieved_amount" type="number" id="recieved_amount" value="<?php echo e($rentpayment->recieved_amount??''); ?>" >
        <?php echo $errors->first('recieved_amount', '<p class="help-block">:message</p>'); ?>

    </div>
</div>


    
    
        
        
    



<div class="form-group <?php echo e($errors->has('added_by') ? 'has-error' : ''); ?>">
    <label for="added_by" class="col-md-4 control-label"><?php echo e('Added By'); ?></label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="added_by" type="number" id="added_by" value="<?php echo e($rentpayment->added_by??''); ?>"> -->
        <input class="form-control"  type="text"  value="<?php echo e(Auth::user()->name??''); ?>" readonly>
        <input class="form-control" name="added_by" type="hidden" id="added_by" value="<?php echo e(Auth::user()->id??''); ?>" readonly>
        <?php echo $errors->first('added_by', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
        <?php echo $__env->make('includes.status_dropdown',['status'=>$rentpayment->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="<?php echo e($rentpayment->status??''); ?>" >
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/rentPayment/rent-payment/form.blade.php ENDPATH**/ ?>