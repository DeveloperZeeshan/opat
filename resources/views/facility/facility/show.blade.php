@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Facility {{ $facility->id }}</h3>
                    @can('view-'.str_slug('Facility'))
                        <a class="btn btn-success pull-right" href="{{ url('/facility/facility') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $facility->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $facility->name }} </td></tr>
                            <tr><th> Address </th><td> {{ $facility->address }} </td></tr>
                            <tr><th> City </th><td> {{ $facility->city }} </td></tr>
                            <tr><th> State </th><td> {{ $facility->state }} </td></tr>
                            <tr><th> Phone </th><td> {{ $facility->phone }} </td></tr>
                            <tr><th> Fax </th><td> {{ $facility->fax }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


