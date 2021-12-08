<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Learning Management <?php echo e($learningmanagement->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('LearningManagement'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/learningManagement/learning-management')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                               <!--  <th>ID</th> -->
                                <!-- <td><?php echo e($learningmanagement->id); ?></td>
 -->                            </tr>
                            <tr><th> Lecture </th><td> <?php echo e($learningmanagement->lecture); ?> </td></tr>
                            <tr><th> Lecture File </th><td><iframe style="border:1px solid #666CCC" src="<?php echo e(asset('website/'.$learningmanagement->upload_file)); ?>" title="file" frameborder="1" scrolling="auto" height="500" width="100%" ></iframe> 
                            <tr><th> Lecture Video </th><td> <iframe src="<?php echo e(asset('website/'.$learningmanagement->upload_video)); ?>" title="video" width="100%" height="400px;"></iframe>
                             <br>
                             <br>
                             <?php if(auth()->user()->hasrole('consumer')): ?>
                             <a title="Create Quiz" style="cursor: pointer; text-align: right;" class="create_lms_id" attr="<?php echo e($learningmanagement->id); ?>">  
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Start Quiz
                                </button>
                            </a>
                            <?php endif; ?>

                            </td> 
                                            
                            </tr>
                                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
$(document).on('click','.create_lms_id',function(e){
            var quiz_id = $(this).attr('attr');
            $.ajax({
                url: "<?php echo e(route('show_lms_id_session')); ?>/"+quiz_id,
                type:'get',
                success: function(response) {
                    location.href = "<?php echo e(url('quiz/quiz/show')); ?>";
                }
            });
        });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/learningManagement/learning-management/show.blade.php ENDPATH**/ ?>