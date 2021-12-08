<?php $__env->startSection('content'); ?>
<style type="text/css">
    tbody tr {
    background: #4b848e12;
}

.table>thead>tr>th {
    vertical-align: middle;
    border-bottom: 1px solid #4B848E;
    background: #4B848E;
    color: white;
    text-transform: uppercase;
    font-weight: 700;
}
</style>
    <div class="container-fluid">
        <!-- .row -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Rent Payment <?php echo e($rentpayment->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('RentPayment'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/rentPayment/rent-payment')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($rentpayment->id); ?></td>
                            </tr>
                            <tr><th> Consumer Id </th><td> <?php echo e($rentpayment->consumer_id); ?> </td></tr><tr><th> Rent Date </th><td> <?php echo e($rentpayment->rent_date); ?> </td></tr><tr><th> Bed Amount </th><td> <?php echo e($rentpayment->bed_amount); ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr> -->         
        <div class="row">
            <div class="col-md-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('RentPayment'))): ?>
                    <a class="btn btn-success pull-right" href="<?php echo e(url('/rentPayment/rent-payment')); ?>">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                <?php endif; ?>
                <div class="clearfix"></div>
                <div class="white-box printableArea">
                    <h3><b>Rent Payment Invoice</b> <span class="pull-right">#<?php echo e($rentpayment->id); ?></span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img align="center" src='<?php echo e(asset('website/images/logo.png')); ?>' alt="Profile Picture"style="width: 150px">
                            <hr>
                        </div>
                        <div class="col-md-12 address_box">
                            <div class="pull-left">
                               <address>
                                     
                                </address> 

                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Caretaker,</h3>
                                    <h4 class="font-bold"><?php echo e($rentpayment->getAddedByDetail->name??"Not Available"); ?></h4>
                                    <p class="text-muted m-l-30"><?php echo e($rentpayment->getAddedByDetail->profile->address??"Not Available"); ?></p>
                                    <p class="m-t-10"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?php echo e(DateTime::createFromFormat('Y-m-d',date('Y-m-d'))->format('jS').date(' M Y')); ?></p>
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
                                            
                                            <th class="text-right">Payment Date</th>
                                            <th class="text-right">Monthly Rent Amount</th>
                                            
                                            <th class="text-right">Amount Recieved</th>
                                            <th class="text-right">Total Due</th>
                                        </tr>
                                        </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $rentpayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rentpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($rentpayment->getConsumerDetail->name??"Not Available"); ?></td>
                                            
                                            <td class="text-right"> <?php echo e(date('d-M-Y',strtotime($rentpayment->rent_date??''))); ?></td>
                                            <td class="text-right"> $<?php echo e($rentpayment->bed_amount??''); ?> </td>
                                            <td class="text-right">$<?php echo e($rentpayment->recieved_amount??''); ?></td>
                                            <td class="text-right">$<?php echo e($rentpayment->due_amount??''); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: $<?php echo e($total); ?></p>
                                <p>vat (0%) : $0 </p>
                                <hr>
                                <h3><b>Total :</b> $<?php echo e($total); ?></h3> </div>
                            <div class="pull-left m-t-30 text-right">
                                <br>
                                <br>
                                <br>
                                <br>
                                <h3 align="center">Signature : ___________________________</h3> 
                            </div>
                                </div>
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
                <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="<?php echo URL::route('rent_payment_email'); ?>" >
                    <?php echo e(csrf_field()); ?>

                    <div class="form-row" >
                    <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                    <input type="hidden" class="form-control" id="consumer_id" name="consumer_id" value="<?php echo e($rentpayment->getConsumerDetail->id??''); ?>">
                    <input type="hidden" class="form-control" id="caretaker_name" name="caretaker_name" value="<?php echo e($rentpayment->getAddedByDetail->name??''); ?>">
                    <input type="hidden" class="form-control" id="caretaker_address" name="caretaker_address" value="<?php echo e($rentpayment->getAddedByDetail->profile->address??''); ?>">
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
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/rentPayment/rent-payment/show.blade.php ENDPATH**/ ?>