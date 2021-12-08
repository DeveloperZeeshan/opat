<div class="form-group <?php echo e($errors->has('lecture') ? 'has-error' : ''); ?>">
    <label for="lecture" class="col-md-4 control-label"><?php echo e('Lecture'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="lecture" type="text" id="lecture" value="<?php echo e($learningmanagement->lecture??''); ?>" >
        <?php echo $errors->first('lecture', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php if(isset($learningmanagement->upload_file)): ?>
    <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="upload_file" class="col-md-4 control-label"><?php echo e('Upload File'); ?></label>
    <div class="col-md-6">
         <input class="form-control" name="upload_file" type="file" id="upload_file" aaccept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" value="<?php echo e($learningmanagement->upload_file??''); ?>">
        <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php else: ?>
<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="upload_file" class="col-md-4 control-label"><?php echo e('Upload File'); ?></label>
    <div class="col-md-6">
         <input class="form-control" name="upload_file" type="file" id="upload_file"  accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" value="">
        <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php endif; ?>
<?php if(isset($learningmanagement->upload_video)): ?>
<div class="form-group <?php echo e($errors->has('upload_video') ? 'has-error' : ''); ?>">
    <label for="upload_video" class="col-md-4 control-label"><?php echo e('Upload Video'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="upload_video" type="file" id="upload_video" accept="video/*" value="<?php echo e(asset('website/'.$learningmanagement->upload_video)); ?>" >
        <?php echo $errors->first('upload_video', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php else: ?>
<div class="form-group <?php echo e($errors->has('upload_video') ? 'has-error' : ''); ?>">
    <label for="upload_video" class="col-md-4 control-label"><?php echo e('Upload Video'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="upload_video" type="file" id="upload_video" accept="video/*" value="" >
        <?php echo $errors->first('upload_video', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <div class="col-md-6">
     <select id="status" name="status" class="form-control">                               
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
       
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>

<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/learningManagement/learning-management/form.blade.php ENDPATH**/ ?>