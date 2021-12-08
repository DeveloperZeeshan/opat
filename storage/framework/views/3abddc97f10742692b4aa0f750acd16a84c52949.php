

<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                                <th>Pickup</th>
                                <th>Drop Off</th>
                                <th>Date</th>
                                <th>Notes</th>
                                <th>Miles</th>
                                <th>Rate($/mile)</th>
                                <th>Purpose</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $transporttracker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration??$item->id); ?></td>
                                    <td><?php echo e($item->consumer_name); ?></td>
                                    <td><?php echo e($item->pickup); ?></td>
                                    <td><?php echo e($item->drop_off); ?></td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td><?php echo e($item->notes); ?></td>
                                    <td><?php echo e($item->milleage); ?></td>
                                    <td><?php echo e($item->amount); ?></td>
                                    <td><a class="btn btn-info"><i class="fa fa-briefcase"></i> <?php echo e($item->purpose); ?></a></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('TransportTracker'))): ?>
                                            <a href="<?php echo e(url('/transportTracker/transport-tracker/' . $item->id)); ?>"
                                               title="View TransportTracker">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('TransportTracker'))): ?>
                                            <a href="<?php echo e(url('/transportTracker/transport-tracker/' . $item->id . '/edit')); ?>"
                                               title="Edit TransportTracker">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('TransportTracker'))): ?>
                                            <form method="POST"
                                                  action="<?php echo e(url('/transportTracker/transport-tracker' . '/' . $item->id)); ?>"
                                                  accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete TransportTracker"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        <?php endif; ?>


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

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/transportTracker/transport-tracker/sub_index.blade.php ENDPATH**/ ?>