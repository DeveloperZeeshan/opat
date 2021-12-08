@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
   <div class="container banner-content">
      <div class="banner-text">
         <h1>Privacy &amp; Cookie Policy</h1>
         <p>{{($page->where('slug','privacy')->first()->title??'Not Available')}}</p>
      </div>
   </div>
</section>
<section class="FAQs">
<div class="container">
   <div class="page-content">
       {!! ($page->where('slug','privacy')->first()->description??'Not Available') !!}
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