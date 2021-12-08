

<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-4 control-label"><?php echo e('Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e($package->name??''); ?>" required>
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>" >
    <label for="price" class="col-md-4 control-label"><?php echo e('Price'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="number" id="price" value="<?php echo e($package->price??''); ?>" required  min="0">
        <?php echo $errors->first('price', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-4 control-label"><?php echo e('Description'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required ><?php echo $package->description??''; ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('logo') ? 'has-error' : ''); ?>">
    <label for="logo" class="col-md-4 control-label"><?php echo e('Logo'); ?></label>
    <?php echo $__env->make('includes.image_or_logo_file',['file'=>$package->logo??""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<!-- <div class="form-group <?php echo e($errors->has('beds') ? 'has-error' : ''); ?>">
    <label for="beds" class="col-md-4 control-label"><?php echo e('Beds'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="beds" type="number" id="beds" value="<?php echo e($package->beds??''); ?>" required  min="0" >
        <?php echo $errors->first('beds', '<p class="help-block">:message</p>'); ?>

    </div>
</div> -->

<div class="form-group <?php echo e($errors->has('managers') ? 'has-error' : ''); ?>">
    <label for="managers" class="col-md-4 control-label"><?php echo e('Managers'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="managers" type="number" id="managers" value="<?php echo e($package->managers??''); ?>" required  min="0">
        <?php echo $errors->first('managers', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('caretakers') ? 'has-error' : ''); ?>">
    <label for="caretakers" class="col-md-4 control-label"><?php echo e('Caretakers'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="caretakers" type="number" id="caretakers" value="<?php echo e($package->caretakers??''); ?>" required  min="0">
        <?php echo $errors->first('caretakers', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<input class="form-control" name="lms_access" type="hidden" id="lms_access" value="<?php echo e($package->lms_access??''); ?>" >
<!-- <div class="form-group <?php echo e($errors->has('lms_access') ? 'has-error' : ''); ?>">
    <label for="lms_access" class="col-md-4 control-label"><?php echo e('LMS Access'); ?></label>
    <div class="col-md-6">
        <?php echo $errors->first('lms_access', '<p class="help-block">:message</p>'); ?>

    </div>
</div> -->


<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$package->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/package/package/form.blade.php ENDPATH**/ ?>