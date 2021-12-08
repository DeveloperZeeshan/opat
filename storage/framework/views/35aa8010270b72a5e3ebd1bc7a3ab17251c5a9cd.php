<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<div class="form-group <?php echo e($errors->has('full_name') ? 'has-error' : ''); ?>">
    <label for="full_name" class="col-md-4 control-label"><?php echo e('Full Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="full_name" type="text" id="full_name" value="<?php echo e(old($manager->getUserDetail->name??' ')); ?>" required>
        <?php echo $errors->first('full_name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="col-md-4 control-label"><?php echo e('Email'); ?></label>
    <div class="col-md-6">
        <input class="form-control email" name="email" type="text" id="email" value="<?php echo e(old($manager->getUserDetail->email??' ')); ?>" required>
        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php if($action != 'edit'): ?>
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="col-md-4 control-label"><?php echo e('Password'); ?></label>
    <div class="col-md-6">
        <input class="form-control password" name="password" type="text" id="password" value="<?php echo e(old($manager->getUserDetail->password??' ')); ?>" required>
        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

        <span id="pass_message"></span>
    </div>
   
</div>
<?php endif; ?>
<div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
    <label for="phone" class="col-md-4 control-label"><?php echo e('Phone'); ?></label>
    <div class="col-md-6">
        <input class="form-control phone" name="phone" id="phone"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel"  placeholder="(xxx) xxx-xxxx" value="<?php echo e(old($manager->getProfileDetail->phone??' ')); ?>" required>
        <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="alert alert-info" style="display: none;"></div>
<div class="form-group <?php echo e($errors->has('nation_id_card') ? 'has-error' : ''); ?>">
    <label for="nation_id_card" class="col-md-4 control-label"><?php echo e('Social Security Number'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="nation_id_card" type="text" placeholder="xxx-xxx-xxx" id="nation_id_card" value="<?php echo e(old($manager->getProfileDetail->nation_id_card??' ')); ?>" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
        <?php echo $errors->first('nation_id_card', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>">
    <label for="dob" class="col-md-4 control-label"><?php echo e('Date Of Birth'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="dob" type="date" id="dob" value="<?php echo e(old($manager->getProfileDetail->dob??' ')); ?>" >
        <?php echo $errors->first('dob', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
    <label for="address" class="col-md-4 control-label"><?php echo e('Address'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="<?php echo e(old($manager->getProfileDetail->address??' ')); ?>" >
        <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
    <label for="country" class="col-md-4 control-label"><?php echo e('Country'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="country" type="text" id="country" value="<?php echo e(old($manager->getProfileDetail->country??' ')); ?>" >
        <?php echo $errors->first('country', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
    <label for="city" class="col-md-4 control-label"><?php echo e('City'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="<?php echo e(old($manager->getProfileDetail->city??'')); ?>" required>
        <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('postal') ? 'has-error' : ''); ?>">
    <label for="postal" class="col-md-4 control-label"><?php echo e('Postal'); ?></label>
    <div class="col-md-6">
        <input class="form-control postal" name="postal" type="text" id="postal" value="<?php echo e(old($manager->getProfileDetail->postal??' ')); ?>" required>
        <?php echo $errors->first('postal', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('pic') ? 'has-error' : ''); ?>">
    <label for="pic" class="col-md-4 control-label"><?php echo e('Picture'); ?></label>
   <?php echo $__env->make('includes.image_file',['file'=>$manager->getProfileDetail->pic??""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$manager->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_btn" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/manager/manager/form.blade.php ENDPATH**/ ?>