@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
   <div class="container banner-content">
      <div class="banner-text">
         <h1>FAQ's</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
   </div>
</section>
<section class="FAQs">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
               @foreach($faqs as $key=>$item)
               <!-- Accordion card -->
               <div class="card">
                  <!-- Card header -->
                     <div class="card-header" role="tab" id="headingOne{{$key}}">
                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne{{$key}}" aria-expanded="true"
                           aria-controls="collapseOne{{$key}}">
                        <h5 class="mb-0">
                            {{$item->question??''}}<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                     </a>
                  </div>
                  <!-- Card body -->
                     <div id="collapseOne{{$key}}" class="collapse " role="tabpanel" aria-labelledby="headingOne{{$key}}"
                     data-parent="#accordionEx">
                     <div class="card-body">
                           {!! $item->description??'' !!}
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <!-- Accordion wrapper -->
         </div>
         <div class="col-md-4 hero-quote">
            <h2>Ask a Question?</h2>
            <form class="hero-form-1" method="post" action="{{route('Ask_A_Question')}}">
               @csrf()
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-user"></i></span>
                     <input   type="text" class="form-control" id="text" aria-describedby="emailHelp" placeholder="Your Full Name*" name="name" />
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address*" name="email" />
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <textarea class="form-control" id="Question" rows="3" placeholder="Question" name="question"></textarea>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> Submit Now</button>
            </form>
         </div>
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