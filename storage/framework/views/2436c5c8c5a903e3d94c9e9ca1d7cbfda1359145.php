<div class="form-group <?php echo e($errors->has('company_id') ? 'has-error' : ''); ?>">
    <label for="company_id" class="col-md-4 control-label"><?php echo e('Company'); ?></label>
    <div class="col-md-6">
        <input class="form-control" type="text"  value="<?php echo e($feedback->getUserDetail->name??Auth::user()->name??''); ?>" readonly >
        <input class="form-control" name="company_id" type="hidden" id="company_id" value="<?php echo e($feedback->company_id??Auth::user()->id??''); ?>" >
        <?php echo $errors->first('company_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
    <label for="message" class="col-md-4 control-label"><?php echo e('Message'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="message" type="textarea" id="message" ><?php echo e($feedback->message??''); ?></textarea>
        <?php echo $errors->first('message', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <div class="col-md-6">
        <?php echo $__env->make('includes.status_dropdown',['status'=>$feedback->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/fedback/feedback/form.blade.php ENDPATH**/ ?>