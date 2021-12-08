

<div id="mcqs" class="data col-md-12">
<div class="custom_heading">
<p>Choose Correct Answer</p>
</div>
	<div class="input_field_list">
<span><input type="radio" <?php if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[0]??'' ): ?> checked <?php endif; ?> name="question[<?php echo e($Questions_no); ?>][Ans]" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[0]??''); ?>" <?php endif; ?> class="radio">&nbsp; <input class="form-control option" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[0]??''); ?>" <?php endif; ?> type="text" name="question[<?php echo e($Questions_no); ?>][option][]" id=""></span>
    <span><input type="radio"   <?php if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[1]??'' ): ?> checked <?php endif; ?> name="question[<?php echo e($Questions_no); ?>][Ans]" class="radio">&nbsp;<input class="form-control option" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[1]??''); ?>" <?php endif; ?> type="text" name="question[<?php echo e($Questions_no); ?>][option][]" id=""></span>
    <span><input type="radio" <?php if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[2]??'' ): ?> checked <?php endif; ?> name="question[<?php echo e($Questions_no); ?>][Ans]" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[2]??''); ?>" <?php endif; ?> class="radio">&nbsp;<input class="form-control option" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[2]??''); ?>" <?php endif; ?> type="text" name="question[<?php echo e($Questions_no); ?>][option][]" id=""></span>
    <span><input type="radio" <?php if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[3]??'' ): ?> checked <?php endif; ?> name="question[<?php echo e($Questions_no); ?>][Ans]" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[3]??''); ?>" <?php endif; ?> class="radio">&nbsp; <input class="form-control option" <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> value="<?php echo e(json_decode( $qustion->option)[3]??''); ?>" <?php endif; ?> type="text" name="question[<?php echo e($Questions_no); ?>][option][]" id=""></span>
	</div>
    
</div>
<script type="text/javascript">
    $(document).on('keyup','.option',function(e){
        var val =  $(this).val();
        $(this).closest('span').find('.radio').val(val)
    });
</script><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/ajax/assesment_type_mcqs_ajax.blade.php ENDPATH**/ ?>