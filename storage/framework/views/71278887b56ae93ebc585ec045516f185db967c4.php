<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-4 control-label"><?php echo e('Name'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e($getquotenow->name??''); ?>" >
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('number') ? 'has-error' : ''); ?>">
    <label for="number" class="col-md-4 control-label"><?php echo e('Number'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="number" type="text" id="number" value="<?php echo e($getquotenow->number??''); ?>" >
        <?php echo $errors->first('number', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="col-md-4 control-label"><?php echo e('Email'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="<?php echo e($getquotenow->email??''); ?>" >
        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/getQuoteNow/get-quote-now/form.blade.php ENDPATH**/ ?>