@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Resource {{ $resource->id }}</h3>
                    @can('view-'.str_slug('Resource'))
                        <a class="btn btn-success pull-right" href="{{ url('/resource/resource') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $resource->id }}</td>
                            </tr>
                            <tr><th> Title </th><td> {{ $resource->title }} </td></tr><tr><th> Description </th><td> {!! $resource->description !!} </td></tr><tr><th> Image </th><td>        <img src="{{asset('website')}}/{{$resource->image??''}}" id="imagePreview_1" width="100" height="100">
 </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

