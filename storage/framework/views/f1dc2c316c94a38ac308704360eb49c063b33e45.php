<?php $__env->startPush('css'); ?>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
        
    </style>
    <link href="<?php echo e(asset('plugins/components/calendar/dist/fullcalendar.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row colorbox-group-widget">
            <!-- <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count">&#36;<?php echo e($rentPaymentCount??000); ?> <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Rent Payments</p>
                            <p class="info-ot font-15">Pending<span class="label label-rounded">0</span></p>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-4 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($incidentReportsCount??0); ?><span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                            <p class="info-text font-12">Incident Reports</p>
                            <p class="info-ot font-15">Closed<span class="label label-rounded">0</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo e($medicationReportsCount??0); ?> <span class="pull-right"><i class="mdi mdi-medical-bag"></i></span></h3>
                            <p class="info-text font-12">Medications</p>
                            <p class="info-ot font-15">Pending<span class="label label-rounded">0</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-warning">
                        <div class="media-body">
                            <h3 class="info-count">0 <span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">Consumers</p>
                            <p class="info-ot font-15">Limit<span class="label label-rounded">0</span></p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
            
                
                    
                
            
        
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Calendar Information</h4>
                </div>
                <form method="post" action="<?php echo e(route('yacht-availablity-process')); ?>" id="availablity_modal_form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="action_type" id="action_type">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Selected Date</label>
                            <input type="text" name="date" id="selected_date" readonly class="form-control">
                            <label for="yacht_id" class="control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                            <label for="name='yacht_option'" class="control-label">Subject</label><br>
                            <input type="text" name="subject" id="subject" class="form-control" required>
                            <div class="form-group">
                                <label for="comment" class="control-label">Comment:</label>
                                <textarea class="form-control" id="comment" rows="5" name="comment" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_record">Save</button>
                        <button type="button" class="btn btn-danger" style="display: none;" id="delete_record">Delete</button>
                        <button type="submit" class="btn btn-info" style="display: none;" id="update_record">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('plugins/components/calendar/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    $('#calendar').fullCalendar({

        header: {
            right: 'month,listYear,prev,next',
        },
        dayClick: function(date, jsEvent, view) {
            $('#availablity_modal_form').trigger("reset");
            $('#save_record').show();
            $('#delete_record').hide();
            $('#update_record').hide();
            $('#selected_date').val(date.format());
            $('#exampleModal').modal('show');
            $('#modalTitle').text(date.format());
            $('#action_type').val('new_record');
            $('#fullCalModal').modal('show');
        },
        events: [

                <?php $__currentLoopData = $yachtAvailablities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yachtAvailablity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                title:   '<?php echo e($yachtAvailablity->title??"Not Available"); ?> (<?php echo e($yachtAvailablity->yacht_option); ?>)',
                start:   '<?php echo e($yachtAvailablity->date); ?>',
                id:      '<?php echo e($yachtAvailablity->id??""); ?>',
                yacht_id:'<?php echo e($yachtAvailablity->getYacht->user_id??""); ?>',
                name:    '<?php echo e($yachtAvailablity->title??""); ?>',
                option:  '<?php echo e($yachtAvailablity->subject); ?>',
                comment: '<?php echo e(trim($yachtAvailablity->comment)); ?>',
                color: ' <?php if($yachtAvailablity->yacht_option == "Available"): ?> #2ecc71 <?php elseif($yachtAvailablity->yacht_option == "Winter Maintenance"): ?>  #ffc107 <?php elseif($yachtAvailablity->yacht_option =="Booked"): ?> #FF0000 <?php elseif($yachtAvailablity->yacht_option =="Under Option"): ?> #17a2b8 <?php endif; ?>',
                textColor: 'black',

            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]   // an option!
        ,eventClick: function(calEvent, jsEvent, view) {
            var id          = calEvent['id'];
            var yacht_id    = calEvent['yacht_id'];
            var date        = calEvent['start'];
            var name        = calEvent['name'];
            var option      = calEvent['option'];
            var comment     = calEvent['comment'];
            $('#id').val(id);
            $('#selected_date').val(date.format());
            $("#yacht_id option[value='"+yacht_id+"']").attr("selected", true);
            $("#yacht_option option[value='"+option+"']").attr("selected", true);
            $("#comment").val(comment);
            $('#action_type').val('update_record');
            $('#save_record').hide();
            $('#delete_record').show();
            $('#update_record').show();
            $('#exampleModal').modal('show');
            $('#fullCalModal').modal('show');
        },eventDidMount: function(info) {

        },eventRender: function(calEvent, element, view) {
            element.popover({
                // title: eventObj.name,
                title: " View Details",
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
            return ['all', calEvent.yacht_id].indexOf($('input[name="yacht_name"]:checked').val()) >= 0;
        },viewRender: function(view, element) {
            $('.fc-left')[0].children[0].innerText = view.title.replace(new RegExp("undefined", 'g'), ""); ;
        },
    });

    $('#delete_record').click(function(e){
        swal.fire({
                    title: "Sure!! Delete This",
                    text: "You Can`t Revert This Action.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },

                function(isConfirm){
                    if (isConfirm) {
                        var id = $('#id').val();
                        $.ajax({
                            url: '<?php echo e(route("delete-yacht-availablity")); ?>',
                            type: 'POST',
                            data: { 'id':id,_token: "<?php echo e(csrf_token()); ?>"},
                            dataType: 'JSON',
                            success: function (data) {
                                if(data.result=='success'){
                                    swal("Done", "Record Deleted Successfully.", "success");
                                    window.setTimeout(function(){location.reload()},1000)
                                }else{
                                    swal("Sorry", "Unable unable to delete record, try again.", "info");
                                }//end if else.
                            }//end
                        });
                    } else {
                        swal("Cancelled", "Your record is safe.", "error");
                    }//end if
                });
    });
    $('.fc-day').attr('title',"Click Here To Add Availablity.");
    $('input:radio.calFilter').on('change', function() {
        $('#calendar').fullCalendar('rerenderEvents');
        if ($('input[name="yacht_name"]:checked').val() == "all") {
            $('#calendar').fullCalendar( 'changeView', 'month');
        }else{
            $('#calendar').fullCalendar( 'changeView', 'listYear');
        }
    });
    function filter_client(calEvent) {
        var valss = [];
        $('input:checkbox.calFilter:checked').each(function() {
            valss.push($(this).val());
        });
        return valss.indexOf(calEvent.name) !== -1;
    }//end
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/dashboard/caretaker_dashboard.blade.php ENDPATH**/ ?>