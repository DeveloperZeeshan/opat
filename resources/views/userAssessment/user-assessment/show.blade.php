@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">UserAssessment {{ $userassessment->id }}</h3>
                    @can('view-'.str_slug('UserAssessment'))
                        <a class="btn btn-success pull-right" href="{{ url('/userAssessment/user-assessment') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $userassessment->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $userassessment->name }} </td></tr><tr><th> Email </th><td> {{ $userassessment->email }} </td></tr><tr><th> Answer </th><td> {{ $userassessment->answer }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

