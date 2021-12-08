@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Caretaker {{ $caretaker->id }}</h3>
                    @can('view-'.str_slug('Caretaker'))
                        <a class="btn btn-success pull-right" href="{{ url('/caretaker/caretaker') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ @$caretaker->id }}</td>
                                </tr>
                                <tr>
                                    <th> Full Name </th>
                                    <td> {{ @$caretaker->getUserDetail->name }} </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> {{ @$caretaker->getUserDetail->email }} </td>
                                </tr>
                                <tr>
                                    <th> Phone </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->phone }} </td>
                                </tr>
                                <tr>
                                    <th> Date of Birth </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->dob }} </td>
                                </tr>
                                <tr>
                                    <th> Social Security Number </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->nation_id_card }} </td>
                                </tr>
                                <tr>
                                    <th> Country </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->country }} </td>
                                </tr>
                                <tr>
                                    <th> Address </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->address }} </td>
                                </tr>
                                <tr>
                                    <th> City </th>
                                    <td> {{ @$caretaker->getUserDetail->profile->city }} </td>
                                </tr>
                                <tr>
                                    <th> Image </th>
                                    <td> <img src="{{ asset('website/').'/'. $caretaker->getUserDetail->profile->pic??'Not Available' }}" style="width: 100px;height: 100px" ></td>
                                </tr>
                                <tr>
                                    <th> Company </th>
                                    <td> {{ $caretaker->getCompanyDetail->getUserDetail->name }} </td>
                                </tr>
                                <tr>
                                    <th> Package </th>
                                    <td>  {{ $caretaker->getPackageDetails->name }}</td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

