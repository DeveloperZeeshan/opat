<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
         />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>OPAT</title>
      <link
         href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap"
         rel="stylesheet"
         />
      <!-- <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/> -->
      <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" /> -->
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"  crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


      <!-- Bootstrap core CSS -->
      <link href="{{asset('website')}}/css/bootstrap.min.css" rel="stylesheet" />
      <link href="{{asset('website')}}/css/style.css" rel="stylesheet" />
      <link href="{{asset('website')}}/css/responsive.css" rel="stylesheet" />
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
         @media (min-width: 768px) {
         .bd-placeholder-img-lg {
         font-size: 3.5rem;
         }
         }
      </style>
      <!-- Custom styles for this template -->
      <link href="{{asset('website')}}/css/carousel.css" rel="stylesheet" />
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <!--Rich Text Editor-->
    
      @stack('css')
   </head>
   <body>
   @yield('content')
   <footer class="footer">
   <div class="container">
      <div class="row">
         <div class="col-md-4 icons-col">
            <p class="pb-5">If you would like to find out more, 
               please get in touch and someone from 
               our team will be happy to help.
            </p>
            <div class="row">
               <div class="col-md-2 text-right">
                  <i class="fas fa-phone-alt"></i>
               </div>
               <div class="col-md-10">
                  <h6>GET IN TOUCH</h6>
                  <p>+51 123 4567</p>
               </div>
               <div class="col-md-2 text-right">
                  <i class="far fa-envelope"></i>
               </div>
               <div class="col-md-10">
                  <h6>EMAIL enquires</h6>
                  <p>info@opat.com</p>
               </div>
               <div class="col-md-2 text-right">
                  <i class="fas fa-map-marker-alt"></i>
               </div>
               <div class="col-md-10">
                  <h6>VISIT OUR OFFICE</h6>
                  <p>Address here</p>
               </div>
            </div>
         </div>
         <div class="col-md-4 quick-links">
            <h2>Quick Links</h2>
            <div class="row">
               <div class="col-md-6">
                  <ul>
                     <li><a href="{{url('/')}}">Home</a></li>
                     <li><a href="{{url('about')}}">About</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Packages</a></li>
                     <li><a href="{{url('blogs')}}">Blogs</a></li>
                  </ul>
               </div>
               <div class="col-md-6">
                  <ul>
                     <li><a href="#">Careers</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Quote</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-4 subscribes" >
            <h2>Subscribe</h2>
            <form class="footer-form pt-3 form" id="newsLetter" method="post" action="{{url('news_letter')}}">
              @csrf
               <div class="form-group">
                  <input type="text" class="form-control subscribe_email" id="subscribe_email" name="subscribe_email" placeholder="Enter Email Address">
               </div>
               <p id="error" class="error"></p>
               <!-- <button>SUBSCRIBE</button> -->
               <div class="learn-more-btn-div">
                  <button type="button" value="submit" class="btn learn-btn subscribe" id="subscribe" href="#">SUBSCRIBE</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="text-center copy-right pb-5 pt-5">
      <p>©2021 OPAT. All rights reserved. </p>
   </div>
</footer>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.js"></script> -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
   var menu = ['1', '2', '3', '4', '5']
   var swiper = new Swiper('.swiper-container2', {
     direction: 'vertical',
     pagination: {
       el: '.swiper-pagination',
    clickable: true,
         renderBullet: function (index, className) {
           return '<span class="' + className + '">' + (menu[index]) + '</span>';
         }
     },
   });
</script>
<script>
   $(document).ready(function(e) {
      
      // Assign some jquery elements we'll need
      var $swiper = $(".swiper-container");
      var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
      // into a fixed position for animation purposes
      var $bottomSlideContent = null; // Slide content that gets passed between the
      // panning slide stack and the position 'behind'
      // the stack, needed for correct animation style
     
      var mySwiper = new Swiper(".swiper-container", {
            spaceBetween: 0.5,
            // slidesPerView: 3,
            centeredSlides: true,
            roundLengths: true,
            loop: true,
            loopAdditionalSlides: 30,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
            },
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
         breakpoints: {
            480: {
            slidesPerView: 1
            },
            768: {
            slidesPerView: 1
            },
            1024: {
            slidesPerView: 3
            }
         }
      });
      var validateEmail = function (elementValue) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(elementValue);
      }

      $('.subscribe_email').keyup(function () {
            var value = $(this).val();
            var valid = validateEmail(value);
          

            if (!valid) {
                    $(this).css('color', 'rgb(249, 119, 119)');
                    $(".subscribe_email").html("").css('border', '2px solid  rgb(249, 119, 119)');
                    $('#subscribe').attr('disabled', 'disabled');
                } else {


                    $(this).css('color', '#3fe43f');
                    $(".subscribe_email").html("").css('border', '2px solid #3fe43f');
                    $('#subscribe').attr('disabled', false);

                }
      });
    
    

      $("#newsLetter").keyup(function (e) {
         
            var email = $('input[name="subscribe_email"]').val();
            var _token = $('input[name="_token"]').val();
            console.log('yes');
            console.log('yes',email);

            
            if (email == "") {
                  $("#error").html("Please enter valid email").css("color", "rgb(249 119 119)");
            } else {
                 console.log('ajax');
                  $("#error").html("").css("");
                  $.ajax({
                     type: 'POST',
                     url: "{{route('news_letter')}}",
                     data: {
                        email: email,
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
                                 icon: 'error',
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
@stack('js')

