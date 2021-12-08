<?php $__env->startPush('css'); ?>

<style type="text/css">
 .input_field_list { display: flex; align-items: center; justify-content: space-between; margin: 10px 0px; padding: 0 26px; }
  #mcqs span { display: flex;     align-items: center; }
  .form-horizontal .checkbox, .form-horizontal .radio { min-height: 30px; } 
  #mcqs span label {margin: 5px 8px;}
  #mcqs span input { border-radius: 10px; }
  .question input { border-radius: 10px; }
  .question select {border-radius: 10px;}
  textarea.form-control {height: 38px;border-radius: 10px;}
  .question p { margin-bottom: 2px; }
  .button_submit { float: right; }
</style>

<?php $__env->stopPush(); ?>

<div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
    <br>
        <div class="quiz mb-5" id="quiz" disabled="disabled" style="text-align: center">
            <?php if(isset($assessments)): ?><?php endif; ?>
            <h2 class="hidden">&nbsp;</h2>
            <input type="hidden" name="lms_id" value="<?php echo e($lms_session_id); ?>">
            <div class="row">
                <div class="col-md-12">
                    <label for="assessment_type" class="control-label">Add your Questions and also select the type for answering them</label>
                </div>
            </div>
            <div class="question">
            </div>
            <div class="new_question"></div>
            <div class="row">
                <button class="btn btn-success btn-add inline"  id="addquestion" type="button">
                    <span class="fa fa-plus"></span>
                </button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="button_submit">
                    <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
                </div>
            </div>
        </div>


<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/icheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/icheck/icheck.init.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/components/jqueryui/jquery-ui.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"
        type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('/js/adduser.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('/js/addtopic.js')); ?>"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<script>
 var  Questions_no = 0;
    <?php if(isset($assessments)): ?>
        <?php $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            Qustions("<?php echo e($assessment->id); ?>")
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    $(document).on('click','#addquestion',function(e){
        id = 'no'
        Qustions(id)
    });

    function Qustions(id){
        Questions_no += 1;
        $.ajax({
            type : 'get',
            url : "<?php echo e(route('add_qustion_div')); ?>/"+Questions_no+'/'+id,
            success:function(data){
                console.log(data);
                $('.question').append(data);
            }
        });
    }
</script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/quiz/quiz/form.blade.php ENDPATH**/ ?>