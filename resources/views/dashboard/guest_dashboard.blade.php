@extends('layouts.master')

@push('css')
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
@endpush

@section('content')
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Welcome to Dashboard</h1>
                </div>
            </div> -->
            {{--<div class="row">--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-primary color-box">--}}
                        {{--<h1 class="text-white font-light">002 <span class="font-14">Available Jobs</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-success color-box">--}}
                        {{--<h1 class="text-white font-light">004 <span class="font-14">Assessment Test</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-danger color-box">--}}
                        {{--<h1 class="text-white font-light">004 <span class="font-14">Assessment Test Examples</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-primary color-box" style="background-color: #00838F !important">--}}
                        {{--<h1 class="text-white font-light">007 <span class="font-14">Videos</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-success color-box" style="background-color: #18FFFF !important">--}}
                        {{--<h1 class="text-white font-light">007 <span class="font-14">PDF</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-12">--}}
                    {{--<div class="white-box bg-success color-box" style="background-color: #607D8B !important">--}}
                        {{--<h1 class="text-white font-light">004 <span class="font-14">Power Point Slides</span></h1>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
<!--             <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    </div>
                </div>

            </div> -->


        </div>

@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

@endpush