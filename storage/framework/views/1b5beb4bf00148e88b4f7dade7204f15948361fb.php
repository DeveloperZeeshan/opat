<div class="row <?php echo e($errors->has('assessment_title') ? 'has-error' : ''); ?>">
    <br>
    <div class="col-md-5">
        <p>Question<?php echo e($Questions_no); ?></p><input class="form-control addquestion" type="text" name="question[<?php echo e($Questions_no); ?>][question]" id="question" value="<?php echo e($qustion->question??''); ?>" required>
        <?php if(isset($qustion)): ?>
            <input type="hidden" name="question[<?php echo e($Questions_no); ?>][id]" value="<?php echo e($qustion->id); ?>" required>
        <?php endif; ?>
    </div>
    <div class="col-md-2">
        <p>Select Answer type
            <select data-qution-no = "<?php echo e($Questions_no); ?>" class="form-control required assessment_answer_typeQ<?php echo e($Questions_no); ?>" name="question[<?php echo e($Questions_no); ?>][type]" id="assessment_answer_typeQ<?php echo e($Questions_no); ?>" required>
                <option value="none" selected disabled>None</option>
                <option <?php if(isset($qustion) && $qustion->question_type == 'mcqs' ): ?> selected <?php endif; ?> value="mcqs">MCQs</option>
                <option <?php if(isset($qustion) && $qustion->question_type == 'true_false' ): ?> selected <?php endif; ?> value="true_false">True/False</option>
                <option <?php if(isset($qustion) && $qustion->question_type == 'free_text' ): ?> selected <?php endif; ?> value="free_text">Free Text</option>
            </select>
        </p>
    </div>
    <div class="row " id="assessment_answer_type_response_divQ<?php echo e($Questions_no); ?>">

    </div>
</div>

<script type="text/javascript">

    <?php if(isset($qustion)): ?>

    answerType("<?php echo e($qustion->question_type); ?>","<?php echo e($qustion->id); ?>","<?php echo e($Questions_no); ?>")

    <?php endif; ?>

    $(document).on('change','#assessment_answer_typeQ<?php echo e($Questions_no); ?>',function(e){
        var assessment_answer_type_selected =  $(this).val();
        questionsno = $(this).attr('data-qution-no');
        if(assessment_answer_type_selected){
            //alert(assessment_answer_type_selected);
            id = 'no';
            answerType(assessment_answer_type_selected,id,questionsno)

        }
    });

    function answerType(assessment_answer_type_selected,id,questionsno){

        $.ajax({
            type : 'get',
            url : "<?php echo e(route('assessment_answer_type_process')); ?>/"+assessment_answer_type_selected+"/"+questionsno+"/"+id,
            success:function(data){
                console.log(data);
                $('#assessment_answer_type_response_divQ'+questionsno).html(data);
            }
        });
    }
</script><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/includes/add_qustion_div.blade.php ENDPATH**/ ?>