<div class="form-group <?php echo e($errors->has('memory_problem') ? 'has-error' : ''); ?>">
    <label for="memory_problem" class="col-md-4 control-label"><?php echo e('Resident'); ?></label>
    <div class="col-md-6">
        <input class="form-control" rows="5" name="consumer_id" type="hidden" id="consumer_id" value="<?php echo e($consumer->id??''); ?>">
        <input class="form-control" rows="5" name="consumer_name" type="text" id="consumer_name" value="<?php echo e($consumer->getUserDetail->name??''); ?>" readonly>
        <?php echo $errors->first('memory_problem', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('memory_problem') ? 'has-error' : ''); ?>">
    <label for="memory_problem" class="col-md-4 control-label"><?php echo e('Memory Problem'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="memory_problem" type="textarea" id="memory_problem" ><?php echo e($cognitivepsycological->memory_problem??''); ?></textarea>
        <?php echo $errors->first('memory_problem', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('perception') ? 'has-error' : ''); ?>">
    <label for="perception" class="col-md-4 control-label"><?php echo e('Perception'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="perception" type="textarea" id="perception" ><?php echo e($cognitivepsycological->perception??''); ?></textarea>
        <?php echo $errors->first('perception', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('language') ? 'has-error' : ''); ?>">
    <label for="language" class="col-md-4 control-label"><?php echo e('Language'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="language" type="textarea" id="language" ><?php echo e($cognitivepsycological->language??''); ?></textarea>
        <?php echo $errors->first('language', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('critical_thinking') ? 'has-error' : ''); ?>">
    <label for="critical_thinking" class="col-md-4 control-label"><?php echo e('Critical Thinking'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="critical_thinking" type="textarea" id="critical_thinking" ><?php echo e($cognitivepsycological->critical_thinking??''); ?></textarea>
        <?php echo $errors->first('critical_thinking', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$cognitivepsycological->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--     <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="<?php echo e($facility->status??''); ?>" >
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

            </div> -->
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/cognitivePsycological/cognitive-psycological/form.blade.php ENDPATH**/ ?>