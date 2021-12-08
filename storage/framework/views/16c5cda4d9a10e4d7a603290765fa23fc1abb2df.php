
<?php $__env->startPush('css'); ?>
<style type="text/css">
   .has-error {
       border-color: #f7ebeb;
       background-color: #ffff99;
   }

   .emsg {
       color: rgb(249 119 119);
   }

   .hidden {
       visibility: hidden;
   }

   .btn_disabled {
       pointer-events: none;
   }

   .errorSec {
       color: rgb(249 119 119);
   }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   <?php echo $__env->make('website.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="container banner-content">
      <div class="row">
         <div class="col-md-12 hero-quote Login">
            <h2>Login</h2>
            <?php if($error = $errors->first('password')): ?>
               <div class="alert alert-danger">
                  <?php echo e($error); ?>

               </div>
            <?php endif; ?>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </p>
            <hr />
            <form class="hero-form-1" id="loginform" method="post" action="<?php echo e(route('signin_process')); ?>">
               <?php echo e(csrf_field()); ?>

               <?php if(count($errors) == 0): ?>
                  <?php echo $__env->make('includes.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php endif; ?>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                     <input type="email" class="form-control email" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address*" required/>
                  </div>
                  <span id="emailerror" class="errorSec" style="display: none">please enter a valid email
                     address</span>
                  <?php if($errors->has('email')): ?>
                           <span class="invalid-feedback"><strong><?php echo e($errors->first('email')); ?></strong></span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                     <input type="password" class="form-control password" id="password" name="password" aria-describedby="emailHelp" placeholder="Password*" required />
                  </div>
                  <span id="passworderror" class="errorSec" style="display: none">please enter
                     password</span>
                  <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback"><strong><?php echo e($errors->first('password')); ?></strong></span>
                  <?php endif; ?>
               </div>
               
               <button type="submit" class="btn btn-primary" id="submit_btn"><i class="fas fa-location-arrow"></i> Submit Now</button>
            </form>
            
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
   $('#submit_btn').click(function (e) {
      e.preventDefault();
      $(".errorSec").hide();
      var email = $('#email').val();
      var password = $('#password').val();
      $('#submit_btn').attr('disabled', false);
      if (email == '' && password == '') {

         $("#emailerror").show();
         $("#passworderror").show();

      } else if (email == '') {

         $("#emailerror").show();
      } else if (password == '') {

         $("#passworderror").show();

      } else {
         $('#loginform').submit();
      }
   })
   // end login page
   var validateEmail = function (elementValue) {
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      return emailPattern.test(elementValue);
   }
      // for team email validate
   $('.email').keyup(function () {
         var value = $(this).val();
         var valid = validateEmail(value);
         if (!valid) {
               // $(this).css('color', 'rgb(249, 119, 119)');
               $(".email").html("").css('border', '2px solid  rgb(249, 119, 119)');
               $('#submit_btn').attr('disabled', 'disabled');
               } else {
               // $(this).css('color', '#3fe43f');
               $(".email").html("").css('border', '2px solid #3fe43f');
               $('#submit_btn').attr('disabled', false);
               }
   });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('website.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/website/login.blade.php ENDPATH**/ ?>