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
                    <h3 class="box-title pull-left">Feedback</h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('Feedback'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/feedback/feedback/create')); ?>"><i
                                    class="icon-plus"></i> Add Feedback</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th><th>Message</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::user()->name !="User" ): ?>
                                    <?php if(Auth::id() != $item->company_id): ?> <?php continue; ?>  <?php endif; ?>
                                <?php endif; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration??$item->id); ?></td>
                                    <td><?php echo e($item->getUserDetail->name??"Not Available"); ?></td>
                                    <td><?php echo e($item->message); ?></td>
                                    <td><?php echo $item->status_detail; ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Feedback'))): ?>
                                            <a href="<?php echo e(url('/feedback/feedback/' . $item->id)); ?>"
                                               title="View Feedback">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a href="<?php echo e(url('/feedback/feedback/' . $item->id)); ?>"
                                               title="View Feedback">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Reply
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('Feedback'))): ?>
                                            <a href="<?php echo e(url('/feedback/feedback/' . $item->id . '/edit')); ?>"
                                               title="Edit Feedback">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('Feedback'))): ?>
                                            <form method="POST"
                                                  action="<?php echo e(url('/feedback/feedback' . '/' . $item->id)); ?>"
                                                  accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Feedback"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        <?php endif; ?>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $feedback->appends(['search' => Request::get('search')])->render(); ?> </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/fedback/feedback/index.blade.php ENDPATH**/ ?>