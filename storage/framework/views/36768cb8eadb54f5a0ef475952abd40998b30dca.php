<section class="counter-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 counter-h2">
                <h1>LET’S YOU CHOOSE WHO PROVIDES YOUR CARE</h1>
            </div>
            <?php $__currentLoopData = $providescare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="img-fluid">
                        <img src="<?php echo e(asset('website')); ?>/<?php echo e($item->image); ?>" alt="">
                        <h2 class="pt-3"><?php echo e($item->number??''); ?></h2>
                        <h6><?php echo $item->description??''; ?></h6>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    </div>
</section><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/website/layout/provides_care.blade.php ENDPATH**/ ?>