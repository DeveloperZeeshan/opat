<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-4 control-label"><?php echo e('Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e($askaquestion->name??''); ?>" >
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="col-md-4 control-label"><?php echo e('Email'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="<?php echo e($askaquestion->email??''); ?>" >
        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
    <label for="question" class="col-md-4 control-label"><?php echo e('Question'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="question" type="textarea" id="question" ><?php echo e($askaquestion->question??''); ?></textarea>
        <?php echo $errors->first('question', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/askAQuestion/ask-a-question/form.blade.php ENDPATH**/ ?>