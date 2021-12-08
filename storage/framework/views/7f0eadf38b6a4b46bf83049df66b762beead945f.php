   <header>
      <div class="top-bar">
         <ul>
            <li><a href="mailto:info@opat.com"><i class="fas fa-envelope-open-text"></i>info@opat.com</a></li>
            <li><a href="tel:+51 123 4567"><i class="fas fa-phone-alt"></i>+51 123 4567</a></li>
         </ul>
         <hr>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item  <?php echo e(Request::is('/') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('/')); ?>">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item  <?php echo e(Request::is('about') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('about')); ?>">About</a>
               </li>
               <li class="nav-item  <?php echo e(Request::is('news_and_events') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('news_and_events')); ?>">News and Events</a>
               </li>
               
                  
               
               <li class="nav-item <?php echo e(Request::is('privacy_policy') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('privacy_policy')); ?>">Privacy</a>
               </li>
               <li class="nav-item <?php echo e(Request::is('faq') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('faq')); ?>">Faq's</a>
               </li>
              <!--  <li class="nav-item <?php echo e(Request::is('quick_links') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('quick_links')); ?>">Quick Links</a>
               </li>
                   <li class="nav-item <?php echo e(Request::is('job') ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(url('job')); ?>">Career</a>
               </li> -->
               <?php if(Auth::check()): ?>
                  <li class="nav-item <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                     <a class="nav-link" href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                  </li>                                 
               <?php else: ?> 
                  <li class="nav-item <?php echo e(Request::is('signin') ? 'active' : ''); ?>">

                     
                     <a class="nav-link" href="<?php echo e(url('sign_in')); ?>">Login</a>
                  </li>
                  <li class="nav-item Signup <?php echo e(Request::is('sign_up') ? 'active' : ''); ?>" style="cursor: pointer;">
                     <a class="nav-link"  data-toggle="modal" data-target="#myModal">Sign Up</a>
                  </li>
                  
               <?php endif; ?>
               
            </ul>
         </div>
      </nav>
   </header>


   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="row">
          <div class="col-md-12">
          <div class="modal-content " id="comapny_modal">
            <div class="modal-header ">
              <h4 class="modal-title">Register As a <b>Company</b></h4>
            </div>
            <div class="modal-body">
              <ol>
                <li>
                <p><strong>Company</strong>&nbsp;can manage & restric managers access.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;can manage Caretakers.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;can add or remove Caretakers.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;send feedback to Admin.</p>
                </li>
              </ol>
            </div>
            <div class="modal-footer">
            <a type="button" href="<?php echo e(url('packages_details_for_company')); ?>" class="btn Signup" id="company" value="company">Sign Up</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
          

          
          
            
              
            
            
              
                
                
                
                
                
                
                
                
                
                
                
                
              
            
            
               
              
            
          
          </div>
          </div>
        </div>
      </div>
      <?php $__env->startPush('js'); ?>
      <script>

        
      //     $(document).on('click','#company',function(e){
      //     e.preventDefault();
      //     var package_id = $(this).val();
      //     alert(package_id);
      //        $.ajax({
      //           url: "<?php echo e(url('get_package_detail')); ?>",
      //           type: 'GET',
      //           success: function (response) {
      //             $('.comapny_modal').hide();
      //             $(".package_detail_modal_div").html(response);
      //             $('#package_detail_modal').modal('show');
      //           },error:function(error){
      //             console.log(error);
      //             $('.comapny_modal').hide();
      //           }
      //       });
      //   });
      </script>

<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/layout/menu.blade.php ENDPATH**/ ?>