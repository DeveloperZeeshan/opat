<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <link href='<?php echo e(asset('plugins/components/fullcalendar/fullcalendar.css')); ?>' rel='stylesheet'>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row colorbox-group-widget">
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($customerVisit??'0'); ?><span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">Customer Visit</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($visitors??'0'); ?><span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                            <p class="info-text font-12">Total Visitor</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($amount??'0'); ?><span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">Total Amount</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-warning">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($milleage??'0'); ?><span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Milleage</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                
                    
                    
                
                
                    
                    
                        
                            
                        
                        
                            
                        
                    
                
            </div>
        
       
        <!-- ===== Right-Sidebar ===== -->
        <!-- ===== Right-Sidebar-End ===== -->
    </div>

    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Transport Tracker</h3>
                    
                    
                        
                    
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $transporttracker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration??$item->id); ?></td>
                                    <td><?php echo e($item->consumer_name); ?></td>
                                    
                                    <td>

                                         
                                        <a title="Transport Tracker" class="check_transport_detail" style="cursor: pointer;" transport_id="<?php echo e($item->consumer_id); ?>" type="transport_tracker">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Detail
                                            </button>
                                        </a>
                                         


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $transporttracker->appends(['search' => Request::get('search')])->render(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
     <script src='<?php echo e(asset('plugins/components/moment/moment.js')); ?>'></script>
    <script src='<?php echo e(asset('plugins/components/fullcalendar/fullcalendar.js')); ?>'></script>
    <script src='<?php echo e(asset('js/db2.js')); ?>'></script>
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
    </script>
    <script>
        $(document).on('click','.check_transport_detail',function(e){
            var transport_id = $(this).attr('transport_id');
            var type = $(this).attr('type');
            e.preventDefault();
            $.ajax({
                url: '<?php echo e(route("creat_transport_detail_session")); ?>',
                type: "POST",
                data:{
                    _token:'<?php echo e(csrf_token()); ?>',transport_id:transport_id,type:type
                },
                dataType: 'json',
                success: function(data){
                    if (data.result=='ok') {
                        if(data.type=='transport_tracker'){
                            window.location.href = "<?php echo e(route('sub_index')); ?>";
                        }
                    }
                }
            });

        });
    </script>
    <?php echo $__env->make('includes.common_search_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/transportTracker/transport-tracker/index.blade.php ENDPATH**/ ?>