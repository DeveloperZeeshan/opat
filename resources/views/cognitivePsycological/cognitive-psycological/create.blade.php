@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New CognitivePsycological</h3>
                    @can('view-'.str_slug('CognitivePsycological'))
                    <a  class="btn btn-success pull-right" href="{{url('/consumer/consumer/'.$consumer->id)}}"><i class="icon-arrow-left-circle"></i> Back to Resident</a>
                    @endcan
                    <br>
                    <br>
                    @can('view-'.str_slug('CognitivePsycological'))
                    <a  class="btn btn-success pull-right" href="{{url('cognitivePsycological/cognitive-psycological')}}"><i class="icon-arrow-left-circle"></i> Back Cognitive Psycological</a>
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

                    <form method="POST" action="{{ url('/cognitivePsycological/cognitive-psycological') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('cognitivePsycological.cognitive-psycological.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
