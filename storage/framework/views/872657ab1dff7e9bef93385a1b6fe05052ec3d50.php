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
            <div class="single_post_consumer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="consumer_card_content">
                            <div class="consumer_image">
                                <img src="<?php echo e(asset('website/').'/'. $consumer->getUserDetail->profile->pic??''); ?>" alt="" class="img-fluid">
                            </div>
                            <div class="consumer_content">
                                <h2><?php echo e($consumer->getUserDetail->name??"Not Available"); ?></h2>
                                <ul class="person_detail">
                                    <li><span class="age">Phone :</span><?php echo e($consumer->getUserDetail->profile->phone??''); ?> </li>
                                    <li><span class="age">Email :</span> <?php echo e($consumer->getUserDetail->email??''); ?> </li>
                                    <li><span class="age">DOB :</span><?php echo e($consumer->getUserDetail->profile->dob??''); ?> </li>
                                </ul>
                                <ul class="person_detail">
                                    <li><span class="age">Package :</span> <?php echo e($consumer->getPackageDetails->name??''); ?> </li>
                                    <li><span class="age">SSN :</span> <?php echo e($consumer->getUserDetail->profile->nation_id_card??''); ?> </li>
                                    <li><span class="age">City:</span> <?php echo e($consumer->getUserDetail->profile->city??''); ?> </li>
                                </ul>
                                <span class="facility_name"> <?php echo e($consumer->getUserDetail->profile->facility_name??"Not Available"); ?></span>
                                <span class="Caretaker"><?php echo e($consumer->getCompanyDetail->getUserDetail->name??"Not Available"); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="education_documents">
                            <h1>Entry Date:</h1><p><?php echo e($consumer->getUserDetail->profile->entry_date??''); ?> </p>
                            <h1>Education Level:</h1><p><?php echo e($consumer->getUserDetail->profile->getEducationLevelDetail->name); ?> </p>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="col-md-1">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('Consumer'))): ?>
                        <a href="<?php echo e(url('/consumer/consumer/' . $consumer->id . '/edit')); ?>"
                           title="Edit Resident">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </button>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="white-box">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Consumer'))): ?>
                        <a class="btn btn-success pull-left" href="<?php echo e(url('/consumer/consumer')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> View Resident List</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="table-responsive">
                        <a title="tracker" style="cursor: pointer;" class="transport_tracker_id" attr="<?php echo e($consumer->id); ?>" type="tracker">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/1.jfif')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Transport Tracker</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="cognitive Psycological" class="cognitive_id" style="cursor: pointer;" attr="<?php echo e($consumer->id); ?>" type="cognitive">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/2.jfif')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Cognitive Psycological</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Medications" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="medications">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/3.jfif')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Medical History</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a href="<?php echo e(route('yacht-availablity','all')); ?>"  title="View Resident">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/4.jpg')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Calender</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a href="<?php echo e(url('/finance/finance')); ?>"  title="View Resident">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/5.jpg')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Finance</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Incident Reports" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="incident_report">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/6.jfif')); ?>" alt="" class="img-fluid">

                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Incident Report</span>
                                </div>
                            </div>
                        </div>
                        </a>

                        <a title="Rent Payments" class="check_consumer_detail" style="cursor: pointer;" consumer_id="<?php echo e($consumer->user_id); ?>" type="rent_payment">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/7.jfif')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Rent Payment</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Social Service Elogibility" class="service_id" style="cursor: pointer;" attr="<?php echo e($consumer->id); ?>" type="service">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="<?php echo e(asset('website/images/8.jfif')); ?>" alt="" class="img-fluid">
                                    
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Social Service Eligibility</span>
                                </div>
                            </div>
                        </div>
                        </a>

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
                    else if(data.type=='cognitive'){
                        window.location.href = "<?php echo e(url('cognitivePsycological/cognitive-psycological')); ?>";
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
    //Cognitive Psycological
    $(document).on('click','.cognitive_id',function(e){
        var consumer_id = $(this).attr('attr');
        $.ajax({
            url: "<?php echo e(route('cognitive_id_session')); ?>/"+consumer_id,
            type:'get',
            success: function(response) {
                location.href = "<?php echo e(url('cognitivePsycological/cognitive-psycological/create')); ?>";
            }
        });
    });

    //Social Service Eligibility
    //Cognitive Psycological
    $(document).on('click','.service_id',function(e){
        var consumer_id = $(this).attr('attr');
        $.ajax({
            url: "<?php echo e(route('service_id_session')); ?>/"+consumer_id,
            type:'get',
            success: function(response) {
                location.href = "<?php echo e(url('socialServiceEligibility/social-service-eligibility/create')); ?>";
            }
        });
    });
</script>

<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/consumer/consumer/show.blade.php ENDPATH**/ ?>