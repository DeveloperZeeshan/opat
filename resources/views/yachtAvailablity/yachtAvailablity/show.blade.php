@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Yacht {{ $yacht->id }}</h3>
                    @can('view-'.str_slug('Yacht'))
                        <a class="btn btn-success pull-right" href="{{ url('/Yacht/yacht') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $yacht->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $yacht->name }} </td></tr>
                            <tr><th> Security Deposit </th><td> {{ $yacht->security_deposit }} </td></tr>
                            <tr><th> End Cleaning </th><td> {{ $yacht->end_cleaning }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

