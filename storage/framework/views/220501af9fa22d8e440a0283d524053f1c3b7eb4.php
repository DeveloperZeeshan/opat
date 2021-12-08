<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/icheck/skins/all.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet"/>
    
    <link href="<?php echo e(asset('plugins/components/jqueryui/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <style>

        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;
        }
        .nav-pills>li>a{
            cursor: default;;
            background-color: inherit;
        }
        .nav-pills>li>a:focus,.nav-tabs>li>a:focus, .nav-pills>li>a:hover, .nav-tabs>li>a:hover {
            border: 1px solid transparent!important;
            background-color: inherit!important;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }
        .error-block{
            background-color: #ff9d9d;
            color: red;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Account Settings</h3>
                    <div class="clearfix"></div>
                    <form id="commentForm" action="<?php echo e(url('account-settings')); ?>"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

                        <div id="rootwizard">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                <li><a href="#tab3" data-toggle="tab">Address</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group <?php echo e($errors->first('name', 'has-error')); ?>">
                                        <label for="name" class="col-sm-2 control-label">Name *</label>
                                        <div class="col-sm-10">
                                            <input id="name" name="name" type="text"
                                                   placeholder="Name" class="form-control required"
                                                   value="<?php echo e($user->name); ?>"/>

                                            <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                   class="form-control required email" value="<?php echo e($user->email); ?>"/>
                                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                    <h6><b>If you don't want to change password... please leave them empty</b></h6>

                                    <div class="form-group <?php echo e($errors->first('password', 'has-error')); ?>">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control required" value="<?php echo old('password'); ?>"/>
                                            <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('password_confirmation', 'has-error')); ?>">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirmation" name="password_confirmation"
                                                   type="password"
                                                   placeholder="Confirm Password " class="form-control required"/>
                                            <?php echo $errors->first('password_confirmation', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group  <?php echo e($errors->first('dob', 'has-error')); ?>">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input autocomplete="off" value="<?php echo e($user->profile->dob ?: null); ?>" id="dob" name="dob" type="text"  class="form-control"
                                                   data-date-format="YYYY-MM-DD"
                                                   placeholder="yyyy-mm-dd"/>
                                            <span class="help-block"><?php echo e($errors->first('dob', ':message')); ?></span>

                                        </div>
                                    </div>


                                    <div class="form-group <?php echo e($errors->first('pic_file', 'has-error')); ?>">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;">
                                                    <?php if($user->profile->pic != null): ?>
                                                        <img src="<?php echo e(asset('website/'.$user->profile->pic)); ?>" alt="profile pic">
                                                    <?php else: ?>
                                                        <img src="http://placehold.it/200x200" alt="profile pic">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block"><?php echo e($errors->first('pic_file', ':message')); ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio
                                            <small>(brief intro) *</small>
                                        </label>
                                        <div class="col-sm-10">
                        <textarea name="bio" id="bio" class="form-control resize_vertical"
                                  rows="4"><?php echo e($user->profile->bio); ?></textarea>
                                        </div>
                                        <?php echo $errors->first('bio', '<span class="help-block">:message</span>'); ?>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">
                                    <div class="form-group <?php echo e($errors->first('gender', 'has-error')); ?>">
                                        <label for="email" class="col-sm-2 control-label">Gender *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male"
                                                        <?php if($user->profile->gender === 'male'): ?> selected="selected" <?php endif; ?> >Male
                                                </option>
                                                <option value="female"
                                                        <?php if($user->profile->gender === 'female'): ?> selected="selected" <?php endif; ?> >
                                                    Female
                                                </option>
                                                <option value="other"
                                                        <?php if($user->profile->gender === 'other'): ?> selected="selected" <?php endif; ?> >Other
                                                </option>

                                            </select>
                                            <span class="help-block"><?php echo e($errors->first('gender', ':message')); ?></span>
                                        </div>

                                    </div>

                                    <div class="form-group <?php echo e($errors->first('country', 'has-error')); ?>">
                                        <label for="country" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            <input id="countries" name="country" type="text"
                                                   class="form-control"
                                                   value="<?php echo e($user->profile->country); ?>"/>
                                            <span class="help-block"><?php echo e($errors->first('country', ':message')); ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('state', 'has-error')); ?>">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" type="text"
                                                   class="form-control"
                                                   value="<?php echo e($user->profile->state); ?>"/>
                                            <span class="help-block"><?php echo e($errors->first('state', ':message')); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('city', 'has-error')); ?>">
                                        <label for="city" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" type="text" class="form-control"
                                                   value="<?php echo e($user->profile->city); ?>"/>
                                            <span class="help-block"><?php echo e($errors->first('city', ':message')); ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('address', 'has-error')); ?>">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control"
                                                   value="<?php echo e($user->profile->address); ?>"/>
                                            <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('postal', 'has-error')); ?>">
                                        <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                        <div class="col-sm-10">
                                            <input id="postal" name="postal" type="text" class="form-control"
                                                   value="<?php echo e($user->profile->postal); ?>"/>
                                            <span class="help-block"><?php echo e($errors->first('postal', ':message')); ?></span>

                                        </div>
                                    </div>
                                </div>

                                <ul class="pager wizard">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                    <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>


                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">Errors! Please fill form with proper details</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/icheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/icheck/icheck.init.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>
    
    <script src="<?php echo e(asset('plugins/components/jqueryui/jquery-ui.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>
    <script src="<?php echo e(asset('js/edituser.js')); ?>"></script>

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
    </script>
    <script>
        $("#dob").datepicker({
            dateFormat: 'yy-m-d',
            SetDate:"<?php echo e($user->profile->dob); ?>",
            widgetPositioning:{
                vertical:'bottom'
            },
            keepOpen:false,
            useCurrent: false,
            maxDate: moment().add(1,'h').toDate()
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/users/account-settings.blade.php ENDPATH**/ ?>