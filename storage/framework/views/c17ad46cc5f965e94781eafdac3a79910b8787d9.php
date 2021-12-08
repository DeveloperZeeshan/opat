<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row colorbox-group-widget">
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count">$1623<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Monthly Rent Amount</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count">$1098<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Amount Recieved</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count">$525<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Amount Due</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            
                
                    
                        
                            
                            
                            
                        
                    
                
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Rent Payment</h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('RentPayment'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/rentPayment/rent-payment/create')); ?>"><i
                                    class="icon-plus"></i> Add Rent Payment</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                <th>Payment Date</th>
                                <th>Monthly Rent Amount $</th>
                                <th>Amount Recieved</th>
                                <th>Amount Due</th>
                                <th>Rent Source</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            <?php $__currentLoopData = $rentpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration??$item->id); ?></td>
                                    <td><input class="form-control" name="" id="" type="text" value="<?php echo e($item->getUserDetail->name??"Not Available"); ?>"></td>
                                     <td><input class="form-control" name="" id="" type="text" value="<?php echo e($item->rent_date); ?>" ></td>
                                    <td><input class="form-control" name="" id="" type="text" value="<?php echo e($item->bed_amount); ?>"></td>
                                    <td><input class="form-control" name="" id="" type="text" value="<?php echo e($item->recieved_amount); ?>"></td>
                                   
                                    <?php
                                        $amount_due= 0;
                                    $amount_due += $item['bed_amount']-$item['recieved_amount'];
                                    ?>
                                    <td><input class="form-control" name="" id="" type="text" value="<?php echo e($amount_due); ?>"></td>
                                    <td><input class="form-control" name="" id="" type="text" value="<?php echo e($item->getUserDetail->profile->rent_source_id); ?>"></td>
                                    <td>

                                        <!-- <a href="<?php echo e(route('sub_index_rent_payment')); ?>"
                                               title="View RentPayment">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Detail
                                                </button>
                                            </a> -->
                                        <button class="btn btn-primary btn-sm rentpayment_edit_button" attr="<?php echo e($item->id); ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true">Update</i>
                                        </button>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('RentPayment'))): ?>
                                            <a href="<?php echo e(url('/rentPayment/rent-payment/' . $item->id)); ?>"
                                               title="View RentPayment">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                        <?php if(!(auth()->user()->hasrole('company') || auth()->user()->hasrole('manager') || auth()->user()->hasrole('finance'))): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('RentPayment'))): ?>
                                            <a href="<?php echo e(url('/rentPayment/rent-payment/' . $item->id . '/edit')); ?>"
                                               title="Edit RentPayment">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('RentPayment'))): ?>
                                            <form method="POST"
                                                  action="<?php echo e(url('/rentPayment/rent-payment' . '/' . $item->id)); ?>"
                                                  accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete RentPayment"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?> 
                                        
                                            
                                        

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $rentpayment->appends(['search' => Request::get('search')])->render(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="rentpayment_edit_modal">
      
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- start - This is for export functionality only -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
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
//
//        $(function () {
//            $('#myTable').DataTable({
//                'aoColumnDefs': [{
//                    'bSortable': false,
//                    'aTargets': [-1] /* 1st one, start by the right */
//                }]
//            });
//
//        });


        $(document).on('click','.rentpayment_edit_button',function(e){
            var id = $(this).attr('attr');
            $.ajax({
                url: "<?php echo e(route('rent_payment_edit_record')); ?>/"+id,
                method: "GET",
                success:function(data){
                    $('#rentpayment_edit_modal').show();
                    $('#rentpayment_edit_modal').html(data);
                }
          });
        });
        $(document).on('click','.rentpayment_edit_close_button',function(e){
           $('#rentpayment_edit_modal').hide();
        });

//Print, CSV, PDF
                $(document).ready(function() {
                    $('#myTable').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'print',
                                text: 'PRINT',
//                                className: 'btn btn-info btn-sm',
                                exportOptions: {
                                    columns: 'th:not(:last-child) '
                                }
                            },
                            {
                                extend: 'csv',
                                text: 'CSV',
//                                className: 'btn btn-info btn-sm',
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'copy',
                                text: 'COPY',
//                                className: 'btn btn-info btn-sm',
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'excel',
                                text: 'EXCEL',
//                                className: 'btn btn-info btn-sm',
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
//                                className: 'btn btn-info btn-sm',
                                exportOptions: {
                                    columns: 'th:not(:last-child)'

                                }
                            },
                        ]

                    });
                });

    </script>
<?php echo $__env->make('includes.common_search_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/rentPayment/rent-payment/index.blade.php ENDPATH**/ ?>