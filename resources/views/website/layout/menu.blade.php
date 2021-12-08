   <header>
      <div class="top-bar">
         <ul>
            <li><a href="mailto:info@opat.com"><i class="fas fa-envelope-open-text"></i>info@opat.com</a></li>
            <li><a href="tel:+51 123 4567"><i class="fas fa-phone-alt"></i>+51 123 4567</a></li>
         </ul>
         <hr>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item  {{ Request::is('/') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item  {{ Request::is('about') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('about')}}">About</a>
               </li>
               <li class="nav-item  {{ Request::is('news_and_events') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('news_and_events')}}">News and Events</a>
               </li>
               {{--<li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">--}}
                  {{--<a class="nav-link" href="{{url('blogs')}}">Blogs</a>--}}
               {{--</li>--}}
               <li class="nav-item {{ Request::is('privacy_policy') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('privacy_policy')}}">Privacy</a>
               </li>
               <li class="nav-item {{ Request::is('faq') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('faq')}}">Faq's</a>
               </li>
              <!--  <li class="nav-item {{ Request::is('quick_links') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('quick_links')}}">Quick Links</a>
               </li> -->
               <li class="nav-item {{ Request::is('resource') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('resource')}}">Resource</a>
               </li>
               @if(Auth::check())
                  <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                     <a class="nav-link" href="{{url('dashboard')}}">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('logout')}}">Logout</a>
                  </li>                                 
               @else 
                  <li class="nav-item {{ Request::is('signin') ? 'active' : '' }}">
{{--                  <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">--}}
                     {{--<a class="nav-link" href="{{url('login')}}">Login</a>--}}
                     <a class="nav-link" href="{{url('sign_in')}}">Login</a>
                  </li>
                  <li class="nav-item Signup {{ Request::is('sign_up') ? 'active' : '' }}" style="cursor: pointer;">
                     <a class="nav-link"  data-toggle="modal" data-target="#myModal">Sign Up</a>
                  </li>
                  
               @endif
               
            </ul>
         </div>
      </nav>
   </header>


   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="row">
          <div class="col-md-12">
          <div class="modal-content " id="comapny_modal">
            <div class="modal-header ">
              <h4 class="modal-title">Register As a <b>Company</b></h4>
            </div>
            <div class="modal-body">
              <ol>
                <li>
                <p><strong>Company</strong>&nbsp;can manage & restric managers access.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;can manage Caretakers.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;can add or remove Caretakers.</p>
                </li>
                <li>
                <p><strong>Company</strong>&nbsp;send feedback to Admin.</p>
                </li>
              </ol>
            </div>
            <div class="modal-footer">
            <a type="button" href="{{url('packages_details_for_company')}}" class="btn Signup" id="company" value="company">Sign Up</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
          

          {{--<div class="col-md-6">--}}
          {{--<div class="modal-content ">--}}
            {{--<div class="modal-header ">--}}
              {{--<h4 class="modal-title">Register As a <b>Consumer</b></h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body" >--}}
              {{--<ol>--}}
                {{--<li>--}}
                {{--<p><strong>Consumer</strong>&nbsp;can access LMS.</p>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<p><strong>Consumer</strong>&nbsp;can book appointment.</p>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<p><strong>Consumer</strong>&nbsp;can communicate with other users.</p>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<p><strong>Consumer</strong>&nbsp;can join fitness training sessions.</p>--}}
                {{--</li>--}}
              {{--</ol>               --}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
               {{--<a type="button" href="{{url('sign_up')}}" class="btn Signup">Sign Up</a>--}}
              {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
          {{--</div>--}}
          </div>
          </div>
        </div>
      </div>
      @push('js')
      <script>

        
      //     $(document).on('click','#company',function(e){
      //     e.preventDefault();
      //     var package_id = $(this).val();
      //     alert(package_id);
      //        $.ajax({
      //           url: "{{url('get_package_detail')}}",
      //           type: 'GET',
      //           success: function (response) {
      //             $('.comapny_modal').hide();
      //             $(".package_detail_modal_div").html(response);
      //             $('#package_detail_modal').modal('show');
      //           },error:function(error){
      //             console.log(error);
      //             $('.comapny_modal').hide();
      //           }
      //       });
      //   });
      </script>

@endpush