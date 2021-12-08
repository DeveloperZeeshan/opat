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
                    <h3 class="box-title pull-left">Medication</h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('Medication'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/medication/medication/create')); ?>"><i
                                    class="icon-plus"></i> Add Medication</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                <th>Medication Date</th>
                                <th>Medication Description</th>
                                <th>Frequency Taken</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $medication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration??$item->id); ?></td>
                                    <td><input class="form-control" name="name" id="name" type="text" value="<?php echo e($item->getConsumerDetail->name??"Not Available"); ?>" readonly></td>
                                    <td><input class="form-control" name="start_date" id="start_date" type="date" value="<?php echo e($item->start_date??"Not Available"); ?>" onchange="acceptstatus('<?php echo e($item->id); ?>','start_date')"></td>
                                    <td><input class="form-control" name="medication" id="medication" type="text" value="<?php echo e($item->medication??"Not Available"); ?>" onchange="acceptstatus('<?php echo e($item->id); ?>','medication')"></td>
                                    <td><input class="form-control" name="frequency_taken" id="frequency_taken" type="text" value="<?php echo e($item->frequency_taken??"Not Available"); ?>" onchange="acceptstatus('<?php echo e($item->id); ?>','frequency_taken')"></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Medication'))): ?>
                                            <a href="<?php echo e(url('/medication/medication/' . $item->id)); ?>"
                                               title="View Medication">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('Medication'))): ?>
                                            <a href="<?php echo e(url('/medication/medication/' . $item->id . '/edit')); ?>"
                                               title="Edit Medication">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('Medication'))): ?>
                                            <form method="POST"
                                                  action="<?php echo e(url('/medication/medication' . '/' . $item->id)); ?>"
                                                  accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Medication"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        <?php endif; ?>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $medication->appends(['search' => Request::get('search')])->render(); ?> </div>
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


        function acceptstatus(id,column) {
            if (column == 'start_date') {
                var value = $('#start_date').val();
            }
            if(column == 'medication'){
                var value = $('#medication').val();
            }
            if(column == 'frequency_taken'){
                var value = $('#frequency_taken').val();
            }


            swal({
                title: "Are you sure?",
                text: "Do you really want to change the value!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                    .then((willdelete) => {
                if (willdelete) {
                    console.log(id);
                    console.log(value);
                    console.log(column);
                    $.get('<?php echo e(URL::to("medication_update")); ?>/'+id+'/'+value+'/'+column,function(data){
                        console.log(data);
                        window.location.reload();

                    });
                    swal("Your user data has been updated!", {
                        icon: "success",

                    });
                }else {
                    swal("Your user data has not changed!");
        }
        });
        }

    </script>
<?php echo $__env->make('includes.common_search_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/medication/medication/index.blade.php ENDPATH**/ ?>