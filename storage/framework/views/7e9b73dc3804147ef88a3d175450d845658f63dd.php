<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="<?php echo e('/dashboard'); ?>">
                <b>
                    
                   <img src="" alt="">
                </b>
                <span>
                    
                    <a href="<?php echo e(url('/')); ?>"><span><?php echo e(env('SITE_TITLE')); ?> </span></a>
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <?php if(session()->get('theme-layout') != 'fix-header'): ?>
                <li class="sidebar-toggle">
                    <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                </li>
            <?php endif; ?>


            <li>
                <form role="search" class="app-search hidden-xs">
                    <i class="icon-magnifier"></i>
                    <input type="text" placeholder="Search..." class="form-control">
                </form>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown" id="user_notification">
            </li>
            <?php if($companyDetail = App\Company::where('user_id',Auth::id())->orderBy('id','DESC')->first()): ?>
                <?php
                    $expiryDate = $companyDetail->created_at->addDays($companyDetail->getPackageDetail->validity_days);                    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d h:i:s'));
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $expiryDate);
                    $remaining_package_days = $to->diffInDays($from);
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                       href="javascript:void(0);">
                        <i class="icon-calender"></i>
                        <span class="badge badge-xs badge-danger"><?php echo e($remaining_package_days??"Not Available"); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                        <li>
                            <a href="javascript:void(0);">
                                <div>
                                    <p>
                                        <!-- <span class="pull-right text-muted"> Package Expiry Date </span> -->
                                        <strong>
                                            <?php if($companyDetail->getPackageDetail->price<=0): ?> Trial <?php else: ?> Package <?php endif; ?> Expires On <?php echo e($expiryDate->format('d-M-Y')??"Not Available"); ?>

                                            <!-- 23-April-2023 -->
                                        </strong>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-center" href="javascript:void(0);">
                                <strong>Upgrade Package</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li> 
            <?php endif; ?>
            <li class="right-side-toggle">
                <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                    <i class="icon-settings"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
    $(document).ready(function(e){
        getUpdatedMessagesCount();
        var interval = setInterval(function() {
            getUpdatedMessagesCount();
        }, 10000);
//        clearInterval(interval);
        function getUpdatedMessagesCount(){
            $.ajax({
                type: "get",
                url: "<?php echo e(route('get_messages_count')); ?>"
            }).success(function(result) {
                $('#user_notification').html(result);
            }).error(function(error){});
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/layouts/partials/navbar.blade.php ENDPATH**/ ?>