<style type="text/css">
    
    .Form_p1, .Form_p2,.Form_p3,.Form_p4, .Form_p5 {
    border: 2px solid;
    max-width: 55%;
    padding: 40px 5px;
    position: relative;
    margin: 0 auto;
    margin-bottom: 4%;
}

.Form_p1:before, .Form_p2:before, .Form_p3:before, .Form_p4:before, .Form_p5:before {content: '';border: 1px solid;padding: 10px 40px;text-transform: uppercase;font-weight: 800;background: #628d93;position: absolute;top: -20px;}

.Form_p1 .form-group , .Form_p2 .form-group {
    display: block !important;
}

.Form_p1:before {
    content: 'Personal Information';
}

.Form_p2:before {
    content: 'Project Information';
}
.Form_p3:before {
    content: 'Rent Information';
}
.Form_p4:before {
    content: 'General Information';
}

.Form_p5:before {
    content: 'Profile Information';
}

</style>



<div class="Form_p1" >
    <div class="form-group <?php echo e($errors->has('caretaker_id') ? 'has-error' : ''); ?>">
        <label for="caretaker_id" class="col-md-4 control-label"><?php echo e('Caretaker'); ?> <b style="color: red">*</b></label>
        <div class="col-md-6">
            <select name="caretaker_id" class="form-control" required id="caretaker_id">
                <option selected disabled value="">Select Caretaker</option>
                <?php $__currentLoopData = $caretakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caretaker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(isset($caretaker->getFacilityDetail)): ?> attr="<?php echo e($caretaker->getFacilityDetail->name??"Not Available"); ?>" <?php else: ?> attr='Not Available' <?php endif; ?> value="<?php echo e($caretaker->getUserDetail->id); ?>"><?php echo e($caretaker->getUserDetail->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!-- <input class="form-control" name="caretaker_id" type="text" id="caretaker_id" value="<?php echo e($consumer->getUserDetail->name??''); ?>" required> -->
            <?php echo $errors->first('caretaker_id', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('full_name') ? 'has-error' : ''); ?>">
        <label for="full_name" class="col-md-4 control-label"><?php echo e('Full Name'); ?> <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control" name="full_name" type="text" id="full_name" value="<?php echo e($consumer->getUserDetail->name??''); ?>" required>
            <?php echo $errors->first('full_name', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
        <label for="email" class="col-md-4 control-label"><?php echo e('Email'); ?> <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control email" name="email" type="text" id="email" value="<?php echo e($consumer->getUserDetail->email??''); ?>" required>
            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <?php if($action != 'edit'): ?>
    <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
        <label for="password" class="col-md-4 control-label"><?php echo e('Password'); ?> <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control password" name="password" type="password" id="password" value="<?php echo e($consumer->getUserDetail->password??''); ?>" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="position: absolute;right: 23px;top: 10px;color: black; font-size: 18px;cursor: pointer;"></span>
            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

        </div>
        <span id="pass_message"></span>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="facility" class="col-md-4 control-label"><?php echo e('Facility'); ?></label>
        <div class="col-md-6">
        <input class="form-control" type="hidden"  name="facility_id" id='facility_id' value="<?php echo e($caretaker->getFacilityDetail->id??''); ?>" >
        <input class="form-control" type="text" name="facility_name" id='facility_name' value="<?php echo e($caretaker->getFacilityDetail->name??''); ?>" readonly>
        </div>
    </div>
</div>


<div class="Form_p2" >
    <div class="form-group <?php echo e($errors->has('project_exit_date') ? 'has-error' : ''); ?>">
        <label for="project_exit_date" class="col-md-4 control-label"><?php echo e('Exit Date'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="project_exit_date" type="date" id="project_exit_date"  value="<?php echo e($consumer->getUserDetail->profile->project_exit_date??''); ?>" >
            <?php echo $errors->first('project_exit_date', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    
        
        
            
            
        
    
    <div class="form-group <?php echo e($errors->has('thirty_day_notice') ? 'has-error' : ''); ?>">
        <label for="thirty_day_notice" class="col-md-4 control-label"><?php echo e('30 Day Notice'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="thirty_day_notice" type="date" id="thirty_day_notice"  value="<?php echo e($consumer->getUserDetail->profile->thirty_day_notice??''); ?>" >
            <?php echo $errors->first('thirty_day_notice', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('extension_granted') ? 'has-error' : ''); ?>">
        <label for="extension_granted" class="col-md-4 control-label"><?php echo e('Extension Granted'); ?></label>
        <div class="col-md-6">
            
            <input class="" style="margin-top: 9px" name="extension_granted" type="checkbox" id="extension_granted" value="<?php echo e($consumer->getUserDetail->profile->extension_granted??''); ?>">
            <?php echo $errors->first('extension_granted', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('ninty_day_extension') ? 'has-error' : ''); ?>">
        <label for="ninty_day_extension" class="col-md-4 control-label"><?php echo e('90 Day Extension'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="ninty_day_extension" type="date"  id="ninty_day_extension" value="<?php echo e($consumer->getUserDetail->profile->ninty_day_extension??''); ?>" >
            <?php echo $errors->first('ninty_day_extension', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>    
</div>

<div class="Form_p3" >
    <div class="form-group <?php echo e($errors->has('monthly_rent_amount') ? 'has-error' : ''); ?>">
        <label for="monthly_rent_amount" class="col-md-4 control-label"><?php echo e('Monthly Rent Amount $'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="monthly_rent_amount" type="number" id="monthly_rent_amount" value="<?php echo e($consumer->getUserDetail->profile->monthly_rent_amount??''); ?>" >
            <?php echo $errors->first('monthly_rent_amount', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('entry_date') ? 'has-error' : ''); ?>">
        <label for="entry_date" class="col-md-4 control-label"><?php echo e('Entry Date'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="entry_date" type="date" max="<?php echo e(Date('Y-m-d', strtotime('+1 day'))); ?>" id="entry_date" value="<?php echo e($consumer->getUserDetail->profile->entry_date??''); ?>" >
            <?php echo $errors->first('entry_date', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('bed_hold_amount') ? 'has-error' : ''); ?>">
        <label for="bed_hold_amount" class="col-md-4 control-label"><?php echo e('Bed Hold Amount'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="bed_hold_amount" type="number" id="bed_hold_amount" value="<?php echo e($consumer->getUserDetail->profile->bed_hold_amount??''); ?>" >
            <?php echo $errors->first('bed_hold_amount', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('date_of_bedhold_reciept') ? 'has-error' : ''); ?>">
        <label for="date_of_bedhold_reciept" class="col-md-4 control-label"><?php echo e('Date of Bedhold Reciept'); ?> </label>
        <div class="col-md-6">
            <input class="form-control" name="date_of_bedhold_reciept" type="date" id="date_of_bedhold_reciept" value="<?php echo e($consumer->getUserDetail->profile->date_of_bedhold_reciept??''); ?>" required>
            <?php echo $errors->first('date_of_bedhold_reciept', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('rent_source_id') ? 'has-error' : ''); ?>">
        <label for="rent_source_id" class="col-md-4 control-label"><?php echo e('Rent Source'); ?></label>
        <div class="col-md-6">
        <input type="text" class="form-control" id="rent_source_id" name="rent_source_id" list="rent_source">
        <datalist id="rent_source">
            <?php $__currentLoopData = $rentSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rentSource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  <?php if(isset($rent_source_id) && $rent_source_id==$rentSource->id): ?> selected <?php endif; ?>><?php echo e($rentSource->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>
        </div>

        
            
                
                    
                
            
             
            
        
    </div>
    <div class="form-group <?php echo e($errors->has('mdoc_agent_id') ? 'has-error' : ''); ?>">
        <label for="mdoc_agent_id" class="col-md-4 control-label"><?php echo e('Care Agent'); ?></label>
        <div class="col-md-6">
            
                
                    
                
            
             <input class="form-control" name="mdoc_agent_id" type="text" id="mdoc_agent_id" value="<?php echo e($consumer->getUserDetail->profile->mdoc_agent_id??''); ?>" >
            <?php echo $errors->first('mdoc_agent_id', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('educationl_level_id') ? 'has-error' : ''); ?>">
        <label for="educationl_level_id" class="col-md-4 control-label"><?php echo e('Education Level'); ?></label>
        <div class="col-md-6">
            <select class="form-control" id="educationl_level_id" name="educationl_level_id">
                <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($educationLevel->id); ?>" <?php if(isset($educationl_level_id) && $educationl_level_id==$educationLevel->id): ?> selected <?php endif; ?>><?php echo e($educationLevel->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            <?php echo $errors->first('educationl_level_id', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('consumer_type_id') ? 'has-error' : ''); ?>">
        <label for="consumer_type_id" class="col-md-4 control-label"><?php echo e('Resident Type'); ?></label>
        <div class="col-md-6">
            <select class="form-control" id="consumer_type_id" name="consumer_type_id">
                <?php $__currentLoopData = $consumerTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumerType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($consumerType->id); ?>" <?php if(isset($consumer_type_id) && $consumer_type_id==$consumerType->id): ?> selected <?php endif; ?>><?php echo e($consumerType->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            <?php echo $errors->first('consumer_type_id', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
     <div class="form-group <?php echo e($errors->has('bridge_card_eligible') ? 'has-error' : ''); ?>">
        <label for="bridge_card_eligible" class="col-md-4 control-label"><?php echo e('Bridge Card Eligible'); ?></label>
        <div class="col-md-6">

            <input class=""  style="margin-top: 9px" name="bridge_card_eligible" type="checkbox" id="bridge_card_eligible"  >
            <?php echo $errors->first('Bridge Card Eligible', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

    <div class="form-group <?php echo e($errors->has('injury') ? 'has-error' : ''); ?>">
        <label for="injury" class="col-md-4 control-label"><?php echo e('Injury'); ?></label>
        <div class="col-md-6">
            <input class=""  style="margin-top: 9px" name="injury" type="checkbox" id="injury" value="<?php echo e($consumer->getUserDetail->profile->injury??''); ?>" >
            <?php echo $errors->first('injury', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
        <label for="notes" class="col-md-4 control-label"><?php echo e('Notes'); ?></label>
        <div class="col-md-6">
            <textarea class="form-control" name="notes" type="text" id="notes" value="<?php echo e($consumer->getUserDetail->profile->notes??''); ?>" > <?php echo e($consumer->getUserDetail->profile->notes??''); ?> </textarea>
            <?php echo $errors->first('notes', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    
</div>
<div class="Form_p4" >
    <div class="form-group <?php echo e($errors->has('nation_id_card') ? 'has-error' : ''); ?>">
        <label for="nation_id_card" class="col-md-4 control-label"><?php echo e('Social Security Number'); ?></label>
        <div class="col-md-6">
            <input class="form-control nationalIdCard" name="nation_id_card" type="number" id="nation_id_card" value="<?php echo e($consumer->getUserDetail->profile->nation_id_card??''); ?>" >
            <?php echo $errors->first('nation_id_card', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
        <label for="phone" class="col-md-4 control-label"><?php echo e('Phone'); ?></label>
        <div class="col-md-6">
            <input class="form-control phone" name="phone" type="number" id="phone" value="<?php echo e($consumer->getUserDetail->profile->phone??''); ?>" >
            <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>">
        <label for="dob" class="col-md-4 control-label"><?php echo e('Date of Birth'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="dob" type="date" max="<?php echo e(Date('Y-m-d', strtotime('+1 day'))); ?>" id="dob" value="<?php echo e($consumer->getUserDetail->profile->dob??''); ?>" >
            <?php echo $errors->first('dob', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
        <label for="country" class="col-md-4 control-label"><?php echo e('Country'); ?> <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control" name="country" type="text" id="country" value="<?php echo e($consumer->getUserDetail->profile->country??''); ?>" required>
            <?php echo $errors->first('country', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
        <label for="city" class="col-md-4 control-label"><?php echo e('City'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="city" type="text" id="city" value="<?php echo e($consumer->getUserDetail->profile->city??''); ?>" >
            <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('postal') ? 'has-error' : ''); ?>">
        <label for="postal" class="col-md-4 control-label"><?php echo e('Zip Code'); ?></label>
        <div class="col-md-6">
            <input class="form-control postal" name="postal" type="text" id="postal" value="<?php echo e($consumer->getUserDetail->profile->postal??''); ?>" >
            <?php echo $errors->first('postal', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
        <label for="address" class="col-md-4 control-label"><?php echo e('Address'); ?></label>
        <div class="col-md-6">
            <input class="form-control" name="address" type="text" id="address" value="<?php echo e($consumer->getUserDetail->profile->address??''); ?>" >
            <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="Form_p5" >
    <div class="form-group <?php echo e($errors->has('pic') ? 'has-error' : ''); ?>">
        <label for="pic" class="col-md-4 control-label"><?php echo e('Profile Picture'); ?></label>
       <?php echo $__env->make('includes.image_file',['file'=>$manager->getUserDetail->profile->pic??""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
        <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
        <?php echo $__env->make('includes.status_dropdown',['status'=>$manager->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_btn" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<br>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
        $(document).on('change','#caretaker_id',function(e){    
            var id = $(this).find(':selected').attr('value');
            var name = $(this).find(':selected').attr('attr');
            $('#facility_id').val(id);
            $('#facility_name').val(name);
        });
        $(document).on('change','#caretaker_id',function(e){
            var id = $(this).find(':selected').attr('value');
            var name = $(this).find(':selected').attr('attr');
            $('#facility_id').val(id);
            $('#facility_name').val(name);
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/consumer/consumer/form.blade.php ENDPATH**/ ?>