@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Resident</h3>
                    @can('view-'.str_slug('Consumer'))
                    <a  class="btn btn-success pull-right" href="{{url('/consumer/consumer')}}"><i class="icon-arrow-left-circle"></i> Add Consumer</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/consumer/consumer') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data" style="background: #0F4C82;color: #ffffff">
                        {{ csrf_field() }}

                        @include ('consumer.consumer.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
