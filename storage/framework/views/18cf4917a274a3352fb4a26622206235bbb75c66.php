<div class="form-group <?php echo e($errors->has('consumer_id') ? 'has-error' : ''); ?>">
    <label for="consumer_id" class="col-md-4 control-label"><?php echo e('Resident Id'); ?></label>
    <div class="col-md-6">

        <select class="form-control" name="consumer_id" required>
            <option <?php if(!isset($medication->consumer_id)): ?> selected <?php endif; ?> disabled value="">Select Resident</option>
            <?php $__currentLoopData = $consumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($consumer->user_id); ?>" <?php if(isset($medication->consumer_id) && $consumer->getUserDetail->id == $medication->consumer_id): ?> selected <?php endif; ?> ><?php echo e($consumer->getUserDetail->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="<?php echo e($medication->consumer_id??''); ?>" > -->
        <?php echo $errors->first('consumer_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('medication') ? 'has-error' : ''); ?>">
    <label for="medication" class="col-md-4 control-label"><?php echo e('Medication'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="medication" type="textarea" id="medication" ><?php echo e($medication->medication??''); ?></textarea>
        <?php echo $errors->first('medication', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('frequency_taken') ? 'has-error' : ''); ?>">
    <label for="frequency_taken" class="col-md-4 control-label"><?php echo e('Frequency Taken'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="frequency_taken" type="text" id="frequency_taken" value="<?php echo e($medication->frequency_taken??''); ?>" >
        <?php echo $errors->first('frequency_taken', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('start_date') ? 'has-error' : ''); ?>">
    <label for="start_date" class="col-md-4 control-label"><?php echo e('Start Date'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="start_date" type="date"  id="start_date" value="<?php echo e($medication->start_date??''); ?>" >
        <?php echo $errors->first('start_date', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('end_date') ? 'has-error' : ''); ?>">
    <label for="end_date" class="col-md-4 control-label"><?php echo e('End Date'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="end_date" type="date"  id="end_date" value="<?php echo e($medication->end_date??''); ?>" >
        <?php echo $errors->first('end_date', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('added_by') ? 'has-error' : ''); ?>">
    <label for="added_by" class="col-md-4 control-label"><?php echo e('Added By'); ?></label>
    <div class="col-md-6">
        <input class="form-control"  type="text"  value="<?php echo e(Auth::user()->name??''); ?>" readonly>
        <input class="form-control" name="added_by" type="hidden" id="added_by" value="<?php echo e(Auth::user()->id??''); ?>" readonly>

        <!-- <input class="form-control" name="added_by" type="text" id="added_by" value="<?php echo e($medication->added_by??''); ?>" > -->
        <?php echo $errors->first('added_by', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/medication/medication/form.blade.php ENDPATH**/ ?>