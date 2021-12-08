@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Leadership {{ $leadership->id }}</h3>
                    @can('view-'.str_slug('Leadership'))
                        <a class="btn btn-success pull-right" href="{{ url('/leadership/leadership') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $leadership->id }}</td>
                            </tr>
                            <tr><th> Image </th><td><img src="{{asset('website')}}/{{ $leadership->image??''}}" id="imagePreview_1" width="100" height="100"></td></tr><tr><th> Name </th><td> {{ $leadership->name }} </td></tr><tr><th> Designation </th><td> {{ $leadership->designation }} </td></tr><tr><th> Description </th><td> {!! $leadership->description !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

