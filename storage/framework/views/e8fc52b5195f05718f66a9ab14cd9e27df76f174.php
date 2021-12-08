<div id="tf" class="data col-md-5">
    <p>Select Any One Of The Two For Correct Answer
        <select class="form-control" name="question[<?php echo e($Questions_no); ?>][Ans]">
            <option  <?php if(isset($qustion) && $qustion->correct_answer == 'true' ): ?> selected <?php endif; ?> value="true" id="">True</option>
            <option <?php if(isset($qustion) && $qustion->correct_answer == 'false' ): ?> selected <?php endif; ?> value="false" id="">False</option>
        </select>
    </p>
</div><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/ajax/assesment_type_truefalse_ajax.blade.php ENDPATH**/ ?>