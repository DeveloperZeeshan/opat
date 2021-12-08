@extends('website.layout.master')
@section('content')
<!-- END HEADER SECTION-->
<!--HERO SECTION-->
<section class="hero-secion pb-5">
   @include('website.layout.menu')
   <div class="container banner-content">
      <div class="row">
         
         <div class="col-md-12 hero-quote Login">
            <h2>Sign Up</h2>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </p>
            <hr />
            <form class="hero-form-1" id="sign_up_form" method="post" action="{{url('signup_process')}}" enctype="multipart/form-data">
               @if(count($errors) == 0)
                     @include('includes.session_message')
               @endif
               @csrf
               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
               
              @if($package != null)
                <div class="form-group">
                  <div class="input-group">
                     <select class="form-control" name="package" id="package_id" readonly>
                        <option value="{{$package->id}}"  selected>{{$package->name}}</option>
                     </select>
                  </div>             
                </div>
                <div class="form-group" style="display: none;">
                  <div class="input-group">
                     <select class="form-control" name="user_role" id="user_role" required readonly>
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        @foreach ($userRoles as $userRole)   
                          @if($userRole->name == "company")    
                            <option value="{{$userRole->id}}" selected  readonly>{{ucfirst($userRole->name)}}</option>
                          @endif  
                        @endforeach
                     </select>
                  </div>             
                </div>                
                <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-user"></i></span>
                     <input  type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" aria-describedby="emailHelp" placeholder="Company Name*" required />
                  </div>
                  @if ($errors->has('company_name'))
                    <span class="invalid feedback emsg " role="alert">
                        <strong>{{ $errors->first('company_name') }}.</strong>
                    </span>
                  @endif
                </div>                
              @else
                <div class="form-group">
                  <div class="input-group">
                     <input  type="hidden" class="form-control" id="company_name" name="company_name" value="null" aria-describedby="emailHelp" placeholder="Company Name*"  />
                  </div>
                  @if ($errors->has('company_name'))
                    <span class="invalid feedback emsg " role="alert">
                        <strong>{{ $errors->first('company_name') }}.</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <div class="input-group">
                     <select class="form-control" name="user_role" id="user_role" required readonly>
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        @foreach ($userRoles as $userRole)   
                        @if($userRole->name == "consumer")                    
                          <option value="{{$userRole->id}}" selected  >{{ucfirst($userRole->name)}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>             
                </div>
                
                @endif
                <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-user"></i></span>
                     <input   type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Username*" required />
                  </div>
                  @if ($errors->has('name'))
                    <span class="invalid feedback emsg " role="alert">
                        <strong>{{ $errors->first('name') }}.</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                     <input type="text" class="form-control email" id="exampleInputEmail1" value="{{ old('email') }}" name="email" aria-describedby="emailHelp" placeholder="Email Address*" required/>
                  </div>
                  @if ($errors->has('email'))
                      <span class="invalid feedback emsg " role="alert">
                          <strong>{{ $errors->first('email') }}.</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                     <input type="password" class="form-control password" id="password" value="{{ old('password') }}" name="password" aria-describedby="emailHelp" placeholder="Password" required/>
                  </div>
                  <p id="pass_message"></p>
                  @if ($errors->has('password'))
                    <span class="invalid feedback emsg " role="alert">
                        <strong>{{ $errors->first('password') }}.</strong>
                    </span>
                  @endif
                </div>
                

               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                     <input type="number" class="form-control phone" id="phone" name="phone" value="{{ old('phone') }}" aria-describedby="emailHelp" placeholder="Phone No" required />
                  </div>
                @if ($errors->has('phone'))
                  <span class="invalid feedback emsg " role="alert">
                      <strong>{{ $errors->first('phone') }}.</strong>
                  </span>
                @endif
               </div>
             
               <div class="row">
                <div class="col-md-6">                  
                  <div class="form-group" >
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-city"></i></span>
                        <input type="text" class="form-control" id="country" value="{{ old('country') }}" name="country" aria-describedby="emailHelp" placeholder="Country" required/>
                     </div>
                    @if ($errors->has('country'))
                     <span class="invalid feedback emsg " role="alert">
                         <strong>{{ $errors->first('country') }}.</strong>
                     </span>
                    @endif
                  </div>              
                </div>
                <div class="col-md-6">                  
                  <div class="form-group" >
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-city"></i></span>
                        <input type="text" class="form-control" id="city" value="{{ old('city') }}" name="city" aria-describedby="emailHelp" placeholder="City" />
                     </div>
                    @if ($errors->has('city'))
                     <span class="invalid feedback emsg " role="alert">
                         <strong>{{ $errors->first('city') }}.</strong>
                     </span>
                    @endif
                  </div>             
                </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-code"></i></span>
                     <input type="text" class="form-control" id="postal" value="{{ old('postal') }}" name="postal" aria-describedby="emailHelp" placeholder="Postal / Zip Code" />
                  </div>
                @if ($errors->has('postal'))
                  <span class="invalid feedback emsg " role="alert">
                      <strong>{{ $errors->first('postal') }}.</strong>
                  </span>
                @endif
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
                     <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" aria-describedby="addressHelp" placeholder="Address" required />
                  </div>
                @if ($errors->has('address'))
                  <span class="invalid feedback emsg " role="alert">
                      <strong>{{ $errors->first('address') }}.</strong>
                  </span>
                @endif
               </div>
                <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-logo"></i></span>
                     <input type="file" class="form-control" id="picture" name="picture" value="{{ old('picture') }}" aria-describedby="emailHelp" placeholder="Logo/Profile Picture" required accept="image/*" />
                  </div>
                @if ($errors->has('picture'))
                  <span class="invalid feedback emsg " role="alert">
                      <strong>{{ $errors->first('picture') }}.</strong>
                  </span>
                @endif
               </div>
               <button type="submit" class="btn btn-primary" id="submit_btn"><i class="fas fa-location-arrow"></i>Sign Up</button>
                <br>
                @if($package != null)
                       {{--$package->is_custom_package != 1 &&--}}
                   @if($package->price != 0)              
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51IwCsLHvXmO4xH0sWKA78TwVhFr8X6NpCeidqIUCx2qU5I6QNwZdLuNPP0HiVDqKLuKKuWKYRb6tnHtGkULPw4o300g2qO6tZv"
                            data-image="{{asset('website/images/logo.png')}}"
                            data-allow-remember-me="false"
                            data-label="Register Now">
                    </script>                
                  @endif
                @endif
             </form>
         </div>
      </div>
   </div>
</section>
<div class="package_detail_modal_div"></div>
@endsection
@push('css')
<style>
  @import url("https://fonts.googleapis.com/css?family=Open+Sans");

  form .error {
    color: #ff0000;
  }

  .stripe-button-el{
    display: none !important;
  }    
</style>
@endpush
@push('js')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>

        $('INPUT[type="file"]').change(function () {
                  var ext = this.value.match(/\.(.+)$/)[1];
                  switch (ext) {
                      case 'jpg':
                      case 'jpeg':
                      case 'png':
                      case 'jfif':
                      case 'gif':
                          break;
                      default:
                          alert('This is not an allowed file type.');
                          this.value = '';
                          $("#error_file").html("please upload only image").css("color",
                              "rgb(249 119 119)");
                  }
              });
              var validateEmail = function (elementValue) {
              var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
              return emailPattern.test(elementValue);
        }
        // for team email validate
        $('.email').keyup(function () {
            var value = $(this).val();
            var valid = validateEmail(value);

            if (!valid) {
                    // $(this).css('color', 'rgb(249, 119, 119)');
                    $(".email").html("").css('border', '2px solid  rgb(249, 119, 119)');
                    $('#submit_btn').attr('disabled', 'disabled');
                } else {


                    // $(this).css('color', '#3fe43f');
                    $(".email").html("").css('border', '2px solid #3fe43f');
                    $('#submit_btn').attr('disabled', false);

                }
         });

         var validatePassword = function (elementValue) {
            var passwordPattern = /^[0-9a-zA-Z]\w{4,14}$/;
            return passwordPattern.test(elementValue);
        }
        $('#password').keyup(function () {

            var value = $(this).val();
            var valid = validatePassword(value);

            if (!valid) {


                $(this).css('color', 'red');
                $("#pass_message").html("Password must be greater then 5 and less then 15 char").css("color", "rgb(249 119 119)");
               //  $('#submit_btn').attr('disabled', 'disabled');

            } else {


                $(this).css('color', '#000');
                $(".password").html("").css('border', '2px solid #3fe43f');
                $("#pass_message").html("").css("");
               //  $('#submit_btn').attr('disabled', false);

            }
        });
        var validatePhone = function (elementValue) {
            var phonePattern = /^[a-zA-Z0-9\-().\s]{10,15}$/;
            return phonePattern.test(elementValue);
        }
         // for team email validate
        $('#phone').keyup(function (e) {
            var value = $(this).val();
            var valid = validatePhone(value);

            if (!valid) {
                $(this).css('color', 'red');
                $(".phone").html("").css('border', '2px solid red');

            } else {
                $(this).css('color', '#000');
                $(".phone").html("").css('border', '2px solid #3fe43f');
            }

        });
        $(document).on('change','#package_id',function(e){
          e.preventDefault();
          var package_id = $(this).find(":selected").val();
             $.ajax({
                url: "{{url('get_package_detail')}}/"+package_id,
                type: 'GET',
                success: function (response) {
                  $(".package_detail_modal_div").html(response);
                  $('#package_detail_modal').modal('show');
                },error:function(error){
                  console.log(error);
                }
            });
        });
        $(document).on('click','.confirm_package',function(e){
          $('#package_detail_modal').modal('hide');
        });
        $(document).on('change','#user_role',function(e){
          if($(this).find(":selected").text()=='Company'){
            $('.packages_dropdown_div').show();
          }else{
            $('.packages_dropdown_div').hide();
          }//endif           
        });


        $("#submit_btn").validate({
          submitHandler: function(form) {
                //alert('sdf');
                // form.submit();
          }
            
        });

        
        
    </script>
@endpush