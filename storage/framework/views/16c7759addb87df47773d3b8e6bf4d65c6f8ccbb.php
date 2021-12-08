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
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <h1 align="center">Career Dashboard</h1>
            </div>
        </div>
        
            
                
                    
                
            
            
                
                    
                
            
            
                
                    
                
            
            
        
    </div>
    <div class="row"> 
        <div class="col-md-12">
            <div class="white-box">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/db1.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/calendar/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/calendar/dist/fullcalendar.min.js')); ?>"></script>
    
<script>
    $(document).ready(function() {

        var drag =  function() {
            $('.calendar-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
        };

        var removeEvent =  function() {
            $('.remove-calendar-event').click(function() {
                $(this).closest('.calendar-event').fadeOut();
                return false;
            });
        };

        $(".add-event").keypress(function (e) {
            if ((e.which == 13)&&(!$(this).val().length == 0)) {
                $('<div class="calendar-event">' + $(this).val() + '<a href="javascript:void(0);" class="remove-calendar-event"><i class="ti-close"></i></a></div>').insertBefore(".add-event");
                $(this).val('');
            } else if(e.which == 13) {
                alert('Please enter event name');
            }
            drag();
            removeEvent();
        });


        drag();
        removeEvent();

        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var year = date.getFullYear();

        $('#calendar').fullCalendar({
            height: 650,
            disableDragging : true,
            editable: false,
            eventStartEditable: false,

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'Job posted for sales resource',
                    start: new Date(year, month, day-8)
                },
                {
                    title: 'New quiz question uploaded',
                    start: new Date(year, month, day-5),
                    end: new Date(year, month, day-2)
                },
                {
                    id: 999,
                    title: 'Recieved ten application',
                    start: new Date(year, month, day)
                },
                {
                    id: 999,
                    title: '',
                    start: new Date(year, month, day+7)
                },
                {
                    title: 'New Job offer',
                    start: new Date(year, month, day+3),
                    end: new Date(year, month, day+6)
                },

                {
                    title: 'Learn with us',
                    url: 'incidentReport/incident-report',
                    start: new Date(year, month, day+2)
                }
            ]
        });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/dashboard/career_dashboard.blade.php ENDPATH**/ ?>