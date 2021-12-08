<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create Role</h3>
                    <a class="btn btn-success pull-right" href="<?php echo e(url('role-management')); ?>"><i class="icon-eye"></i>
                        &nbsp; View Roles</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-horizontal" method="post" action="<?php echo e(url('role/create')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Role Name</label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                               name="name" value="<?php echo e(old('name')); ?>" autofocus>
                                        <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                        <?php endif; ?> </div>
                                </div>

                                <table class="table table-striped">
                                    <tr>
                                        <th colspan="6" class="text-center">Grant Permissions</th>
                                    </tr>
                                    <tr>
                                        <th>No.</th>
                                        <th>Menu</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Add</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    <?php $__currentLoopData = $laravelAdminMenus->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count(collect($section->items)) > 0): ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <input type="checkbox" value="" name="all_view" id="all_view">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" value="" name="all_add" id="all_add">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" value="" name="all_edit" id="all_edit">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" value="" name="all_delete" id="all_delete">
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = $section->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($menu->title); ?></td>
                                                    <?php $permissions = \App\Permission::permissionList($menu->title);
                                                    ?>

                                                    <td class="text-center">
                                                        <input type="checkbox" class="view" name="permissions[]"
                                                               value="<?php echo e($permissions['view']); ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="add" name="permissions[]"
                                                               value="<?php echo e($permissions['add']); ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="edit" name="permissions[]"
                                                               value="<?php echo e($permissions['edit']); ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="delete" name="permissions[]"
                                                               value="<?php echo e($permissions['delete']); ?>">
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>

                                <div class="form-group m-b-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                                            Grant
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <?php echo $__env->make('layouts.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>
    <script>

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

        $(document).ready(function () {
            //Select all View check boxes
            $('#all_view').click(function () {
                if ($(this).attr("checked")) {
                    $('.view').click();
                } else {
                    $('.view').click();
                }
            });

            //Select all Add check boxes
            $('#all_add').click(function () {
                if ($(this).attr("checked")) {
                    $('.add').click();
                } else {
                    $('.add').click();
                }
            });

            //Select all Edit check boxes
            $('#all_edit').click(function () {
                if ($(this).attr("checked")) {
                    $('.edit').click();
                } else {
                    $('.edit').click();
                }
            });

            //Select all Delete check boxes
            $('#all_delete').click(function () {
                if ($(this).attr("checked")) {
                    $('.delete').click();
                } else {
                    $('.delete').click();
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/role/create.blade.php ENDPATH**/ ?>