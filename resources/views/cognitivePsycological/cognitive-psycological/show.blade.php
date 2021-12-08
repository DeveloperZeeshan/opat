@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Cognitive Psycological {{ $cognitivepsycological->id }}</h3>
                    @can('view-'.str_slug('CognitivePsycological'))
                        <a class="btn btn-success pull-right" href="{{ url('/cognitivePsycological/cognitive-psycological') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $cognitivepsycological->id }}</td>
                            </tr>
                            <tr> <th>Resident</th>
                                <td>{{ $cognitivepsycological->consumer_name }}</td></tr>
                            <tr><th> Memory Problem </th><td> {{ $cognitivepsycological->memory_problem }} </td></tr><tr><th> Perception </th><td> {{ $cognitivepsycological->perception }} </td></tr><tr><th> Language </th><td> {{ $cognitivepsycological->language }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

