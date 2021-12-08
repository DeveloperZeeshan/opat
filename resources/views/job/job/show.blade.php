@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Job {{ $job->id }}</h3>
                    @can('view-'.str_slug('Job'))
                        <a class="btn btn-success pull-right" href="{{ url('/job/job') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <!-- <th>ID</th> -->
                                <!-- <td>{{ $job->id }}</td> -->
                            </tr>
                            <tr><th> Title </th><td> {{ $job->title }} </td></tr>
                            <tr><th> Location </th><td> {{ $job->location }} </td></tr>
                            <tr><th> Description </th><td> {{ $job->description }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

