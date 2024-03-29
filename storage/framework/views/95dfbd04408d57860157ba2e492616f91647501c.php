<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="image" class="col-md-4 control-label"><?php echo e('Image'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="file" id="image" value="<?php echo e($providesyourcare->image??''); ?>" onchange="PreviewImage_1();">
         <img src="<?php echo e(asset('website')); ?>/<?php echo e($providesyourcare->image??''); ?>" id="imagePreview_1" width="100" height="100">
        <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('number') ? 'has-error' : ''); ?>">
    <label for="number" class="col-md-4 control-label"><?php echo e('Number'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="number" type="text" id="number" value="<?php echo e($providesyourcare->number??''); ?>" >
        <?php echo $errors->first('number', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-4 control-label"><?php echo e('Description'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e($providesyourcare->description??''); ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<!-- <div class="form-group <?php echo e($errors->has('heading') ? 'has-error' : ''); ?>">
    <label for="heading" class="col-md-4 control-label"><?php echo e('Heading'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="heading" type="text" id="heading" value="<?php echo e($providesyourcare->heading??''); ?>" >
        <?php echo $errors->first('heading', '<p class="help-block">:message</p>'); ?>

    </div>
</div> -->

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
   function PreviewImage_1() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image").files[0]);
                oFReader.onload = function (oFREvent) {
                document.getElementById("imagePreview_1").src = oFREvent.target.result;
                };
            };
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/providesYourCare/provides-your-care/form.blade.php ENDPATH**/ ?>