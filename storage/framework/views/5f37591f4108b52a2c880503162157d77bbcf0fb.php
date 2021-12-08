<div class="col-md-6">
    <select class="form-control" name="status" id="status" required> 
    	<option value="1" <?php if(isset($status) && $status==1): ?> selected <?php endif; ?> >Active</option>
    	<option value="0" <?php if(isset($status) && $status==0): ?> selected <?php endif; ?> >In Active</option>
    </select>
    <!-- <input class="form-control" name="status" type="text" id="status" value="<?php echo e($package->status??''); ?>" > -->
    <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

</div><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/includes/status_dropdown.blade.php ENDPATH**/ ?>