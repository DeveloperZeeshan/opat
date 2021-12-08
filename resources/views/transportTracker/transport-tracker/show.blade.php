@extends('layouts.master')
@push('css')
<style>
    .btn-default.btn-outline {
        background-color: #0F4C82 !important;
        color: #fff;
    }
    .btn-default, .btn-default.disabled {
        background: #4B848E!important;
        border: 2px solid #e5ebec;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Transport Tracker {{ $transporttracker->id }}</h3>
                    @can('view-'.str_slug('TransportTracker'))
                        <a class="btn btn-success pull-right" href="{{ url('/transportTracker/transport-tracker') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $transporttracker->id }}</td>
                            </tr>
                            <tr><th> Resident</th><td> {{ $transporttracker->consumer_name}} </td></tr>
                            <tr><th> Pickup </th><td> {{ $transporttracker->pickup }} </td></tr>
                            <tr><th> Drop Off </th><td> {{ $transporttracker->drop_off }} </td></tr>
                            <tr><th> Amount </th><td> {{ $transporttracker->amount }} </td></tr>
                            <tr><th> Milleage </th><td> {{ $transporttracker->milleage }} </td></tr>
                             <tr><th> Time Taken </th><td> {{ $transporttracker->time }} </td></tr>
                            <tr><th> Notes </th><td>  {{$transporttracker->notes}}</td></tr>

                            </tbody>
                        </table>

                        <div style="text-align: center;">
                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            <a title="email" style="cursor: pointer;" class="email" data-toggle="modal" id="email" data-target="#exampleModal" >
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-envelope-square" aria-hidden="true"></i> Send Email

                                </button>
                            </a>
                        </div>                                                                                                                                                                        

                        {{--Email Modal--}}
                        <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Enter Email</h2>
                                    </div>
                                    <div class="modal-body">
                                    <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="{!! URL::route('send_email') !!}" >
                                            {{ csrf_field() }}
                                       <div class="form-row" >
                                            <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                                           <input type="hidden" name="pickup" id="pickup" class="" value="{{ $transporttracker->pickup }}">
                                           <input type="hidden" name="dropoff" id="dropoff" class="" value="{{ $transporttracker->drop_off }}">
                                           <input type="hidden" name="milleage" id="milleage" class="" value="{{ $transporttracker->milleage }}">
                                           <input type="hidden" name="amount" id="amount" class="" value="{{ $transporttracker->amount }}">
                                           <input type="hidden" name="timetaken" id="timetaken" class="" value="{{ $transporttracker->time }}">
                                           <input type="hidden" name="notes" id="notes" class="" value="{{ $transporttracker->notes }}">
                                       </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Send</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                     </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).on('click','#email',function(e){  
      $('.modal').modal('show');
    });
</script>

<script src="{{asset('js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
<script>
    $(function() {
        $("#print").on("click", function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click','#email',function(e){
        $('.modal').modal('show');
    });
</script>


@endpush

