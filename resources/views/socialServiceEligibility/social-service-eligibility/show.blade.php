@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Social Service Eligibility {{ $socialserviceeligibility->id }}</h3>
                    @can('view-'.str_slug('SocialServiceEligibility'))
                        <a class="btn btn-success pull-right" href="{{ url('/socialServiceEligibility/social-service-eligibility') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $socialserviceeligibility->id }}</td>
                            </tr>
                            <tr><th> Resident </th><td> {{ $socialserviceeligibility->getUserDetail->name??'' }} </td></tr><tr><th> Eligibility </th><td> {{ $socialserviceeligibility->eligibility??'' }} </td></tr><tr><th> Status </th><td> {!! $socialserviceeligibility->status_detail??'' !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

