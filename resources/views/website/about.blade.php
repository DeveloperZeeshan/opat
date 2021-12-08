@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
     <div class="container banner-content">
         <div class="banner-text">
            <h1>{{($page->where('slug','ABOUTUS')->first()->title??'Not Available')}}</h1>
            {!!($page->where('slug','ABOUTUS')->first()->description??'Not Available')!!}
         </div>
   </div>
</section>

<section class="sec-3 about-s2">
   <div class="container">
      <div class="row align-items-center d-flex row">
         <div class="col-lg-6">
            <div class="founter-img">
               <img class="img-fluid" src="{{asset('website')}}/images/about-s2-img.png">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="founder-container">
            <h5 class="small-heading">MEET OUR</h5>
            <h2 class="section-3-heading">{{($page->where('slug','FOUNDER&CEO')->first()->title??'Not Available')}}</h2>
            {!!($page->where('slug','FOUNDER&CEO')->first()->description??'Not Available')!!}

            </div>
         </div>
      </div>
   </div>
</section>


<section class="about-s3">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <hr class="top-line">
            <h5 class="text-center subheading">OUR VISION</h5>
            <h2 class="text-center main-heading">{{($page->where('slug','FOROPAT')->first()->title??'Not Available')}}</h2>
          </div>
          <div class="col-md-12">
          {!! ($page->where('slug','FOROPAT')->first()->description??'Not Available') !!}
          </div>
      </div>
   </div>
</section>

@include('website.layout.provides_care')


<section id="leadership">
   <div class="container">
      <div class="row leadership-text">
         <div class="col-md-12">
            <hr class="top-line">
            <h5 class="subheading">MEET OUR</h5>
            <h2 class="main-heading">LEADERSHIP</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12">           
            <div class="card">
               <img class="card-img-top" src="{{asset('website')}}/images/leadership-img.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <h6 class="card-subtitle mb-2 ">Founder & CEO</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet  adipiscing.</p>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/facebook.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/instagram.png"></a>
                  <a href="#!" class="card-link"><img src="{{asset('website')}}/images/twitter.png"></a>
               </div>
            </div>
            
         </div>
         
         
      </div>
   </div>
</section>

<section class="blog-sec pt-5 pb-5">
   <div class="container">
      <div class="row">
         <div class="col-12 blog-head text-center pb-5">
            <hr>
            <h5>COMMUNITY</h5>
            <h2>RESOURCES</h2>
         </div>
         <div class="col-lg-6 blog-1">
            <div class="blog-content">
               <h2>Lorem ipsum dolor </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
               <div class="learn-more-btn-div">
                  <a class="btn learn-btn" href="#">Read More</a>
               </div>
               <a href=""></a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="inner-col">
               <div class="row bl-border">
                  <div class="col-lg-5 col-md-4 col-sm-4">
                     <div class="img-fluid">
                        <img src="{{asset('website')}}/images/bl2.png" class="img-fluid" alt="" >
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-8 col-sm-8 border-box">
                     <h2>Lorem ipsum dolor </h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                     <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="inner-col">
               <div class="row bl-border">
                  <div class="col-lg-5 col-md-4 col-sm-4">
                     <div class="img-fluid">
                        <img src="{{asset('website')}}/images/bl3.png" class="img-fluid" alt="" >
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-8 col-sm-8 border-box">
                     <h2>Lorem ipsum dolor </h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                     <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection