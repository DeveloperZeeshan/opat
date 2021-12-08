@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Feedback {{ $feedback->id }}</h3>
                    @can('view-'.str_slug('Feedback'))
                        <a class="btn btn-success pull-right" href="{{ url('/feedback/feedback') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $feedback->id }}</td>
                            </tr>
                            <tr><th> Company Id </th><td> {{ $feedback->company_id }} </td></tr><tr><th> Message </th><td> {{ $feedback->message }} </td></tr><tr><th> Status </th><td> {!! $feedback->status_detail !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

