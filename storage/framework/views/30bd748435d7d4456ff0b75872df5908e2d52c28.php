<?php if(isset(auth()->user()->getCompanyDetail->id)): ?>
    <input type="hidden" name="company_id" id="company_id" value="<?php echo e(auth()->user()->getCompanyDetail->id); ?>">
<?php else: ?>
    <input type="hidden" name="company_id" id="company_id" value="<?php echo e(auth()->user()->getManagerDetail->id); ?>">
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-4 control-label"><?php echo e('Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e($facility->name??''); ?>" required readonly>
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
    <label for="address" class="col-md-4 control-label"><?php echo e('Address'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="address" type="textarea" id="address" required><?php echo e($facility->address??''); ?></textarea>
        <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
    <label for="city" class="col-md-4 control-label"><?php echo e('City'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="<?php echo e($facility->city??''); ?>" >
        <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
    <label for="state" class="col-md-4 control-label"><?php echo e('State'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="state" type="text" id="state" value="<?php echo e($facility->state??''); ?>" >
        <?php echo $errors->first('state', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('zip_code') ? 'has-error' : ''); ?>">
    <label for="zip_code" class="col-md-4 control-label"><?php echo e('Zip Code'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="zip_code" type="text" id="zip_code" value="<?php echo e($facility->zip_code??''); ?>" >
        <?php echo $errors->first('zip_code', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
 <div class="form-group <?php echo e($errors->has('number_of_beds') ? 'has-error' : ''); ?>">
    <label for="number_of_beds" class="col-md-4 control-label"><?php echo e('Total number Of beds'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="number_of_beds" type="number" id="number_of_beds" value="<?php echo e($facility->number_of_beds??''); ?>" required>
        <?php echo $errors->first('number_of_beds', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

    
    
        
        
    

<div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
    <label for="phone" class="col-md-4 control-label"><?php echo e('Phone'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="phone" type="text" id="phone" value="<?php echo e($facility->phone??''); ?>" >
        <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('fax') ? 'has-error' : ''); ?>">
    <label for="fax" class="col-md-4 control-label"><?php echo e('Fax'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="fax" type="text" id="fax" value="<?php echo e($facility->fax??''); ?>" >
        <?php echo $errors->first('fax', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$facility->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--     <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="<?php echo e($facility->status??''); ?>" >
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/facility/facility/form.blade.php ENDPATH**/ ?>