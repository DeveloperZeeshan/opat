@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Manager {{ @$manager->id }}</h3>
                    @can('view-'.str_slug('Manager'))
                        <a class="btn btn-success pull-right" href="{{ url('/manager/manager') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $manager->id??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> Full Name </th>
                                <td> {{ $manager->getUserDetail->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $manager->getUserDetail->email??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Phone </th>
                                <td> {{ $manager->getUserDetail->profile->phone??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Date of Birth </th>
                                <td> {{ $manager->getUserDetail->profile->dob??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Social Security Number </th>
                                <td> {{ $manager->getUserDetail->profile->nation_id_card??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Country </th>
                                <td> {{ $manager->getUserDetail->profile->country??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> City </th>
                                <td> {{ $manager->getUserDetail->profile->city??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img src="{{ asset('website/').'/'. $manager->getUserDetail->profile->pic??'Not Available' }}" style="width: 100px;height: 100px" ></td>
                            </tr>
                            <tr>
                                <th> Company </th>
                                <td> {{ $manager->getUserDetail->profile->company_name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Package </th>
                                <td>  {{ $manager->getPackageDetails->name??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> Address </th>
                                <td> {{ $manager->getUserDetail->profile->address??"Not Available" }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

