@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
   <div class="container banner-content">
      <div class="banner-text">
         <h1>{{($page->where('slug','NEWS')->first()->title??'Not Available')}}</h1>
         {!! ($page->where('slug','NEWS')->first()->description??'Not Available') !!}
      </div>
   </div>
</section>
<section class="News-Post">
   <div class="container">
      <div class="row">
         @foreach($newsAndEvents as $item)
         <div class="col-lg-6 col-md-6 mt-3">
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/{{$item->image??''}}" alt="Card image cap">
               <div class="card-body">
                  <span class="card-link"><i class="far fa-calendar-alt"></i>{{$item->date??''}}</span>
                  <span class="card-link"><i class="far fa-calendar-alt"></i>{{$item->event_title??''}}</span>
                  <h5 class="card-title">{{$item->title??''}}</h5>
                  <p class="card-text">{!! $item->description??'' !!}</p>
                  <a href="#!" class="btn">Learn More / Register</a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>

<section class="home-last-sec">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 first-sec-inner pt-5 pb-5">
            <div class="last-inner-wd">
               <h2 class="text-uppercase">{{($page->where('slug','SERVINGASLARGESTHOMECARESERVICEINLOCATION.')->first()->title??'Not Available')}}
               </h2>
               <p>
                  {!! ($page->where('slug','SERVINGASLARGESTHOMECARESERVICEINLOCATION.')->first()->description??'Not Available') !!}
               </p>
               <button>
               CONTACT US
               </button>
            </div>
         </div>
         <div class="col-md-6 second-sec-inner pt-5 pb-5">
                 @include('website.contact_us')
         </div>
      </div>
   </div>
</section>
@endsection