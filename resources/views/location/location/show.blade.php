@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Location {{ $location->id }}</h3>
                    @can('view-'.str_slug('Location'))
                        <a class="btn btn-success pull-right" href="{{ url('/location/location') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $location->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $location->name }} </td></tr><tr><th> Status </th><td>{!! $location->status_detail !!}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

