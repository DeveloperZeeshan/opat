<form method="POST" action="<?php echo e(url('/rentPayment/rent-payment/' . $rentpayment->id)); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    <?php echo e(method_field('PATCH')); ?>

    <?php echo e(csrf_field()); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Edit Rent Payment</h2>
          <button type="button" class="close rentpayment_edit_close_button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group <?php echo e($errors->has('consumer_id') ? 'has-error' : ''); ?>">
              <label for="consumer_id" class="col-md-4 control-label"><?php echo e('Consumer Name'); ?></label>
              <div class="col-md-6">
                  <input class="form-control" type="text" value="<?php echo e($rentpayment->getConsumerDetail->name??''); ?>" readonly >
                  <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="<?php echo e($rentpayment->consumer_id??''); ?>" >
                  <?php echo $errors->first('consumer_id', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>
          <div class="form-group <?php echo e($errors->has('rent_date') ? 'has-error' : ''); ?>">
              <label for="rent_date" class="col-md-4 control-label"><?php echo e('Rent Date'); ?></label>
              <div class="col-md-6">
                  <input class="form-control" name="rent_date" type="date" id="rent_date" value="<?php echo e($rentpayment->rent_date??''); ?>" >
                  <?php echo $errors->first('rent_date', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>
          <div class="form-group <?php echo e($errors->has('bed_amount') ? 'has-error' : ''); ?>">
              <label for="bed_amount" class="col-md-4 control-label"><?php echo e('Bed Amount'); ?></label>
              <div class="col-md-6">
                  <input class="form-control" name="bed_amount" type="number" id="bed_amount" value="<?php echo e($rentpayment->bed_amount??''); ?>" >
                  <?php echo $errors->first('bed_amount', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>
          <div class="form-group <?php echo e($errors->has('actual_amount') ? 'has-error' : ''); ?>">
              <label for="actual_amount" class="col-md-4 control-label"><?php echo e('Actual Amount'); ?></label>
              <div class="col-md-6">
                  <input class="form-control" name="actual_amount" type="number" id="actual_amount" value="<?php echo e($rentpayment->actual_amount??''); ?>" >
                  <?php echo $errors->first('actual_amount', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>

          <div class="form-group <?php echo e($errors->has('recieved_amount') ? 'has-error' : ''); ?>">
              <label for="actual_amount" class="col-md-4 control-label"><?php echo e('Recieved Amount'); ?></label>
              <div class="col-md-6">
                  <input class="form-control" name="recieved_amount" type="number" id="recieved_amount" value="<?php echo e($rentpayment->recieved_amount??''); ?>" >
                  <?php echo $errors->first('recieved_amount', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>

          
              
              
                  
                  
              
          
          <div class="form-group <?php echo e($errors->has('added_by') ? 'has-error' : ''); ?>">
              <label for="added_by" class="col-md-4 control-label"><?php echo e('Added By'); ?></label>
              <div class="col-md-6">
                  
                  <input class="form-control"  type="text"  value="<?php echo e(Auth::user()->name??''); ?>" readonly>
                  <input class="form-control" name="added_by" type="hidden" id="added_by" value="<?php echo e(Auth::user()->id??''); ?>" readonly>
                  <?php echo $errors->first('added_by', '<p class="help-block">:message</p>'); ?>

              </div>
          </div>
          <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
              <label for="status" class="col-md-4 control-label"><?php echo e('Status'); ?></label>
              <?php echo $__env->make('includes.status_dropdown',['status'=>$rentpayment->status??1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary rentpayment_edit_close_button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/includes/rent_payment_edit_modal.blade.php ENDPATH**/ ?>