@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">ContactU {{ $contactus->id }}</h3>
                    @can('view-'.str_slug('ContactU'))
                        <a class="btn btn-success pull-right" href="{{ url('/contact_us/contact-us') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $contactus->id }}</td>
                            </tr>
                            <tr><th> Full Name </th><td> {{ $contactus->full_name }} </td></tr><tr><th> Phone </th><td> {{ $contactus->phone }} </td></tr><tr><th> Email </th><td> {{ $contactus->email }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

