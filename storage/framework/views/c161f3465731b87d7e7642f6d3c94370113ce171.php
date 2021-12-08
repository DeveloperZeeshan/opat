<div class="form-group <?php echo e($errors->has('consumer_id') ? 'has-error' : ''); ?>">
    <label for="consumer_id" class="col-md-4 control-label"><?php echo e('Resident'); ?></label>
    <div class="col-md-6">
        <input class="form-control" type="text" name="consumer_name"  value="<?php echo e($consumer->getUserDetail->name); ?>" readonly>
        <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="<?php echo e($consumer->id); ?>" >
        <?php echo $errors->first('consumer_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('pickup') ? 'has-error' : ''); ?>">
    <label for="pickup" class="col-md-4 control-label"><?php echo e('Pickup'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="pickup" type="text" id="pickup" value="<?php echo e($transporttracker->pickup??''); ?>" onkeypress="return event.keyCode != 13;">
        <?php echo $errors->first('pickup', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('drop_off') ? 'has-error' : ''); ?>">
    <label for="drop_off" class="col-md-4 control-label"><?php echo e('Drop Off'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="drop_off" type="text" id="drop_off" value="<?php echo e($transporttracker->drop_off??''); ?>" onkeypress="return event.keyCode != 13;">
        <?php echo $errors->first('drop_off', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
       <a class="btn btn-success" class="form-control" id="calculate_milleage" >Calculate Milleage</a>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
<span style="color: red; text-align: center;" id="amount"></span>
 </div>
</div>
<!-- <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
    <label for="amount" class="col-md-4 control-label"><?php echo e('Milleage'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="amount" type="text" id="amount" value="" >
        <?php echo $errors->first('Milleage', '<p class="help-block">:message</p>'); ?>

    </div>
</div> -->

<!-- <div class="form-group <?php echo e($errors->has('distance') ? 'has-error' : ''); ?>">
    <label for="distance" class="col-md-4 control-label"><?php echo e('Distance'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="distance" type="text" id="distance" value="<?php echo e($transporttracker->distance??''); ?>" >
        <?php echo $errors->first('distance', '<p class="help-block">:message</p>'); ?>

    </div>
</div> -->
<div class="form-group <?php echo e($errors->has('added_by') ? 'has-error' : ''); ?>">
    <label for="added_by" class="col-md-4 control-label"><?php echo e('Added By'); ?></label>
    <div class="col-md-6">
        <input class="form-control"  type="text" value="<?php echo e(auth()->user()->name); ?>" readonly> 
        <input class="form-control" name="added_by" type="hidden" id="added_by" value="<?php echo e(auth()->user()->id); ?>" readonly>
        <?php echo $errors->first('added_by', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
    <label for="notes" class="col-md-4 control-label"><?php echo e('Notes'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" name="notes" id="notes" type="text"><?php echo e($transporttracker->notes??''); ?></textarea> 
        <?php echo $errors->first('notes', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('added_by') ? 'has-error' : ''); ?>">
    <label for="added_by" class="col-md-4 control-label"><?php echo e('Purpose of Visit'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="purpose" type="text" placeholder="Customer Visit" id="purpose" value="<?php echo e($transporttracker->purpose??''); ?>" maxlength="15">
        <?php echo $errors->first('purpose', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <div class="col-md-6">
     <select id="status" name="status" class="form-control">                               
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
       
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        function initAutocomplete() {
           new google.maps.places.Autocomplete((document.getElementById('pickup')),{types: ['geocode']});
           new google.maps.places.Autocomplete((document.getElementById('drop_off')),{types: ['geocode']});
        }

    $(document).on('click','#calculate_milleage',function(e){  
        var pickup =      $('#pickup').val();
        var drop_off =      $('#drop_off').val();
          $.ajax({
                url: "<?php echo e(route('calculate_milleage')); ?>/"+pickup+'/'+drop_off,
                method: "GET",
                success:function(data){
                  console.log(data.type);
                  if(data.type=='success'){
                    $('#amount').html("your calculated Milleage is" +''+data.responseText);
                  }else{
                    $('#amount').html('No Data Found');
                  }//end if
                }
          });
    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&libraries=places&callback=initAutocomplete"async defer></script>  

<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/transportTracker/transport-tracker/form.blade.php ENDPATH**/ ?>