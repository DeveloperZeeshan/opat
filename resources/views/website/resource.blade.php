@extends('website.layout.master')
@section('content')
        <!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
    @include('website.layout.menu')
    <div class="container banner-content">
        <div class="banner-text">
            <h1>Job Training and Placement Service</h1>
            {{--<h1>{{($page->where('slug','ABOUTUS')->first()->title??'Not Available')}}</h1>--}}
            {{--{!!($page->where('slug','ABOUTUS')->first()->description??'Not Available')!!}--}}
        </div>
    </div>
</section>

<section class="sec-3 about-s2">
    @foreach($resource as $key=>$resources)
        @if($key%2==0)
            <div class="container">
                <div class="row align-items-center d-flex row">
                    <div class="col-lg-6">
                        <div class="founter-img">
                            <iframe width="500" height="320" src="{{asset('website')}}/{{$resources->upload_video??''}}" type="video/mp4">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="founder-container">
                            <h2 class="section-3-heading-1">{{ $resources->lecture??'Not Available'}}</h2>
                            <p>{!! $resources->description??'' !!}</p>
                            <a href="{{$resources->link??''}}">Click here to learn more</a>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row align-items-center d-flex row">
                    <div class="col-lg-6">
                        <div class="founder-container">
                            <h2 class="section-3-heading-1">{{ $resources->lecture??'Not Available'}}</h2>
                            <p>{!! $resources->description??'' !!}</p>
                            <a href="{{$resources->link??''}}">Click here to learn more</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="founter-img">
                            <iframe  width="500" height="320" src="{{asset('website')}}/{{$resources->upload_video??''}}" type="video/mp4">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</section>
<script>
    $(document).ready(function () {
        var ownVideos = $("iframe");
        $.each(ownVideos, function (i, video) {
            var frameContent = $(video).contents().find('body').html();
            if (frameContent) {
                $(video).contents().find('body').html(frameContent.replace("autoplay", 0));
            }
        });
    });
</script>
@endsection
