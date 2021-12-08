
<?php $__env->startPush('css'); ?>
  <style>
   .bd-placeholder-img {
     font-size: 1.125rem;
     text-anchor: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none;
   }
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
    .price-card .card-body p:last-child:after{
      display: none;
    }
    .price-card .card-body ol>li {
      padding: 10px 0;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
   }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="hero-secion pb-5">
   <?php echo $__env->make('website.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container banner-content">
         <div class="banner-text">
            <h1>Packages</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
   </div>
</section>
<section class="price-section pt-5 pb-5">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center price-pkg">
             <hr />
             <h4>OUR PRICING</h4>
             <h2 class="big-heading">PACKAGES & PRICES</h2>
             <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt
             </p>
          </div>
          <div class="row mb-3 text-center my-price-table">
             <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>             
                <div class="card col-lg-4 col-md-6 mb-4 price-card">
                   <div class="package-card-wrapper">
                      <div class="card-header">
                         <h6><?php echo e(++$key); ?></h6>
                         <h2 class="pt-3"><?php echo $package->name; ?> <br><?php echo $package->price; ?>$</h2>
                      </div>
                      <div class="card-body text-left">
                        <?php echo $package->description; ?>

                        <p style="text-align: center;">
                            <i class="fas fa-check pr-2"></i> 
                            Caretakers: <b><?php echo $package->caretakers??"Not Available"; ?></b>
                            Managers: <b><?php echo $package->managers??"Not Available"; ?></b>
                            LMS: <b><?php echo $package->lms_access??"Not Available"; ?></b>
                        </p><br>
                      </div>
                      <div class="price-row">
                         <div class="column-1">
                            <h5>PRICE USD</h5>
                         </div>
                         <div class="column-1">
                            <h2>$<?php echo e($package->price); ?></h2>
                         </div>
                         <div class="column-2">
                            <div class="learn-more-btn-div">
                              <?php if($package->price==0): ?>
                               <a class="btn learn-btn" href="<?php echo e(url('sign_up',$package->id)); ?>">Start</a>
                              <?php else: ?>
                               <a class="btn learn-btn" href="<?php echo e(url('sign_up',$package->id)); ?>">BUY NOW</a>
                              <?php endif; ?>
                            </div>
                         </div>
                      </div>
                   </div>  
                </div> 
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="card col-lg-4 col-md-6 mb-4 price-card">
                 <div class="package-card-wrapper">
                    <form method="post" action="<?php echo e(route('sign_up_custom_package')); ?>">
                      <?php echo csrf_field(); ?>
                      <div class="card-header">
                         <h6><?php echo e(++$key); ?></h6>
                         <h2 style="display: flex;margin: 0 5px" class="pt-3">
                          <input type="text" name="custom_package_name" placeholder="Package Name *" class="form-control" style=" width: 70%" required>  
                          <input type="text" name="custom_package_price" placeholder="Price *" class="form-control" style=" width: 30%" required> $</h2>
                      </div>
                      <div class="card-body text-left">
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            How Many Beds Required? *<b>
                              <input type="number" name="beds" class="form-control" required>
                            </b>
                        </p>
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            No of Caretakers Required? *<b>
                              <input type="number" name="caretakers" class="form-control" required>                                
                            </b>
                        </p>
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            No of Managers Required? *<b>
                              <input type="number" name="managers" class="form-control" required>                                                                
                            </b>
                        </p>
                        <textarea class="form-control" rows="1" placeholder="Other Requirements" required name="description"></textarea><br>
                      </div>
                      <div class="price-row">
                         <div class="column-4">
                            <!-- <a class="learn-more-btn b-now"></button> -->
                            <div class="learn-more-btn-div">
                               <button type="submit" class="btn learn-btn">Request & Signup</button>
                               <!-- <a class="btn learn-btn" href="<?php echo e(url('sign_up','custom')); ?>">Request & Signup</a> -->
                            </div>
                         </div>
                      </div>
                    </form>
                 </div>  
              </div> 
          </div>
       </div>
    </div>
 </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('website.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/packages_details_for_company.blade.php ENDPATH**/ ?>