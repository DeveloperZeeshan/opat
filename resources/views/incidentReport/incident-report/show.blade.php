@extends('layouts.master')
@push('css')
<style>
    .table>thead>tr>th {
        vertical-align: middle;
        border-bottom: 1px solid #0F4C82;
        background: #0F4C82;
        color: white;
        text-transform: uppercase;
        font-weight: 700;
    }

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
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Incident Report {{ $incidentreport->id }}</h3>
                    @can('view-'.str_slug('IncidentReport'))
                        <a class="btn btn-success pull-right" href="{{ url('/incidentReport/incident-report') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $incidentreport->id }}</td>
                            </tr>
                            <tr><th> Consumer Id </th><td> {{ $incidentreport->consumer_id }} </td></tr><tr><th> Nature Of Incident </th><td> {{ $incidentreport->nature_of_incident }} </td></tr><tr><th> Incident Detail </th><td> {{ $incidentreport->incident_detail }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
         -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="box-title pull-left">Incident Report {{ $incidentreport->id }}</h3>
                @can('view-'.str_slug('IncidentReport'))
                    <a class="btn btn-success pull-right" href="{{ url('/incidentReport/incident-report') }}">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                @endcan
                <div class="clearfix"></div>
                <div class="white-box printableArea">
                    <h3><b>Incident Report Invoice</b> <span class="pull-right">#{{ $incidentreport->id }}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <img align="center" src="{{asset('website/profilePicture/DiOSlx4gbKTVwsSUPTpBZpUU7S3yiDJhvhtYF51g.png')}}" alt="Profile Picture" style="width: 90px">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Company {{ $incidentreport->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->name??'' }}</b></h3>
                                    <p class="text-muted m-l-5">{{ $incidentreport->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->profile->address??'' }}</p>
                                </address>

                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Caretaker,</h3>
                                    <h4 class="font-bold">{{ $incidentreport->getAddedByDetail->name??"Not Available" }}</h4>
                                    <p class="text-muted m-l-30">{{ $incidentreport->getAddedByDetail->profile->address??"Not Available" }}</p>
                                    <p class="m-t-30"><b>Incident Date :</b> <i class="fa fa-calendar"></i> {{ DateTime::createFromFormat('Y-m-d',date('Y-m-d'))->format('jS').date(' M Y') }}</p>
                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <input type="date" name="" value="{{ date('Y-m-d') }}" /> </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Caretaker</th>
                                            <th class="text-left">Nature Of Incident</th>
                                            <th class="text-left">Incident Detail</th>
                                            <th class="text-left">Additional Notes</th>
                                            <th class="text-left">Incident Date</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{ $incidentreport->getConsumerDetail->name??"Not Available" }}</td>
                                            <td>{{ $incidentreport->getAddedByDetail->name??"Not Available" }}</td>
                                            <td class="text-left"> {{ $incidentreport->nature_of_incident??"Not Available" }} </td>
                                            <td  width="25%" class="text-left"> {{ $incidentreport->incident_detail??"Not Available" }} </td>
                                            <td  width="25%" class="text-left"> {{ $incidentreport->additional_notes??"Not Available" }} </td>
                                            <td class="text-left"> {{ $incidentreport->incident_date??"Not Available" }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <h4 align="center">Signature :<input></h4></div>
                            <div class="clearfix"></div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <!-- <button class="btn btn-danger" type="submit"> Proceed to payment </button> -->
                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                <a title="email" style="cursor: pointer;" class="email" data-toggle="modal" id="email" data-target="#exampleModal" >
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-envelope-square" aria-hidden="true"></i> Send Email

                    </button>
                </a>
            </div>
        </div>
        

    </div>
    {{--Email Modal--}}
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Enter Email</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="{!! URL::route('incident_report_email') !!}" >
                        {{ csrf_field() }}
                        <div class="form-row" >
                            <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                            <input type="hidden" class="form-control" id="consumer_id" name="consumer_id" value="{{ $incidentreport->consumer_id??'' }}">
                            <input type="hidden" class="form-control" id="caretaker_name" name="caretaker_name" value="{{$incidentreport->getAddedByDetail->name??''}}">
                            <input type="hidden" class="form-control" id="caretaker_address" name="caretaker_address" value="{{$incidentreport->getAddedByDetail->profile->address??''}}">
                            <input type="hidden" class="form-control" id="invoice_date" name="invoice_date" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
@endsection
@push('js')
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
        $('plugin').hide();
        $('plugin').css('display','none');
    </script>
@endpush

