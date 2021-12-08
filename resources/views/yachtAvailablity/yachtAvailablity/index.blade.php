@extends('layouts.master')
{{--@php--}}
{{--DB::table('yacht_availabilities')->where('id',$->id)->update(array('notification'=>'0'));--}}
{{--@endphp--}}
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endpush

@section('content')
    <style type="text/css">
/*        .fc-content{
            cursor: pointer !important;
        }
        .check-box-b {
        }
        .check-box-b input.calFilter {
            width: 18px;
            height: 15px!important;
        }
        ul.list-inline {
            float: none;
            position: relative;
            z-index: 0;
            display: block;
            width: 100% !important;
            margin: 0 !important;
            padding-bottom: 50px !important;
            margin-left: 30px !important;
        }

        .white-box {float: none;padding: 45px 0;}*/


.fc-button-group button {
    background: #0F4C82;
    border: 0;
    font-size: 15px;
    padding: 0px 10px;
    color: #fff;
}
.fc-day-grid-event .fc-content {
    white-space: nowrap;
    overflow: hidden;
    background-color: #0F4C82;
    color: #fff;
}

.btn-info:hover, table .btn-info {
    background-color: #0F4C82 !important;
    border: none !important;
}

.btn-info:hover, .btn-info {
    background: #0f4b80 !important;
    border: 2px solid #0f4b80 !important;
}
.btn-default, .btn-default.disabled {
    background: #8d8f8e;
    border: 2px solid #8d8f8e;
}
    </style>
    <div class="container-fluid">
        <div class="row">
            <br>

            <div class="col-md-12">
                <div class="white-box">
                    <div class="check-box-b" style="margin-left: 21px !important;">
                        <label class="radio-inline"><input type="radio" class="calFilter" name="yacht_name" value="all"  checked>All</label>
                        @foreach($yachts as $yacht)
                            <label class="radio-inline"><input type="radio" class="calFilter" name="yacht_name" value="{{$yacht->id??''}}" >{{$yacht->name??''}}</label>
                        @endforeach
                    </div><br>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        @include('layouts.partials.right-sidebar')
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Calendar Information</h4>
                </div>
                <form method="post" action="{{route('yacht-availablity-process')}}" id="availablity_modal_form">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="action_type" id="action_type">

                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Selected Date</label>
                                <input type="text" name="date" id="selected_date" readonly class="form-control">
                                <label for="yacht_id" class="control-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                                <label for="name='subject'" class="control-label">Subject</label><br>
                                <input type="text" name="subject" id="subject" class="form-control" required>
                                <div class="form-group">
                                    <label for="comment" class="control-label">Comment</label>
                                    <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
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


@endsection

@push('js')

    <script src="{{asset('plugins/components/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
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

                @foreach($yachtAvailablities as $yachtAvailablity)
                   {
                        title:   '{{$yachtAvailablity->title??"Not Available"}}',
                        start:   '{{$yachtAvailablity->date}}',
                        id:      '{{$yachtAvailablity->id??""}}',
                        yacht_id:'{{$yachtAvailablity->getYacht->user_id??""}}',
                        title:    '{{$yachtAvailablity->title??""}}',
                        subject:  '{{$yachtAvailablity->subject}}',
                        comment: '{{trim($yachtAvailablity->comment)}}',
                        color: ' @if($yachtAvailablity->yacht_option == "Available") #2ecc71 @elseif($yachtAvailablity->yacht_option == "Winter Maintenance")  #ffc107 @elseif($yachtAvailablity->yacht_option =="Booked") #FF0000 @elseif($yachtAvailablity->yacht_option =="Under Option") #17a2b8 @endif',
                        textColor: 'black',

                    },
                @endforeach
            ]   // an option!
            ,eventClick: function(calEvent, jsEvent, view) {
                var id          = calEvent['id'];
                var yacht_id    = calEvent['yacht_id'];
                var date        = calEvent['start'];
                var title        = calEvent['title'];
                var subject        = calEvent['subject'];
                var option      = calEvent['option'];
                var comment     = calEvent['comment'];
                $('#id').val(id);
                $('#selected_date').val(date.format());
                $("#yacht_id option[value='"+yacht_id+"']").attr("selected", true);
                $("#yacht_option option[value='"+option+"']").attr("selected", true);
                $("#title").val(title);
                $("#subject").val(subject);
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
                var id = $('#id').val();
                $.ajax({
                    url: '{{route("delete-yacht-availablity")}}',
                    type: 'POST',
                    data: { 'id':id,_token: "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.result=='success'){
                            window.location.href = "{{route('yacht-availablity','all')}}";
                            swal.fire("Success", "Event deleted Successfully.", "info");
                        }else{
                            swal.fire("Sorry", "Unable unable to delete record, try again.", "info");
                        }//end if else.
                    }//end
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
@endpush
