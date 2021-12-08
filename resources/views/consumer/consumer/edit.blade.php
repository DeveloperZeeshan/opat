@extends('layouts.master')
@push('js')
<style>
    .Form_p1:before, .Form_p2:before, .Form_p3:before, .Form_p4:before, .Form_p5:before {
        color:white;
    }
    .btn-info:hover, table .btn-info {
        background-color: #0F4C82 !important;
        border: none !important;
    }

    .btn-warning, .btn-warning.disabled {
        background: #E74A25;
        border: 2px solid #E74A25;
    }
    .btn-warning.disabled.focus, .btn-warning.disabled:focus, .btn-warning.disabled:hover, .btn-warning.focus, .btn-warning:focus, .btn-warning:hover {
        background: #e74a25;
        opacity: .8;
        border: 2px solid #e74a25;
    }
    .btn-info:hover, .btn-info {
        background: #0F4C82 !important;
        border: 2px solid #4B848E !important;
    }
    .btn-warning, .btn-warning.disabled {
        background: #c45e1e !important;
        border: none !important;
    }
    .btn-warning.disabled.focus, .btn-warning.disabled:focus, .btn-warning.disabled:hover, .btn-warning.focus, .btn-warning:focus, .btn-warning:hover {
        background: #c45e1e !important;
        opacity: .8;
        border: none !important;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Resident #{{ $consumer->id }}</h3>
                    @can('view-'.str_slug('Consumer'))
                        <a class="btn btn-success pull-right" href="{{ url('/consumer/consumer/'. $consumer->id) }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div style="text-align: center;">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                        @if(!auth()->user()->hasrole('caretaker'))
                            <a title="Rent Payments" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="rent_payment">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Rent Payments+
                                </button>
                            </a>
                        @endif
                        <a title="Incident Reports" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="incident_report">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Incident Reports
                            </button>
                        </a>
                        <a title="Medications" class="check_consumer_detail" style="cursor: pointer;" consumer_id="{{ $consumer->user_id }}" type="medications">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Medications
                            </button>
                        </a>
                    </div>
                     <hr>

                    <form method="POST" action="{{ url('/consumer/consumer/' . $consumer->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('consumer.consumer.form', ['submitButtonText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript">
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
                    }
                }
            }); 

        });
</script>
@endpush
