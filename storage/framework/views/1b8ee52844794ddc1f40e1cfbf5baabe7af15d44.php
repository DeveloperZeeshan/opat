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
                    <h2><?php echo e(($page->where('slug','Loremipsumdolor')->first()->title??'Not Available')); ?> </h2>
                    <p><?php echo ($page->where('slug','Loremipsumdolor')->first()->description??'Not Available'); ?> </p>
                    <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">Read More</a>
                    </div>
                    <a href=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="inner-col">
                        <div class="row bl-border">
                            <div class="col-lg-5 col-md-4 col-sm-4">
                                <div class="img-fluid">
                                    <img src="<?php echo e(asset('website')); ?>/<?php echo e($item->image??''); ?>" class="img-fluid" alt="" >
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-8 border-box">
                                <h2><?php echo e($item->title??''); ?></h2>
                                <?php echo $item->description??''; ?>

                                <div class="learn-more-btn-div">
                                    <a class="btn learn-btn" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/website/layout/resource.blade.php ENDPATH**/ ?>