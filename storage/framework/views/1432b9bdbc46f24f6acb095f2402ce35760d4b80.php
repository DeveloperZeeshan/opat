<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="image" class="col-md-4 control-label"><?php echo e('Image'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="file" id="image" value="<?php echo e($newsandevent->image??''); ?>" onchange="PreviewImage_1();">
        <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

         <img src="<?php echo e(asset('website')); ?>/<?php echo e($newsandevent->image??''); ?>" id="imagePreview_1" width="100" height="100">
    </div>
</div><div class="form-group <?php echo e($errors->has('date') ? 'has-error' : ''); ?>">
    <label for="date" class="col-md-4 control-label"><?php echo e('Date'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="text" id="date" value="<?php echo e($newsandevent->date??''); ?>" >
        <?php echo $errors->first('date', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('event_title') ? 'has-error' : ''); ?>">
    <label for="event_title" class="col-md-4 control-label"><?php echo e('Event Title'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="event_title" type="text" id="event_title" value="<?php echo e($newsandevent->event_title??''); ?>" >
        <?php echo $errors->first('event_title', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="col-md-4 control-label"><?php echo e('Title'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="<?php echo e($newsandevent->title??''); ?>" >
        <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-4 control-label"><?php echo e('Description'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e($newsandevent->description??''); ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

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
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/newsAndEvent/news-and-event/form.blade.php ENDPATH**/ ?>