@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">JobType {{ $jobtype->id }}</h3>
                    @can('view-'.str_slug('JobType'))
                        <a class="btn btn-success pull-right" href="{{ url('/jobType/job-type') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $jobtype->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $jobtype->name }} </td></tr><tr><th> Status </th><td> {!! $jobtype->status_detail !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

