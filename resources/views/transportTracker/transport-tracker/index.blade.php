@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <link href='{{asset('plugins/components/fullcalendar/fullcalendar.css')}}' rel='stylesheet'>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row colorbox-group-widget">
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count">{{$customerVisit??'0'}}<span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">Customer Visit</p>
                            {{--<p class="info-ot font-15">Total<span class="label label-rounded">20</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count">{{$visitors??'0'}}<span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                            <p class="info-text font-12">Total Visitor</p>
                            {{--<p class="info-ot font-15">Total Pending<span class="label label-rounded">2</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count">${{$amount??'0'}}<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Amount</p>
                            {{--<p class="info-ot font-15">Total<span class="label label-rounded">2316</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-warning">
                        <div class="media-body">
                            <h3 class="info-count">{{$milleage??'0'}}<span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">Total Milleage</p>
                            {{--<p class="info-ot font-15">Pending<span class="label label-rounded">$82</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                {{--<div class="white-box sd-widget m-b-0 b-b-0">--}}
                    {{--<a href="javascript:void(0);" class="pull-right"><i class="icon-settings"></i></a>--}}
                    {{--<h4 class="box-title">Distance Travelled</h4>--}}
                {{--</div>--}}
                {{--<div class="white-box p-0 b-t-0">--}}
                    {{--<div class="ct-sd-chart chart-pos"></div>--}}
                    {{--<ul class="list-inline t-a-c">--}}
                        {{--<li>--}}
                            {{--<h6 class="font-15"><i class="fa fa-circle m-r-5 text-danger"></i>Complete Ride</h6>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>Left Journey</h6>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        
       
        <!-- ===== Right-Sidebar ===== -->
        <!-- ===== Right-Sidebar-End ===== -->
    </div>

    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Transport Tracker</h3>
                    {{--@if(!auth()->user()->hasrole('manager'))--}}
                    {{--@can('add-'.str_slug('TransportTracker'))--}}
                        {{--<a class="btn btn-success pull-right" href="{{ url('/transportTracker/transport-tracker/create') }}"><i class="icon-plus"></i> Add Transport Tracker</a>--}}
                    {{--@endcan--}}
                    {{--@endif--}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                {{-- <th>Visit</th>
                                <th>Date</th>
                                <th>Notes</th>
                                <th>Miles</th>
                                <th>Rate($/mile)</th>
                                <th>Purpose</th> --}}
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transporttracker as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->consumer_name }}</td>
                                    {{-- <td>{{ $item->pickup }} <b>to</b> {{ $item->drop_off }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{$item->notes}}</td>
                                    <td>{{ $item->milleage }}</td>
                                    <td>${{ $item->amount }}</td>
                                    <td><a class="btn btn-info"><i class="fa fa-briefcase"></i> {{ $item->purpose }}</a></td> --}}
                                    <td>

                                         
                                        <a title="Transport Tracker" class="check_transport_detail" style="cursor: pointer;" transport_id="{{ $item->consumer_id }}" type="transport_tracker">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Detail
                                            </button>
                                        </a>
                                         {{-- @can('view-'.str_slug('TransportTracker'))
                                            <a href="{{ url('/transportTracker/transport-tracker/' . $item->id) }}"
                                               title="View TransportTracker">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('TransportTracker'))
                                            <a href="{{ url('/transportTracker/transport-tracker/' . $item->id . '/edit') }}"
                                               title="Edit TransportTracker">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('TransportTracker'))
                                            <form method="POST" action="{{ url('/transportTracker/transport-tracker' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete TransportTracker"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan --}}


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $transporttracker->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
     <script src='{{asset('plugins/components/moment/moment.js')}}'></script>
    <script src='{{asset('plugins/components/fullcalendar/fullcalendar.js')}}'></script>
    <script src='{{asset('js/db2.js')}}'></script>
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
    </script>
    <script>
        $(document).on('click','.check_transport_detail',function(e){
            var transport_id = $(this).attr('transport_id');
            var type = $(this).attr('type');
            e.preventDefault();
            $.ajax({
                url: '{{ route("creat_transport_detail_session") }}',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',transport_id:transport_id,type:type
                },
                dataType: 'json',
                success: function(data){
                    if (data.result=='ok') {
                        if(data.type=='transport_tracker'){
                            window.location.href = "{{ route('sub_index') }}";
                        }
                    }
                }
            });

        });
    </script>
    @include('includes.common_search_datatable')
@endpush
