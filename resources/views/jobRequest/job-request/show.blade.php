@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">JobRequest {{ $jobrequest->id }}</h3>
                    @can('view-'.str_slug('JobRequest'))
                        <a class="btn btn-success pull-right" href="{{ url('/jobRequest/job-request') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                               <!--  <th>ID</th>
                                <td>{{ $jobrequest->id }}</td> -->
                            </tr>
                            <tr><th> Name </th>
                                <td> {{ $jobrequest->name }} </td>
                            </tr>
                            <tr><th> Email </th><td> {{ $jobrequest->email }} </td>
                            </tr>
                            <!-- <tr><th> Job Id </th><td> {{ $jobrequest->job_id }} </td>
                            </tr> -->
                            <tr>
                                <th> Job </th>
                                <td> {{ $jobrequest->getJobDetail->title??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td> {!! $jobrequest->status_detail !!} </td>
                            </tr>
                            <tr>
                                <th> Attachment Download</th>
                                <td>  <a href="{{ asset('website').'/'.$jobrequest->attachment??"Not Available" }} ">Download File</a> </td>
                            </tr>
                           <!--  <tr>
                                <th> Attachment View</th>
                                <td> <iframe src="{{ asset('website').'/'.$jobrequest->attachment??"Not Available" }}" style="width: 95%;height: 330px"></iframe> </td>
                            </tr> -->
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

