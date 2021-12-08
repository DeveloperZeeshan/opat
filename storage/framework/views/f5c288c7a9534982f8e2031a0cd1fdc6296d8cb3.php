<div class="form-group <?php echo e($errors->has('consumer_id') ? 'has-error' : ''); ?>">
    <label for="consumer_id" class="col-md-4 control-label"><?php echo e('Resident'); ?></label>
    <div class="col-md-6">
        <select class="form-control" name="consumer_id" required >
            <option <?php if(!isset($incidentreport->consumer_id)): ?> selected <?php endif; ?> disabled value="" >Select Resident</option>
            <?php $__currentLoopData = $consumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($consumer->user_id); ?>" <?php if(isset($incidentreport->consumer_id) && $consumer->getUserDetail->id == $incidentreport->consumer_id): ?> selected <?php endif; ?> ><?php echo e($consumer->getUserDetail->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="<?php echo e($incidentreport->consumer_id??''); ?>" > -->
        <?php echo $errors->first('consumer_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('nature_of_incident') ? 'has-error' : ''); ?>">
    <label for="nature_of_incident" class="col-md-4 control-label"><?php echo e('Nature Of Incident'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="nature_of_incident" type="text" id="nature_of_incident" list="incident" value="<?php echo e($incidentreport->nature_of_incident??''); ?>" >
        <?php echo $errors->first('nature_of_incident', '<p class="help-block">:message</p>'); ?>

        
            
            
        
    </div>
</div>

<div class="form-group <?php echo e($errors->has('incident_detail') ? 'has-error' : ''); ?>">
    <label for="incident_detail" class="col-md-4 control-label"><?php echo e('Incident Detail'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="incident_detail" type="textarea" id="incident_detail" ><?php echo e($incidentreport->incident_detail??''); ?></textarea>
        <?php echo $errors->first('incident_detail', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('additional_notes') ? 'has-error' : ''); ?>">
    <label for="additional_notes" class="col-md-4 control-label"><?php echo e('Additional Notes'); ?></label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="additional_notes" type="textarea" id="additional_notes" ><?php echo e($incidentreport->additional_notes??''); ?></textarea>
        <?php echo $errors->first('additional_notes', '<p class="help-block">:message</p>'); ?>

    </div>
</div><div class="form-group <?php echo e($errors->has('incident_date') ? 'has-error' : ''); ?>">
    <label for="incident_date" class="col-md-4 control-label"><?php echo e('Incident Date'); ?></label>
    <div class="col-md-6">
        <input class="form-control" name="incident_date" type="Date" id="incident_date" max="<?php echo e(Date('Y-m-d', strtotime('+1 day'))); ?>" value="<?php echo e($incidentreport->incident_date??''); ?>" >
        <?php echo $errors->first('incident_date', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('report_created_by') ? 'has-error' : ''); ?>">
    <label for="report_created_by" class="col-md-4 control-label"><?php echo e('Report Created By'); ?></label>
    <div class="col-md-6">

        <input class="form-control"  type="text"  value="<?php echo e(Auth::user()->name??''); ?>" readonly>
        <input class="form-control" name="report_created_by" type="hidden" id="report_created_by" value="<?php echo e(Auth::user()->id??''); ?>" readonly>
        <!-- <input class="form-control" name="report_created_by" type="number" id="report_created_by" value="<?php echo e($incidentreport->report_created_by??''); ?>" > -->
        <?php echo $errors->first('report_created_by', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
    <?php echo $__env->make('includes.status_dropdown',['status'=>$incidentreport->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="<?php echo e($incidentreport->status??''); ?>" >
        <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
</div>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/incidentReport/incident-report/form.blade.php ENDPATH**/ ?>