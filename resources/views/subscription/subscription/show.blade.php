@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Subscription {{ $subscription->id }}</h3>
                    @can('view-'.str_slug('Subscription'))
                        <a class="btn btn-success pull-right" href="{{ url('/subscription/subscription') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $subscription->id }}</td>
                            </tr>
                            <tr><th> RoleId </th><td> {{ $subscription->roleId }} </td></tr><tr><th> Subscription Type Id </th><td> {{ $subscription->subscription_type_id }} </td></tr><tr><th> Name </th><td> {{ $subscription->name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

