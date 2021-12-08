<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="col-md-4 control-label"><?php echo e('Title'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="<?php echo e($page->title??''); ?>" >
        <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-4 control-label"><?php echo e('Description'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e($page->description??''); ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/page/page/form.blade.php ENDPATH**/ ?>