@extends('website.layout.master')
@push('css')
  <style>
   .bd-placeholder-img {
     font-size: 1.125rem;
     text-anchor: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none;
   }
   .has-error {
      border-color: #f7ebeb;
      background-color: #ffff99;
    }
    .emsg {
      color: rgb(249 119 119);
    }
    .hidden {
      visibility: hidden;
    }
    .btn_disabled {
      pointer-events: none;
    }
    .errorSec {
      color: rgb(249 119 119);
    }
    .price-card .card-body p:last-child:after{
      display: none;
    }
    .price-card .card-body ol>li {
      padding: 10px 0;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
   }


   .hero-form-1 .btn {
      background: #C45E1E;
      border: 0;
      width: 100%;
      font-size: 15px;
      padding: 10px;
      border-radius: 10px;
   }



   .solution-card .text-body .learn-btn {
      text-transform: uppercase;
      color: #C45E1E;
      font-weight: 600;
      position: relative;
      left: -70px;
   }




   .learn-more-btn {
      color: #C45E1E;
   }




   .learn-btn {
      text-transform: uppercase;
      color: #C45E1E;
      font-weight: 600;
      position: relative;
      left: 5px;
   }



   .learn-btn {
      text-transform: uppercase;
      color: #C45E1E;
      font-weight: 600;
      position: relative;
      left: 5px;
   }



   .learn-btn {
      text-transform: uppercase;
      color: #C45E1E;
      font-weight: 600;
      position: relative;
      left: 5px;
   }



   .last-inner-wd button {
      background: #C45E1E;
      border: 1px solid #fff;
      color: white;
      width: 40%;
      padding: 10px;
      border-radius: 10px;
      margin-top: 25px;
   }


   .h-last-contact .btn {
      background: #C45E1E;
      border: 0;
      width: 40%;
      float: right;
      padding: 8px;
      font-weight: 500;
      font-size: 15px;
   }








  </style>
@endpush
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
 
   <div class="container banner-content">
      <div class="row">
         <div class="col-lg-8 col-md-7">
            <div class="swiper-container2">
               <div class="swiper-wrapper">
                  <iframe  class="swiper-slide" width="900" height="506" src="https://www.youtube.com/embed/yAoLSRbwxL8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <iframe  class="swiper-slide" width="900" height="506" src="https://www.youtube.com/embed/yAoLSRbwxL8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <iframe  class="swiper-slide" width="900" height="506" src="https://www.youtube.com/embed/yAoLSRbwxL8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination"></div>
            </div>
         </div>
         <div class="col-lg-4 col-md-5 hero-quote">
            <div class="get-quote-box">
                  <h2>Get Quote Now!</h2>
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                     eiusmod tempor.
                  </p>
                  <hr />
                  <form class="hero-form-1" method="post" action="{{route('Get_Quote_Now')}}">
                    @csrf()
                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fas fa-user"></i></span>
                           <input type="text" class="form-control" id="text"  aria-describedby="emailHelp" placeholder="Your Full Name*" name="name" />
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                           <input type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone Number*" name="number"/>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address*" name="email"/>
                        </div>
                     </div>
                     <button type="submit" id="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> Submit Now</button>
                  </form>
               </div>
            </div>
      </div>
   </div>
</section>
<!--END HERO SECTION-->
<!--SECTION TWO SLIDER -->
<section class="slide-top-sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <h4 class="small-text">SEE OUR OFFERINGS</h4>
            <h2 class="big-heading">{!!($page->where('slug','OURSOLUTIONS')->first()->title??'Not Available')!!}</h2>
         </div>
         <div class="col-lg-6">
            <p class="text">{!!($page->where('slug','OURSOLUTIONS')->first()->description??'Not Available')!!}</p>
         </div>
      </div>
   </div>
</section>

<section class="slider-section">
   <!-- Slider main container -->
   <div class="container custom-container">
      <div class="solution-slider swiper-container">
         <!-- Additional required wrapper -->
         <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($oursolutions as $key=>$item)
              <div class="swiper-slide @if($key==0) swiper-slide-active @endif">
               <div class="solution-card">
                  <div class="image-container">
                       <img src="{{asset('website')}}/{{$item->image??''}}" alt="">
                  </div>
                  <div class="text-body">
                       <h3>{{$item->title??"Not Available"}}</h3>
                       {!! $item->description??"Not Available" !!}
                     <div class="learn-more-btn-div">
                        <a class="btn learn-btn" href="#">learn more</a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <!-- If we need pagination -->
         <div class="swiper-pagination"></div>
         <!-- If we need navigation buttons -->
         <div class="swiper-button-prev"><i class="slider-nav fas fa-arrow-left"></i></div>
         <div class="swiper-button-next"><i class="slider-nav fas fa-arrow-right"></i></div>
      </div>
   </div>
</section>
<!--SECTION END -->
<!-- Home Third  SECTION-->
<section class="sec-3">
   <div class="container">
      <div class="row align-items-center d-flex row">
         <div class="col-lg-6">
            <img class="img-fluid" src="{{asset('website')}}/images/vector.png" alt="">
         </div>
         <div class="col-lg-6">
            <h5 class="small-heading">About us</h5>
            <h2 class="section-3-heading">{{($page->where('slug','ONEPERSONATATIME')->first()->title??'Not Available')}}</h2>
            <p>
              {!!($page->where('slug','ONEPERSONATATIME')->first()->description??'Not Available')!!}
            </p>
            <a class="btn learn-more-btn" href="#">Learn More</a>
         </div>
      </div>
   </div>
</section>

<section class="home-Fourth-section pt-5 pb-5">
   <div class="container-fluid full-container">
      <div class="align-items-center d-flex row no-gutters">
         <div class="col-md-6 fr-inner-1">
            <div class="width-class">
               <h5 class="why-choose">WHY CHOOSE US?</h5>
               <h2 class="care-h">{{($page->where('slug','WEPROVIDEAFFORDABLECARE')->first()->title??'Not Available')}}</h2>
                {!!($page->where('slug','WEPROVIDEAFFORDABLECARE')->first()->description??'Not Available')!!}
               <div class="row">
                  @foreach($affordablecare as $item)
                  <div class="col-md-2 fourth-fst-inner">
                     <div class="img-fluid">
                          <img src="{{asset('website')}}/{{$item->image??''}}" class="img-fluid" alt="" />
                     </div>
                  </div>
                  <div class="col-md-10 text-uppercase">
                       <h4>{{$item->title??''}}</h4>
                  </div>
                  <p class="pl-2">
                      {!!$item->description??''!!}
                  </p>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="why-choose-left-img">
               <div class="img-fluid">
                  <img src="{{asset('website')}}/images/why-choose.png" class="img-fluid" alt="" />
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="price-section pt-5 pb-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center price-pkg">

            <h4>OUR PRICING</h4>
            <h2 class="big-heading">{{($page->where('slug','PACKAGES&PRICES')->first()->title??'Not Available')}}</h2>
            <p>
                 {!!($page->where('slug','PACKAGES&PRICES')->first()->description??'Not Available')!!}
            </p>
         </div>
         <div class="row mb-3 text-center my-price-table">
                         @foreach($packages as $key=>$package)             
                <div class="card col-lg-4 col-md-6 mb-4 price-card">
                   <div class="package-card-wrapper">
                      <div class="card-header">
                         <h6>{{++$key}}</h6>
                         <h2 class="pt-3">{!!$package->name!!} <br>{!!$package->price!!}$</h2>
                      </div>
                      <div class="card-body text-left">
                        {!! $package->description !!}
                        <p style="text-align: center;">
                            <i class="fas fa-check pr-2"></i> 
                            Beds: <b>{!! $package->beds??"Not Available" !!}</b>
                            Caretakers: <b>{!! $package->beds??"Not Available" !!}</b>
                            managers: <b>{!! $package->beds??"Not Available" !!}</b>
                        </p><br>
                      </div>
                      <div class="price-row">
                         <div class="column-1">
                            <h5>PRICE USD</h5>
                         </div>
                         <div class="column-1">
                            <h2>${{$package->price}}</h2>
                         </div>
                         <div class="column-2">
                            <div class="learn-more-btn-div">
                              @if($package->price==0)
                               <a class="btn learn-btn" href="{{url('sign_up',$package->id)}}">Start</a>
                              @else
                               <a class="btn learn-btn" href="{{url('sign_up',$package->id)}}">BUY NOW</a>
                              @endif
                            </div>
                         </div>
                      </div>
                   </div>  
                </div> 
             @endforeach
              <div class="card col-lg-4 col-md-6 mb-4 price-card">
                 <div class="package-card-wrapper">
                    <form method="post" action="{{route('sign_up_custom_package')}}">
                      @csrf
                      <div class="card-header">
                         <h6>{{++$key}}</h6>
                         <h2 style="display: flex;margin: 0 5px" class="pt-3">
                          <input type="text" name="custom_package_name" placeholder="Package Name *" class="form-control" style=" width: 70%" required>  
                          <input type="text" name="custom_package_price" placeholder="Price *" class="form-control" style=" width: 30%" required> $</h2>
                      </div>
                      <div class="card-body text-left">
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            How Many Beds Required? *<b>
                              <input type="number" name="beds" class="form-control" required>
                            </b>
                        </p>
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            No of Caretakers Required? *<b>
                              <input type="number" name="caretakers" class="form-control" required>                                
                            </b>
                        </p>
                        <p>
                            <i class="fas fa-check pr-2"></i> 
                            No of Managers Required? *<b>
                              <input type="number" name="managers" class="form-control" required>                                                                
                            </b>
                        </p>
                        <textarea class="form-control" rows="1" placeholder="Other Requirements" required name="description"></textarea><br>
                      </div>
                      <div class="price-row">
                         <div class="column-4">
                            <!-- <a class="learn-more-btn b-now"></button> -->
                            <div class="learn-more-btn-div">
                               <button type="submit" class="btn learn-btn">Request & Signup</button>
                               <!-- <a class="btn learn-btn" href="{{url('sign_up','custom')}}">Request & Signup</a> -->
                            </div>
                         </div>
                      </div>
                    </form>
                 </div>  
              </div>
         </div>
      </div>
   </div>
</section>

@include('website.layout.provides_care')

@include('website.layout.resource')

<section class="home-last-sec">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 first-sec-inner pt-5 pb-5">
            <div class="last-inner-wd">
               <h2 class="text-uppercase">
                {!!($page->where('slug','SERVINGASLARGESTHOMECARESERVICEINLOCATION.')->first()->title??'Not Available')!!}
               </h2>
               <p>{!!($page->where('slug','SERVINGASLARGESTHOMECARESERVICEINLOCATION.')->first()->description??'Not Available')!!}
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
<!-- End Home Fourth  SECTION-->
</body>
</html>
@endsection

@push('js')
<script>

$( document ).ready(function() {

   var validateEmail = function (elementValue) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(elementValue);
        }

        // for team email validate
        $('.email').keyup(function () {
            var value = $(this).val();
            var valid = validateEmail(value);

            if (!valid) {
                    $(this).css('color', 'rgb(249, 119, 119)');
                    $(".email").html("").css('border', '2px solid  rgb(249, 119, 119)');
                    $('#contact_us').attr('disabled', 'disabled');
                } else {


                    $(this).css('color', '#3fe43f');
                    $(".email").html("").css('border', '2px solid #3fe43f');
                    $('#contact_us').attr('disabled', false);

                }
         });

         var validatePhone = function (elementValue) {
            var phonePattern = /^[a-zA-Z0-9\-().\s]{10,15}$/;
            return phonePattern.test(elementValue);
        }

         // for team email validate
         $('#number').keyup(function (e) {
            var value = $(this).val();
            var valid = validatePhone(value);

            if (!valid) {
                $(this).css('color', 'red');
                $(".number").html("").css('border', '2px solid red');

            } else {
                $(this).css('color', '#000');
                $(".number").html("").css('border', '2px solid #3fe43f');
            }

         });


      $(".contact_us").unbind().click(function (e) {
                 e.preventDefault();
                 var data = $(this).serialize();
                 var fullName = $("input#fullName").val();
                 var number = $("input#number").val();
                 var email = $("input#email").val();
                 var message = $("#message").val();
                 var _token = $('input[name="_token"]').val();

                 if (email == "" || fullName == "" || number == "" || message =="" ) {
                     $("#errors").html("Please Fill the All Inputs").css("color", "rgb(249 119 119)");
                 } else {
                     console.log(data);
                     $.ajax({
                         type: 'POST',
                         url: "{{route('contact_us')}}",
                         data: {
                              fullName: fullName,
                              number: number,
                              email: email,
                              message: message,
                             _token: _token
                         },
                         success: function (result) {
                             if (result.msg == 'success') {
                                 swal({
                                     title: 'Done',
                                     text: result.data,
                                     icon: 'success',
                                     timer: 5000,
                                     buttons: false,
                                 }).then(() => {
                                     window.location.reload();
                                 })
                             } else {
                                 swal({
                                     text: result.data,
                                     icon: 'errors',
                                     title: 'Oops...',
                                     timer: 5000,
                                     buttons: false,
                                 }).then(() => {
                                     window.location.reload();
                                 })
                             }
                         },
                         error: function (error) {}
                     });
                 }

         });

        
});
</script>
@endpush