



<div class="form-group <?php echo e($errors->has('facility_id') ? 'has-error' : ''); ?>">
    <label for="facility_id" class="col-md-4 control-label"><?php echo e('Facility'); ?></label>
    <div class="col-md-6">
        <select class="form-control" name="facility_id" required>
            <option selected disabled value="">Select Facility</option>
            <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($facility->id); ?>" <?php if(isset($caretaker->facility_id) && $facility->id == $caretaker->facility_id ): ?> selected   <?php endif; ?>><?php echo e($facility->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <!-- <input class="form-control" name="facility_id" type="text" id="facility_id" value="<?php echo e($caretaker->getFacilityDetail->name??''); ?>" required> -->
        <?php echo $errors->first('facility_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('full_name') ? 'has-error' : ''); ?>">
    <label for="full_name" class="col-md-4 control-label"><?php echo e('Full Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="full_name" type="text" id="full_name" value="<?php echo e($caretaker->getUserDetail->name??''); ?>" required>
        <?php echo $errors->first('full_name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="col-md-4 control-label"><?php echo e('Email'); ?></label>
    <div class="col-md-6">
        <input class="form-control email" name="email" type="text" id="email" value="<?php echo e($caretaker->getUserDetail->email??''); ?>" required>
        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php if($action != 'edit'): ?>
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="col-md-4 control-label"><?php echo e('Password'); ?></label>
    <div class="col-md-6">
        <input class="form-control password" name="password" type="text" id="password" value="<?php echo e($caretaker->getUserDetail->password??''); ?>" required>
        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

    </div>
    <span id="pass_message"></span>
</div>
<?php endif; ?>
<div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
    <label for="phone" class="col-md-4 control-label"><?php echo e('Phone'); ?></label>
    <div class="col-md-6">
        <input class="form-control phone" name="phone" id="phone" value="<?php echo e($caretaker->getUserDetail->profile->phone??''); ?>"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel" >
        <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('nation_id_card') ? 'has-error' : ''); ?>">
    <label for="nation_id_card" class="col-md-4 control-label"><?php echo e('Social Security Number'); ?></label>
    <div class="col-md-6">
        <input class="form-control nationalIdCard" name="nation_id_card" type="text" id="nation_id_card" value="<?php echo e($caretaker->getUserDetail->profile->nation_id_card??''); ?>" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
        <?php echo $errors->first('nation_id_card', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>">
    <label for="dob" class="col-md-4 control-label"><?php echo e('Date of Birth'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="dob" type="date" max="<?php echo e(Date('Y-m-d', strtotime('+1 day'))); ?>" id="dob" value="<?php echo e($caretaker->getUserDetail->profile->dob??''); ?>" >
        <?php echo $errors->first('dob', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
    <label for="address" class="col-md-4 control-label"><?php echo e('Address'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="<?php echo e($caretaker->getUserDetail->profile->address??''); ?>" required>
        <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
    <label for="country" class="col-md-4 control-label"><?php echo e('Country'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="country" type="text" id="country" value="<?php echo e($caretaker->getUserDetail->profile->country??''); ?>" >
        <?php echo $errors->first('country', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
    <label for="city" class="col-md-4 control-label"><?php echo e('City'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="<?php echo e($caretaker->getUserDetail->profile->city??''); ?>" >
        <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('postal') ? 'has-error' : ''); ?>">
    <label for="postal" class="col-md-4 control-label"><?php echo e('Postal'); ?></label>
    <div class="col-md-6">
        <input class="form-control postal" name="postal" type="text" id="postal" value="<?php echo e($caretaker->getUserDetail->profile->postal??''); ?>" >
        <?php echo $errors->first('postal', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<!-- <div class="form-group <?php echo e($errors->has('pic') ? 'has-error' : ''); ?>">
    <label for="pic" class="col-md-4 control-label"><?php echo e('Picture'); ?></label>
   <?php echo $__env->make('includes.image_file',['file'=>$caretaker->getUserDetail->profile->pic??""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div> -->
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$caretaker->getUserDetail->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_btn" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>

<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/caretaker/caretaker/form.blade.php ENDPATH**/ ?>