@extends('layouts.master')
@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
<style>
    .btn-info:hover, .btn-info {
        background: #0F4C82 !important;
        border: none !important;
    }
    .consumer_card_content {
        display: flex;
        background-color: #fff;
        padding: 5px 5px;
        margin: 10px 0;
        box-shadow: 0 0 15px #0000007a;
        border-radius: 5px;
    }

    .consumer_card_content .consumer_image {
        max-width: 30%;
    }

    .consumer_card_content .consumer_image img {
        height: 90px;
        width: 90px;
    }

    .consumer_content {
        max-width: 70%;
        margin-left: 45px;
        text-align: center;
    }
    .consumer_card_content .consumer_content h2 { font-size: 14px; margin: 0 0 10px; }
    .consumer_card_content .consumer_content .facility_name {
        font-size: 20px;
        font-weight: 700;
        color: #000;
    }
    .single_post_consumer .consumer_card_content {
        background-color: transparent;
        box-shadow: unset;
    }
    .single_post_consumer .consumer_content {
        max-width: 70%;
        margin-left: 10px;
        text-align: left;
    }
    .single_post_consumer .Caretaker {
        display: block;
        font-size: 15px;
        font-weight: 700;
        color: #000;
    }
    .single_post_consumer .consumer_content .person_detail {
        padding: 0;
        list-style: none;
        display: flex;
    }
    .single_post_consumer .consumer_card_content .consumer_content h2 { font-size: 14px; margin: 0 0 0px; line-height: 17px; }
    .single_post_consumer .consumer_content .person_detail li .age {
        font-weight: 600;
        color: #000;

    }
    .single_post_consumer .consumer_content .person_detail li {
        margin-left: 10px;
        color: #000;
    }
    .single_post_consumer .consumer_content .person_detail li:first-child {
        margin-left: 0;

    }
    .single_post_consumer .consumer_card_content .consumer_content .facility_name {
        font-size: 15px;
    }
    .single_post_consumer {
        background-color: #F0FBFD;
        padding: 10px 10px;
        box-shadow: 0 0 15px #0000007a;
        margin: 10px 0;
        border-radius:15px;
    }
    .education_documents h1 {
        font-size: 25px;
        margin-bottom: 0px;
        line-height: 1.2;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="single_post_consumer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="consumer_card_content">
                            <div class="consumer_image">
                                <img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'' }}" alt="" class="img-fluid">
                            </div>
                            <div class="consumer_content">
                                <h2>{{ $consumer->getUserDetail->name??"Not Available" }}</h2>
                                <ul class="person_detail">
                                    <li><span class="age">Phone :</span>{{ $consumer->getUserDetail->profile->phone??''}} </li>
                                    <li><span class="age">Email :</span> {{ $consumer->getUserDetail->email??'' }} </li>
                                    <li><span class="age">DOB :</span>{{ $consumer->getUserDetail->profile->dob??''  }} </li>
                                </ul>
                                <ul class="person_detail">
                                    <li><span class="age">Package :</span> {{ $consumer->getPackageDetails->name??'' }} </li>
                                    <li><span class="age">SSN :</span> {{ $consumer->getUserDetail->profile->nation_id_card??'' }} </li>
                                    <li><span class="age">City:</span> {{ $consumer->getUserDetail->profile->city??'' }} </li>
                                </ul>
                                <span class="facility_name"> {{ $consumer->getUserDetail->profile->facility_name??"Not Available" }}</span>
                                <span class="Caretaker">{{ $consumer->getCompanyDetail->getUserDetail->name??"Not Available" }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="education_documents">
                            <h1>Entry Date:</h1><p>{{ $consumer->getUserDetail->profile->entry_date??'' }} </p>
                            <h1>Education Level:</h1><p>{{ $consumer->getUserDetail->profile->getEducationLevelDetail->name}} </p>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="col-md-1">
                        @can('edit-'.str_slug('Consumer'))
                        <a href="{{ url('/consumer/consumer/' . $consumer->id . '/edit') }}"
                           title="Edit Resident">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </button>
                        </a>
                        @endcan
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="white-box">
                    @can('view-'.str_slug('Consumer'))
                        <a class="btn btn-success pull-left" href="{{ url('/consumer/consumer') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> View Resident List</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="table-responsive">
                        <a title="tracker" style="cursor: pointer;" class="transport_tracker_id" attr="{{ $consumer->id }}" type="tracker">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/1.jfif')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Transport Tracker</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="cognitive Psycological" class="cognitive_id" style="cursor: pointer;" attr="{{ $consumer->id }}" type="cognitive">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/2.jfif')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Cognitive Psycological</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Medications" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="medications">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/3.jfif')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Medical History</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a href="{{ route('yacht-availablity','all')}}"  title="View Resident">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/4.jpg')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Calender</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a href="{{ url('/finance/finance') }}"  title="View Resident">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/5.jpg')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Finance</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Incident Reports" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="incident_report">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/6.jfif')}}" alt="" class="img-fluid">

                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Incident Report</span>
                                </div>
                            </div>
                        </div>
                        </a>

                        <a title="Rent Payments" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="rent_payment">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/7.jfif')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Income Tracker</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a title="Social Service Elogibility" class="service_id" style="cursor: pointer;" attr="{{ $consumer->id }}" type="service">
                        <div class="col-md-3">
                            <div class="consumer_card_content">
                                <div class="consumer_image">
                                    <img src="{{asset('website/images/8.jfif')}}" alt="" class="img-fluid">
                                    {{--<img src="{{ asset('website/').'/'. $consumer->getUserDetail->profile->pic??'Not Available' }}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="consumer_content">
                                    <h2></h2>
                                    <span class="facility_name">Social Service Eligibility</span>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function () {

        @if(\Session::has('message'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('message')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @endif
    })

    $(function () {
        $('#myTable').DataTable({
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]
        });

    });
    $(document).on('click','.check_consumer_detail',function(e){
        var consumer_id = $(this).attr('consumer_id');
        var type = $(this).attr('type');
        e.preventDefault();
        $.ajax({
            url: '{{ route("creat_consumer_detail_session") }}',
            type: "POST",
            data:{
                _token:'{{ csrf_token() }}',consumer_id:consumer_id,type:type
            },
            dataType: 'json',
            success: function(data){
                if (data.result=='ok') {
                    if(data.type=='rent_payment'){
                        window.location.href = "{{ url('rentPayment/rent-payment') }}";
                    }else if(data.type=='incident_report'){
                        window.location.href = "{{ url('incidentReport/incident-report') }}";
                    }else if(data.type=='medications'){
                        window.location.href = "{{ url('medication/medication') }}";
                    }
                    else if(data.type=='cognitive'){
                        window.location.href = "{{ url('cognitivePsycological/cognitive-psycological') }}";
                    }
                }
            }
        });

    });

    //transport tracker
    $(document).on('click','.transport_tracker_id',function(e){
        var consumer_id = $(this).attr('attr');
        $.ajax({
            url: "{{route('tracker_id_session')}}/"+consumer_id,
            type:'get',
            success: function(response) {
                location.href = "{{ url('transportTracker/transport-tracker/') }}";
            }
        });
    });
    //Cognitive Psycological
    $(document).on('click','.cognitive_id',function(e){
        var consumer_id = $(this).attr('attr');
        $.ajax({
            url: "{{route('cognitive_id_session')}}/"+consumer_id,
            type:'get',
            success: function(response) {
                location.href = "{{ url('cognitivePsycological/cognitive-psycological/') }}";
            }
        });
    });

    //Social Service Eligibility
    $(document).on('click','.service_id',function(e){
        var consumer_id = $(this).attr('attr');
        $.ajax({
            url: "{{route('service_id_session')}}/"+consumer_id,
            type:'get',
            success: function(response) {
                location.href = "{{ url('socialServiceEligibility/social-service-eligibility/') }}";
            }
        });
    });
</script>

@endpush


