<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-4 control-label"><?php echo e('Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e($educationlevel->name??''); ?>" >
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$educationlevel->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="<?php echo e($educationlevel->status??''); ?>" >
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/educationLevel/education-level/form.blade.php ENDPATH**/ ?>