@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
  <div class="container banner-content">
         <div class="banner-text">
            <h1>BLOGS</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
   </div>
</section>

<section class="blog-post">
   <div class="container">
   <div class="row">
        <div class="col-12 mt-3 mb-3">
            <div class="card">
                <div class="Blog-card">
                    <div class="img-square-wrapper">
                        <img class="" src="{{asset('website')}}/images/Blog-image.png" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h6><i class="far fa-calendar-alt"></i>June 24 - 26, 2020</h6>
                        <h4 class="card-title">Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        </p>
                        <a href="#!" class="btn read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3 mb-3">
            <div class="card">
                <div class="Blog-card middle-card">
                    <div class="card-body">
                        <h6><i class="far fa-calendar-alt"></i>June 24 - 26, 2020</h6>
                        <h4 class="card-title">Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        </p>
                        <a href="#!" class="btn read-more">Read More</a>
                    </div>
                    <div class="img-square-wrapper">
                        <img class="" src="{{asset('website')}}/images/Blog-image.png" alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3 mb-3">
            <div class="card">
                <div class="Blog-card">
                    <div class="img-square-wrapper">
                        <img class="" src="{{asset('website')}}/images/Blog-image.png" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h6><i class="far fa-calendar-alt"></i>June 24 - 26, 2020</h6>
                        <h4 class="card-title">Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        </p>
                        <a href="#!" class="btn read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</section>

<section class="home-last-sec">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 first-sec-inner pt-5 pb-5">
            <div class="last-inner-wd">
               <h2 class="text-uppercase">Serving as largest 
                  home care service
                  in location.
               </h2>
               <p>Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
               </p>
               <button>
               CONTACT US
               </button>
            </div>
         </div>
         <div class="col-md-6 second-sec-inner pt-5 pb-5">
            <div class="last-inner-width">
               <h2>Send Us Enquiry</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
               <form class="h-last-contact">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <div class="input-group footer-form">
                           <span class="input-group-addon"><i class="fas fa-user"></i></span>
                           <input type="text" class="form-control" id="fullName" placeholder="Your Full Name">
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <div class="input-group footer-form">
                           <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                           <input type="number" class="form-control" id="number" placeholder="Phone Number">
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="input-group footer-form">
                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address*"/>
                     </div>
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                  </div>
                  <button type="submit" class="submit-btn btn btn-primary"><i class="fas fa-location-arrow"></i> SUBMIT NOW</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection