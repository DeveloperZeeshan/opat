@extends('layouts.master')

@push('css')
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Manager Dashboard</h1>
                </div>
            </div>
            <div class="row colorbox-group-widget">
                <div class="col-md-3 col-sm-6 info-color-box">
                    <div class="white-box">
                        <div class="media bg-primary">
                            <div class="media-body">
                                <h3 class="info-count">&#36;{{$rentPaymentCount??000}} <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                                <p class="info-text font-12">Rent Payments</p>
                                <p class="info-ot font-15">Pending<span class="label label-rounded">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 info-color-box">
                    <div class="white-box">
                        <div class="media bg-success">
                            <div class="media-body">
                                <h3 class="info-count">{{$incidentReportsCount??0}} <span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                                <p class="info-text font-12">Incident Reports</p>
                                <p class="info-ot font-15">Closed<span class="label label-rounded">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 info-color-box">
                    <div class="white-box">
                        <div class="media bg-danger">
                            <div class="media-body">
                                <h3 class="info-count">{{$medicationReportsCount??0}} <span class="pull-right"><i class="mdi mdi-medical-bag"></i></span></h3>
                                <p class="info-text font-12">Medications</p>
                                <p class="info-ot font-15">Pending<span class="label label-rounded">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 info-color-box">
                    <div class="white-box">
                        <div class="media bg-warning">
                            <div class="media-body">
                                <h3 class="info-count">{{$ResidentsCount??0}} <span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                                <p class="info-text font-12">Residents</p>
                                <p class="info-ot font-15">Limit<span class="label label-rounded">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="row">
                <a href="{{ url('/caretaker/caretaker') }}">
                    <div class="col-md-3 col-sm-12">
                        <div class="white-box bg-success color-box">
                            <h1 class="text-white font-light">{{$caretakersCount??0}} <span class="font-14"></span></h1>
                            <p class="info-text font-12">Caretakers</p>
                        </div>
                    </div>
                </a>
                <a href="{{ url('/consumer/consumer') }}">
                    <div class="col-md-3 col-sm-12">
<div class="white-box bg-primary color-box">
    <h1 class="text-white font-light">{{$ResidentsCount??0}}<span class="font-14"></span></h1>
    <p class="info-text font-12">Residents</p>
</div>
</div>
</a>
<a href="{{ url('/facility/facility') }}">
    <div class="col-md-3 col-sm-12">
        <div class="white-box bg-primary color-box box7 ">
            <h1 class="text-white font-light">${{$rentPaymentDueCount??0}}<span class="font-14"></span></h1>
            <p class="info-text font-12">Rent Payments Due</p>
        </div>
    </div>
</a>
<a href="{{ url('/facility/facility') }}">
    <div class="col-md-3 col-sm-12">
        <div class="white-box bg-danger color-box" >
            <h1 class="text-white font-light">{{$facilityCount??0}}<span class="font-14"></span></h1>
            <p class="info-text font-12">Facility</p>
        </div>
    </div>
</a>
</div>
</div>

@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

@endpush