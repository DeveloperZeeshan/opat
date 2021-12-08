<div class="col-md-6">
    <input class="form-control" name="image" type="file" id="image" required>
    <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

	<?php if(!$file==""): ?>
    	<img src="<?php echo e(asset('website/').'/'.$file??'Not Available'); ?>" style="width: 100px;height: 100px" >
	<?php endif; ?>
</div><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/includes/image_file.blade.php ENDPATH**/ ?>