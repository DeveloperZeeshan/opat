@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">RentSource {{ $rentsource->id }}</h3>
                    @can('view-'.str_slug('RentSource'))
                        <a class="btn btn-success pull-right" href="{{ url('/rentSource/rent-source') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $rentsource->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $rentsource->name }} </td></tr><tr><th> Status </th><td> {{ $rentsource->status }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

