<?php $__env->startPush('css'); ?>
<style>
    .table>thead>tr>th {
        vertical-align: middle;
        border-bottom: 1px solid #0F4C82;
        background: #0F4C82;
        color: white;
        text-transform: uppercase;
        font-weight: 700;
    }

    .btn-default.btn-outline {
        background-color: #0F4C82 !important;
        color: #fff;
    }
    .btn-default, .btn-default.disabled {
        background: #4B848E!important;
        border: 2px solid #e5ebec;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Incident Report <?php echo e($incidentreport->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('IncidentReport'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/incidentReport/incident-report')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($incidentreport->id); ?></td>
                            </tr>
                            <tr><th> Consumer Id </th><td> <?php echo e($incidentreport->consumer_id); ?> </td></tr><tr><th> Nature Of Incident </th><td> <?php echo e($incidentreport->nature_of_incident); ?> </td></tr><tr><th> Incident Detail </th><td> <?php echo e($incidentreport->incident_detail); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
         -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="box-title pull-left">Incident Report <?php echo e($incidentreport->id); ?></h3>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('IncidentReport'))): ?>
                    <a class="btn btn-success pull-right" href="<?php echo e(url('/incidentReport/incident-report')); ?>">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                <?php endif; ?>
                <div class="clearfix"></div>
                <div class="white-box printableArea">
                    <h3><b>Incident Report Invoice</b> <span class="pull-right">#<?php echo e($incidentreport->id); ?></span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <img align="center" src="<?php echo e(asset('website/profilePicture/DiOSlx4gbKTVwsSUPTpBZpUU7S3yiDJhvhtYF51g.png')); ?>" alt="Profile Picture" style="width: 90px">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Company <?php echo e($incidentreport->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->name??''); ?></b></h3>
                                    <p class="text-muted m-l-5"><?php echo e($incidentreport->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->profile->address??''); ?></p>
                                </address>

                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Caretaker,</h3>
                                    <h4 class="font-bold"><?php echo e($incidentreport->getAddedByDetail->name??"Not Available"); ?></h4>
                                    <p class="text-muted m-l-30"><?php echo e($incidentreport->getAddedByDetail->profile->address??"Not Available"); ?></p>
                                    <p class="m-t-30"><b>Incident Date :</b> <i class="fa fa-calendar"></i> <?php echo e(DateTime::createFromFormat('Y-m-d',date('Y-m-d'))->format('jS').date(' M Y')); ?></p>
                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <input type="date" name="" value="<?php echo e(date('Y-m-d')); ?>" /> </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Caretaker</th>
                                            <th class="text-left">Nature Of Incident</th>
                                            <th class="text-left">Incident Detail</th>
                                            <th class="text-left">Additional Notes</th>
                                            <th class="text-left">Incident Date</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td><?php echo e($incidentreport->getConsumerDetail->name??"Not Available"); ?></td>
                                            <td><?php echo e($incidentreport->getAddedByDetail->name??"Not Available"); ?></td>
                                            <td class="text-left"> <?php echo e($incidentreport->nature_of_incident??"Not Available"); ?> </td>
                                            <td  width="25%" class="text-left"> <?php echo e($incidentreport->incident_detail??"Not Available"); ?> </td>
                                            <td  width="25%" class="text-left"> <?php echo e($incidentreport->additional_notes??"Not Available"); ?> </td>
                                            <td class="text-left"> <?php echo e($incidentreport->incident_date??"Not Available"); ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <h5 align="center">Signature :<input></h5></div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <!-- <button class="btn btn-danger" type="submit"> Proceed to payment </button> -->
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                <a title="email" style="cursor: pointer;" class="email" data-toggle="modal" id="email" data-target="#exampleModal" >
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-envelope-square" aria-hidden="true"></i> Send Email

                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
    
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Enter Email</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="<?php echo URL::route('incident_report_email'); ?>" >
                        <?php echo e(csrf_field()); ?>

                        <div class="form-row" >
                            <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                            <input type="hidden" class="form-control" id="consumer_id" name="consumer_id" value="<?php echo e($incidentreport->consumer_id??''); ?>">
                            <input type="hidden" class="form-control" id="caretaker_name" name="caretaker_name" value="<?php echo e($incidentreport->getAddedByDetail->name??''); ?>">
                            <input type="hidden" class="form-control" id="caretaker_address" name="caretaker_address" value="<?php echo e($incidentreport->getAddedByDetail->profile->address??''); ?>">
                            <input type="hidden" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo e(date('Y-m-d')); ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/jquery.PrintArea.js')); ?>" type="text/JavaScript"></script>
    <script>
        $(function() {
            $("#print").on("click", function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).on('click','#email',function(e){
            $('.modal').modal('show');
        });
        $('plugin').hide();
        $('plugin').css('display','none');
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/incidentReport/incident-report/show.blade.php ENDPATH**/ ?>