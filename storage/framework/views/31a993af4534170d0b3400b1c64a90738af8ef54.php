<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<style>
    .consumer_card_content {
        display: flex;
        background-color: #fff;
        padding: 5px 5px;
        margin: 10px 0;
        box-shadow: 0 0 15px #0000007a;
        border-radius: 5px;
    }

    .consumer_card_content .consumer_image {
        max-width: 30%;
    }

    .consumer_card_content .consumer_image img {
        height: 90px;
        width: 90px;
    }

    .consumer_content {
        max-width: 70%;
        margin-left: 45px;
        text-align: center;
    }
    .consumer_card_content .consumer_content h2 { font-size: 14px; margin: 0 0 10px; }
    .consumer_card_content .consumer_content .facility_name {
        font-size: 20px;
        font-weight: 700;
        color: #000;
    }
    .single_post_consumer .consumer_card_content {
        background-color: transparent;
        box-shadow: unset;
    }
    .single_post_consumer .consumer_content {
        max-width: 70%;
        margin-left: 10px;
        text-align: left;
    }
    .single_post_consumer .Caretaker {
        display: block;
        font-size: 15px;
        font-weight: 700;
        color: #000;
    }
    .single_post_consumer .consumer_content .person_detail {
        padding: 0;
        list-style: none;
        display: flex;
    }
    .single_post_consumer .consumer_card_content .consumer_content h2 { font-size: 14px; margin: 0 0 0px; line-height: 17px; }
    .single_post_consumer .consumer_content .person_detail li .age {
        font-weight: 600;
        color: #000;

    }
    .single_post_consumer .consumer_content .person_detail li {
        margin-left: 10px;
        color: #000;
    }
    .single_post_consumer .consumer_content .person_detail li:first-child {
        margin-left: 0;

    }
    .single_post_consumer .consumer_card_content .consumer_content .facility_name {
        font-size: 15px;
    }
    .single_post_consumer {
        background-color: #F0FBFD;
        padding: 10px 10px;
        box-shadow: 0 0 15px #0000007a;
        margin: 10px 0;
        border-radius:15px;
    }
    .education_documents h1 {
        font-size: 25px;
        margin-bottom: 0px;
        line-height: 1.2;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Resident</h3>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="table-responsive">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('Consumer'))): ?>
                                    <a class="btn" href="<?php echo e(url('/consumer/consumer/create' )); ?>"><img src="<?php echo e(asset('website/images/plus.png')); ?>" style="height:75px;"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Add Resident</span>
                                </div>
                            </div>

                        </div>
                        <?php $__currentLoopData = $consumer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Consumer'))): ?>
                            <a href="<?php echo e(url('/consumer/consumer/' . $item->id)); ?>"
                               title="View Consumer">
                            <div class="col-md-3">
                                <div class="consumer_card_content">
                                    <div class="consumer_image">
                                        <img src="<?php echo e(asset('website')); ?>/<?php echo e($item->getUserDetail->profile->pic??''); ?>" alt="" class="img-fluid">
                                        
                                    </div>
                                    <div class="consumer_content">
                                        <h2><?php echo e($item->getUserDetail->name??''); ?></h2>
                                        <span class="facility_name"><?php echo e($item->getUserDetail->profile->facility_name??''); ?></span>
                                    </div>
                                </div>

                            </div>
                            </a>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="pagination-wrapper"> <?php echo $consumer->appends(['search' => Request::get('search')])->render(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            <?php if(\Session::has('message')): ?>
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '<?php echo e(session()->get('message')); ?>',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            <?php endif; ?>
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
        $(document).on('click','.check_consumer_detail',function(e){
            var consumer_id = $(this).attr('consumer_id');
            var type = $(this).attr('type');
            e.preventDefault(); 
            $.ajax({
                url: '<?php echo e(route("creat_consumer_detail_session")); ?>',
                type: "POST",
                data:{ 
                    _token:'<?php echo e(csrf_token()); ?>',consumer_id:consumer_id,type:type
                },
                dataType: 'json',
                success: function(data){
                    if (data.result=='ok') {
                        if(data.type=='rent_payment'){
                            window.location.href = "<?php echo e(url('rentPayment/rent-payment')); ?>";
                        }else if(data.type=='incident_report'){
                            window.location.href = "<?php echo e(url('incidentReport/incident-report')); ?>";
                        }else if(data.type=='medications'){
                            window.location.href = "<?php echo e(url('medication/medication')); ?>";
                        }
                    }
                }
            }); 

        });

        //transport tracker
         $(document).on('click','.transport_tracker_id',function(e){
            var consumer_id = $(this).attr('attr');
            $.ajax({
                url: "<?php echo e(route('tracker_id_session')); ?>/"+consumer_id,
                type:'get',
                success: function(response) {
                    location.href = "<?php echo e(url('transportTracker/transport-tracker/create')); ?>";
                }
            });
        });
    </script>
<?php echo $__env->make('includes.common_search_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/consumer/consumer/index.blade.php ENDPATH**/ ?>