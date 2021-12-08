
<?php $__env->startSection('content'); ?>
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   <?php echo $__env->make('website.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <div class="container banner-content">
         <div class="banner-text">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
   </div>
</section>

<section class="sec-3 about-s2">
   <div class="container">
      <div class="row align-items-center d-flex row">
         <div class="col-lg-6">
            <div class="founter-img">
               <img class="img-fluid" src="<?php echo e(asset('website')); ?>/images/about-s2-img.png">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="founder-container">
            <h5 class="small-heading">MEET OUR</h5>
            <h2 class="section-3-heading">FOUNDER & CEO</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
               in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
               Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            </div>
         </div>
      </div>
   </div>
</section>


<section class="about-s3">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <hr class="top-line">
            <h5 class="text-center subheading">OUR VISION</h5>
            <h2 class="text-center main-heading">FOR O.P.A.T</h2>
          </div>
          <div class="col-md-12">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
          </div>
      </div>
   </div>
</section>

<section class="counter-section pt-5 pb-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 counter-h2">
            <h1>LET’S YOU CHOOSE WHO PROVIDES YOUR CARE</h1>
         </div>
         <div class="col-lg-3 text-center">
            <div class="img-fluid">
               <img src="<?php echo e(asset('website')); ?>/images/c1.png" alt="">
               <h2 class="pt-3">400+</h2>
               <h6>home care agencies</h6>
            </div>
         </div>
         <div class="col-lg-3 text-center">
            <div class="img-fluid">
               <img src="<?php echo e(asset('website')); ?>/images/c2.png" alt="">
               <h2 class="pt-3">600+</h2>
               <h6>caregivers</h6>
            </div>
         </div>
         <div class="col-lg-3 text-center">
            <div class="img-fluid">
               <img src="<?php echo e(asset('website')); ?>/images/c3.png" alt="">
               <h2 class="pt-3">300+</h2>
               <h6>hours of care</h6>
            </div>
         </div>
         <div class="col-lg-3 text-center">
            <div class="img-fluid">
               <img src="<?php echo e(asset('website')); ?>/images/c4.png" alt="">
               <h2 class="pt-3">$6 million</h2>
               <h6>of home care annually</h6>
            </div>
         </div>
      </div>
   </div>
   </div>
</section> 


<section id="leadership">
   <div class="container">
      <div class="row leadership-text">
         <div class="col-md-12">
            <hr class="top-line">
            <h5 class="subheading">MEET OUR</h5>
            <h2 class="main-heading">LEADERSHIP</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="<?php echo e(asset('website')); ?>/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="<?php echo e(asset('website')); ?>/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         
         
      </div>
   </div>
</section>

<section class="blog-sec pt-5 pb-5">
   <div class="container">
      <div class="row">
         <div class="col-12 blog-head text-center pb-5">
            <hr>
            <h5>COMMUNITY</h5>
            <h2>RESOURCES</h2>
         </div>
         <div class="col-lg-6 blog-1">
            <div class="blog-content">
               <h2>Lorem ipsum dolor </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
               <div class="learn-more-btn-div">
                  <a class="btn learn-btn" href="#">Read More</a>
               </div>
               <a href=""></a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="inner-col">
               <div class="row bl-border">
                  <div class="col-lg-5 col-md-4 col-sm-4">
                     <div class="img-fluid">
                        <img src="<?php echo e(asset('website')); ?>/images/bl2.png" class="img-fluid" alt="" >
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-8 col-sm-8 border-box">
                     <h2>Lorem ipsum dolor </h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                     <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="inner-col">
               <div class="row bl-border">
                  <div class="col-lg-5 col-md-4 col-sm-4">
                     <div class="img-fluid">
                        <img src="<?php echo e(asset('website')); ?>/images/bl3.png" class="img-fluid" alt="" >
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-8 col-sm-8 border-box">
                     <h2>Lorem ipsum dolor </h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                     <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/website/about.blade.php ENDPATH**/ ?>