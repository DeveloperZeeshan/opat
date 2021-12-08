@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">NewsAndEvent {{ $newsandevent->id }}</h3>
                    @can('view-'.str_slug('NewsAndEvent'))
                        <a class="btn btn-success pull-right" href="{{ url('/newsAndEvent/news-and-event') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $newsandevent->id }}</td>
                            </tr>
                            <tr><th> Image </th><td><img src="{{asset('website')}}/{{ $newsandevent->image??''}}" id="imagePreview_1" width="100" height="100"></td></tr><tr><th> Date </th><td> {{ $newsandevent->date }} </td></tr><tr><th> Event Title </th><td> {{ $newsandevent->event_title }} </td></tr>
                            <tr><th> Title </th><td> {{ $newsandevent->title }} </td></tr>
                            <tr><th> Description </th><td> {!! $newsandevent->description !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

