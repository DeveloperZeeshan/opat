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
<!--         <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Medication {{ $medication->id }}</h3>
                    @can('view-'.str_slug('Medication'))
                        <a class="btn btn-success pull-right" href="{{ url('/medication/medication') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $medication->id }}</td>
                            </tr>
                            <tr><th> Consumer Id </th><td> {{ $medication->consumer_id }} </td></tr><tr><th> Medication </th><td> {{ $medication->medication }} </td></tr><tr><th> Frequency Taken </th><td> {{ $medication->frequency_taken }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="box-title pull-left">Medication {{ $medication->id }}</h3>
                @can('view-'.str_slug('Medication'))
                    <a class="btn btn-success pull-right" href="{{ url('/medication/medication') }}">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                @endcan
                <div class="clearfix"></div>
                <div class="white-box printableArea">
                    <h3><b>Medication Invoice</b> <span class="pull-right">#{{ $medication->id }}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <img align="center" src='{{asset('website/profilePicture/DiOSlx4gbKTVwsSUPTpBZpUU7S3yiDJhvhtYF51g.png')}}' alt="Profile Picture"style="width: 90px">
                                <address>
                                    {{--<h3> &nbsp;<b class="text-danger">Company {{ $medication->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->name??'' }}</b></h3>--}}
                                    <p class="text-muted m-l-5">{{ $medication->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->profile->address??'' }}</p>
                                </address>

                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Caretaker,</h3>
                                    <h4 class="font-bold">{{ $medication->getAddedByDetail->name??"Not Available" }}</h4>
                                    <p class="text-muted m-l-30">{{ $medication->getAddedByDetail->profile->address??"Not Available" }}</p>
                                    <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ DateTime::createFromFormat('Y-m-d',date('Y-m-d'))->format('jS').date(' M Y') }}</p>
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
                                            <th class="text-right">Medication Description</th>
                                            <th class="text-right">Frequency Taken</th>
                                            <th class="text-right">Start Date</th>
                                            <th class="text-right">End Date</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{ $medication->getConsumerDetail->name??"Not Available" }}</td>
                                            <td>{{ $medication->getAddedByDetail->name??"Not Available" }}</td>
                                            <td class="text-right"> {{ $medication->medication??"Not Available" }} </td>
                                            <td class="text-right"> {{ $medication->frequency_taken??"Not Available" }} </td>
                                            <td class="text-right"> {{ $medication->start_date??"Not Available" }} </td>
                                            <td class="text-right"> {{ $medication->end_date??"Not Available" }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <h4 align="center">Signature :<input></h4> </div>
                            <div class="clearfix"></div>
                            <hr>

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
        

    </div>
    {{--Email Modal--}}
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Enter Email</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="{!! URL::route('medication_email') !!}" >
                        {{ csrf_field() }}
                        <div class="form-row" >
                            <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                            <input type="hidden" class="form-control" id="consumer_id" name="consumer_id" value="{{ $medication->consumer_id??'' }}">
                            <input type="hidden" class="form-control" id="caretaker_name" name="caretaker_name" value="{{$medication->getAddedByDetail->name??''}}">
                            <input type="hidden" class="form-control" id="caretaker_address" name="caretaker_address" value="{{$medication->getAddedByDetail->profile->address??''}}">
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
    </script>
@endpush
