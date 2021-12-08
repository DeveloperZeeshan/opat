
<?php $__env->startPush('css'); ?>
<style>
  .job_portal .heading {text-align: center;}
  .job_portal .heading .inner_col {  padding: 30px 0;}
  .job_portal .heading .inner_col p { margin-bottom: 10px;}
  .job_portal .heading .inner_col h4 { font-size: 35px;  font-weight: 800; text-transform: uppercase;}
  .job_portal .side_bar .sidebar_filter { border: 2px solid  #344248; border-radius: 10px;  padding: 15px;  max-width: 70%; margin: 0 auto 20px; box-shadow: 0 0 5px #263d44;}
  .job_portal .side_bar .sidebar_filter h4 { font-weight: 600;  color: #283e45;}
  .job_portal .side_bar .sidebar_filter form label { font-size: 14px;}
  .job_portal .inner_row {  border: 2px solid #273e44;  border-radius: 11px; padding: 30px 10px;  margin: 0px -15px 30px;  box-shadow: 0 0 5px #263d44;}
  .job_portal .inner_row .right_inner_col>h4 {  font-weight: 700; margin-bottom: 3px;}
  .job_portal .inner_row .right_inner_col>p {   font-size: 14px; color: #919191;}
  .job_portal .inner_row .buttons { text-align: right;}
  .job_portal .inner_row .buttons>.right_inner_col>a { background: #253d44;  border-radius: 30px;  font-size: 10px;  padding: 8px 20px; color: white;}
  .job_portal .inner_row  .apply_btn { margin-top: 30px;}
  .job_portal .inner_row .apply_btn a { padding: 10px;  border-radius: 30px; border: 2px solid #2c3f46;    color: #2c3f46;  margin-right: 20px;}
  .job_portal .inner_row .apply_btn a.apply_now_button { background: #2c3f46; color: white;}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- END HEADER SECTION-->
<!--HERO SECTION-->

<section class="hero-secion pb-5">
   <?php echo $__env->make('website.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <div class="container banner-content">
         <div class="banner-text">
            <h1>JOBS OPENING</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
   </div>
</section>
      <section class="job_portal">
        <div class="container custom-container">
          <div class="row">
            <div class="col-md-12 heading">
              <div class="inner_col">
                <p>10 Open position</p>
                <h4>Current Job Opening</h4>
              </div>
            </div>
            <div class="col-md-3">
              <div class="side_bar">
                <div class="sidebar_filter">
                  <h4>Job Type</h4>
                  <form>
                      <?php $__currentLoopData = $jobTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="">
                          <label class="form-check-label" for=""><?php echo e($jobType->name); ?></label>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </form>
                </div>
                <div class="sidebar_filter">
                  <h4>Department</h4>
                  <form>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="">
                          <label class="form-check-label" for=""><?php echo e($department->name); ?></label>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </form>
                </div>
                <div class="sidebar_filter">
                  <h4>Location</h4>
                  <form>
                      <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="">
                          <label class="form-check-label" for=""><?php echo e($location->name); ?></label>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row inner_row">
                  <div class="col-md-6">
                    <div class="right_inner_col">
                        <h4><?php echo e($job->title??"Not Available"); ?></h4>
                      <p><?php echo $job->getLocationDetail->name??"Not Available"; ?></p>
                      <p><?php echo $job->description??"Not Available"; ?></p>
                    </div>
                  </div>
                  <div class="col-md-6 buttons">
                    <div class="right_inner_col">
                      <a href="#!"><?php echo $job->getJobTypeDetail->name??"Not Available"; ?></a>
                      <a href="#!"><?php echo $job->getDepartmentDetail->name??"Not Available"; ?></a>
                      <a href="#!"><?php echo $job->getLocationDetail->name??"Not Available"; ?></a>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="right_inner_col">
                      <!-- <p><?php echo $job->description??"Not Available"; ?></p> -->
                      <div class="apply_btn">
                        <a class="apply_now_button" value="<?php echo e($job->id); ?>" job_title="<?php echo e($job->title); ?>">Apply Now</a>
                        <!-- <a href="#!">View Details</a> -->
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="pagination-wrapper"><?php echo $jobs->appends(['search' => Request::get('search')])->render(); ?></div>
            </div>
          </div>
        </div>

      </section>
    </div>
    <div id="apply_for_job_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h4 class="modal-title" id="job_title"></h4>
                </div>
              <form method="POST" action="<?php echo e(route('apply_for_job_process')); ?>" enctype="multipart/form-data">
                  <div class="modal-body" style="padding: 20px">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="job_id" id="job_id" >
                      <div class="form-group">
                          <label for="recipient-name" class="control-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                          <label for="recipient-name" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" required placeholder="Enter Your Email">
                      </div>
                      <div class="form-group">
                          <label for="recipient-name" class="control-label">Attachment</label>
                          <input type="file" class="form-control" id="attachment" name="attachment" required style="height: 43px"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" >
                      </div>
                      <div class="form-group">
                          <label for="message-text" class="control-label">About</label>
                          <textarea class="form-control" id="message" name="message" rows="5" placeholder="" ></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger waves-effect waves-light">Apply</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</body>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
  $(document).on('click','.apply_now_button',function(e){
    e.preventDefault();
    var id    =  $(this).attr('value');
    var title =  $(this).attr('job_title');
    $('#job_id').val(id);
    $('#job_title').html(title);
    $('#apply_for_job_modal').modal('show');
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('website.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/jobs.blade.php ENDPATH**/ ?>