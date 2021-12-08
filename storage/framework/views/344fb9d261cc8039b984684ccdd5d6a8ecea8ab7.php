<div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
    <label for="question" class="col-md-4 control-label"><?php echo e('Question'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="question" type="text" id="question" value="<?php echo e($faq->question??''); ?>" >
        <?php echo $errors->first('question', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-4 control-label"><?php echo e('Description'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e($faq->description??''); ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/fAQ/f-a-q/form.blade.php ENDPATH**/ ?>