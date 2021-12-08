@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Finance {{ $finance->id }}</h3>
                    @can('view-'.str_slug('Finance'))
                        <a class="btn btn-success pull-right" href="{{ url('/finance/finance') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $finance->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $finance->name }} </td></tr><tr><th> Email </th><td> {{ $finance->email }} </td></tr><tr><th> Phone </th><td> {{ $finance->phone }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

