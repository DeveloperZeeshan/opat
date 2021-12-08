@extends('layouts.master')

@section('content')
<style type="text/css">
    tbody tr {
    background: #4b848e12;
}

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
    <div class="container-fluid">
        <!-- .row -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Rent Payment {{ $rentpayment->id }}</h3>
                    @can('view-'.str_slug('RentPayment'))
                        <a class="btn btn-success pull-right" href="{{ url('/rentPayment/rent-payment') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $rentpayment->id }}</td>
                            </tr>
                            <tr><th> Consumer Id </th><td> {{ $rentpayment->consumer_id }} </td></tr><tr><th> Rent Date </th><td> {{ $rentpayment->rent_date }} </td></tr><tr><th> Bed Amount </th><td> {{ $rentpayment->bed_amount }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr> -->         
        <div class="row">
            <div class="col-md-12">
                @can('view-'.str_slug('RentPayment'))
                    <a class="btn btn-success pull-right" href="{{ url('/rentPayment/rent-payment') }}">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                @endcan
                <div class="clearfix"></div>
                <div class="white-box printableArea">
                    <h3><b>Rent Payment Invoice</b> <span class="pull-right">#{{ $rentpayment->id }}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img align="center" src='{{asset('website/images/logo.png')}}' alt="Profile Picture"style="width: 150px">
                            <hr>
                        </div>
                        <div class="col-md-12 address_box">
                            <div class="pull-left">
                               <address>
                                     {{--<h3> &nbsp;<b class="text-danger">Company {{ $rentpayment->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->name }}</b></h3>--}}
                                   <p class="text-muted m-l-5">{{ $rentpayment->getAddedByDetail->getCaretakerDetail->getCompanyDetail->getUserDetail->profile->address??'' }}</p>

                               </address>

                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Caretaker,</h3>
                                    <b><p class="text-muted m-l-30">{{ $rentpayment->getAddedByDetail->profile->address??"Not Available" }}</p></b>
                                    <h4 class="font-bold">{{ $rentpayment->getAddedByDetail->name??"Not Available" }}</h4>
                                    <p class="m-t-10"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ DateTime::createFromFormat('Y-m-d',date('Y-m-d'))->format('jS').date(' M Y') }}</p>
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
                                            {{--<th>Caretaker</th>--}}
                                            <th class="text-right">Payment Date</th>
                                            <th class="text-right">Days Past Due</th>
                                            <th class="text-right">Monthly Rent Amount</th>
                                            {{--<th class="text-right">Amount</th>--}}
                                            <th class="text-right">Amount Recieved</th>
                                            <th class="text-right">Total Due</th>
                                        </tr>
                                        </thead>
                                    <tbody>

                                    @foreach($rentpayments as $rentpayment)
                                        <?php
                                        $date = $rentpayment->rent_date;
                                        $datework = \Carbon\Carbon::createFromDate($date);
                                        $now = \Carbon\Carbon::now();
                                        $testdate = $datework->diffInDays($now);
                                        ?>
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{ $rentpayment->getConsumerDetail->name??"Not Available" }}</td>
                                            {{--<td>{{ $rentpayment->getAddedByDetail->name??"Not Available" }}</td>--}}
                                            <td class="text-right"> {{ date('d-M-Y',strtotime($rentpayment->rent_date??''))}}</td>
                                            <td class="text-right"> {{$testdate}}</td>
                                            <td class="text-right"> ${{ $rentpayment->bed_amount??'' }} </td>
                                            <td class="text-right">${{ $rentpayment->recieved_amount??'' }}</td>
                                            <td class="text-right">${{ $rentpayment->due_amount??''}}</td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: ${{$total}}</p>
                                {{--<p>vat (0%) : $0 </p>--}}
                                <hr>
                                <h3><b>Total :</b> ${{$total}}</h3>
                                <h4 align="center"><label>Signature :</label><input ></h4>
                            </div>
                            <div class="pull-left m-t-30 text-right">

                            </div>
                                </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <div class="text-right">
            <!-- <button class="btn btn-danger" type="submit"> Proceed to payment </button> -->
            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
            <a title="email" style="cursor: pointer;" class="email" data-toggle="modal" id="email_modal" data-target="#exampleModal" >
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
                <form class="form-horizontal needs-validation " method="POST" id="email_form" role="form" action="{!! URL::route('rent_payment_email') !!}" >
                    {{ csrf_field() }}
                    <div class="form-row" >
                    <input type="email" class="form-control" id="email" name="email" placeholder="jhon@yopmail.com">
                    <input type="hidden" class="form-control" id="consumer_id" name="consumer_id" value="{{ $rentpayment->getConsumerDetail->id??'' }}">
                    <input type="hidden" class="form-control" id="caretaker_name" name="caretaker_name" value="{{$rentpayment->getAddedByDetail->name??''}}">
                    <input type="hidden" class="form-control" id="caretaker_address" name="caretaker_address" value="{{$rentpayment->getAddedByDetail->profile->address??''}}">
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
        $(document).on('click','#email_modal',function(e){
            $('.modal').modal('show');
        });
    </script>

@endpush