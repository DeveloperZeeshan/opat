    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
       href="javascript:void(0);">
        <i class="icon-speech"></i>
        <span class="badge badge-xs badge-danger"><?php echo e($allNotifications->count()); ?></span>
    </a>
    <ul class="dropdown-menu mailbox animated bounceInDown">
        <li>
            <div class="drop-title">You have <?php echo e($allNotifications->count()); ?> new messages</div>
        </li>
        <li>
            <div class="message-center">
                <?php $__currentLoopData = $allNotifications->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('yacht-availablity',$allNotification->id)); ?>">
                        <div class="user-img">
                            <span class="profile-status online pull-right"></span>
                        </div>
                        <div class="mail-contnet">
                            <h5><?php echo e($allNotification->title??''); ?></h5>
                            <span class="mail-desc"><?php echo e($allNotification->subject); ?></span>
                            <span class="time"><?php echo e($allNotification->date); ?></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>
        <li>
            <a href="<?php echo e(route('yacht-availablity','all')); ?>">
                <strong>See all notifications</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/includes/get_notifications.blade.php ENDPATH**/ ?>