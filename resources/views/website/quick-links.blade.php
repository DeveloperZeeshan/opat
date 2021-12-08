@extends('website.layout.master')
@push('css')
<style>
    .info-box .info-count {
        margin-top: 0px !important;
    }

    section.sec-business-analysis {
        background-color: #184153;
    }

    .business-analysis-content h2 {
        color: white;
        font-size: 30px;
        font-weight: 600;
    }

    .business-analysis-content p {
        color: white;
        font-weight: 600;
        line-height: 1;
    }

    #show_certificate {
        background-image: url(http://127.0.0.1:8000/website/images/ammar.png);
        background-repeat: no-repeat;
        background-size: 100%;
    }
    .business-analysis-btn a {
        background-color: white;
        padding: 17px 59px;
        border-radius: 3px;
        color: #52b842;
        font-weight: 700;
        margin-right: 15px;
    }

    .business-analysis-btn {
        margin: 40px 0;
    }

    .business-analysis-btn i {
        margin-right: 7px;
    }

    .table-business-analysis .nav-tabs>li.active>a {
        border-bottom: 5px solid #37a000 !important;
        background-color: transparent;
        color: #898989;
    }

    .table-business-analysis ul.nav.nav-tabs {
        padding: 5px;
        margin-top: 30px;
        background-color: #ddd;
    }

    .table-business-analysis .nav-tabs>li>a {
        border-radius: 0;
        color: #2b2b2b;
        font-size: 20px;
        font-weight: 500;
    }

    .table-business-analysis .nav-tabs>li {
        /* padding: 0px 17px !important; */
    }

    .table-business-analysis .tab-content {
        background-color: white;
        margin-top: 0px;
        padding-top: 20px;
        margin-bottom: 39px;
        padding-bottom: 20px;
    }

    .tab-main-content {
        background-color: #dddddd;
        height: 53px;
        width: 90%;
        margin: 16px 0px 16px 59px;
        border-radius: 5px;
    }

    .table-content-anchor {
        padding: 15px 11px;
        width: 50%;
        float: left;
    }

    .table-content-anchor a i {
        margin-right: 10px;
        color: #52b842;
        font-size: 23px;
    }

    .table-content-anchor a {
        display: flex;
        align-items: center;
    }

    .table-content-anchor-two {
        padding: 15px 11px;
        width: 50%;
        float: right;
        text-align: end;
    }

    .table-content-anchor-two a {
        color: #52b842;
        margin-right: 10px;
    }

    .table-content-anchor-two span.time-video {
        margin-right: 10px;
    }
    span.video-time {
    display: block;
}
.accordion-percent-rule a {
    font-size: 14px;
    font-weight: bold;
}
.certificate_img {
    width: 175px;
    height: 90px;
    margin-left: 0px;
    margin-right: 140px;
}
.logo-container {
    text-align: left;
    padding: 30px 30px 0;
}

.logo-container img.certificate_img {
    width: 150px;
    height: auto;
}
 #project-resource .card-header {
    background-color: unset;
    border: none;
    padding: 5px 5px;
}
#project-resource .btn-link{
    margin-top: 0;
    border: none;
    color: #184153;
    text-align: left;
    text-decoration: none;
    }
#project-resource .card{
    border: none;
    background-color: #EFEFEF;
    border-radius: 0;
    margin-bottom: 20px;
}
#project-resource .card-col-1 a>i {
    margin-right: 20px;
}
#project-resource .card-col-1 a {
    padding: 10px 0;
    margin-left: 35px;
    text-decoration: none;
    color: #52b842;
}
#project-resource .card-col-1 {
    display: inline-grid;
}
#project-resource .btn-link>i {
    margin-right: 13px;
    font-size: 20px;
}
#project-resource .card-body {
    padding-top: 0;
    padding-bottom: 0;
}
#project-resource i.fas.fa-chevron-up {
    margin-left: 30px;
}
#project-resource .modal-content .modal-header {
    border: none;
    padding: 50px 0 0 70px;
}
#project-resource .modal-content .modal-header h5 {
    color: #52b842;
    font-size: 30px;
    font-weight: 600;
}
#project-resource .modal-content .modal-body {
    padding-left: 70px;
    padding-right: 70px;
}
#project-resource .modal-dialog {
    min-width: 1200px;
    margin-top: 90px;
}
#project-resource .modal-dialog .modal-content {
    border-radius: 0;
}
#project-resource .modal-content .modal-header button.close {
    position: absolute;
    right: -53px;
    top: -27px;
}
.sec-business-analysis h1 {
    color: white;
    padding-bottom: 5px;
    font-size: 25px;
}

.sec-business-analysis .form-check>.form-check-label {
    font-size: 18px;
    padding-left: 10px;
    color: white;
}

.sec-business-analysis .form-check>.form-check-input {
    height: 15px;
    width: 15px;
}

.sec-business-analysis .form-check {
    padding-left: 38px;
}
.mcqs, .true_false, .text_box { padding-bottom: 20px;}
section.sec-business-analysis {
    padding-bottom: 80px;
    background-color: white;
}

.sec-business-analysis .text_box #text_box {
    width: 60%;
}

.sec-business-analysis .Submit_btn {
    padding: 25px 0px 0;
    text-align: right;
}

.sec-business-analysis .col-md-12 {
    background: white;
    border-radius: 20px;
    max-width: 60%;
}

.sec-business-analysis .col-md-7 {
    background: #3B3C3F;
    border-radius: 20px;
    padding: 30px 50px;
}

.sec-business-analysis .Submit_btn .btn {
    padding: 10px 40px;
    border-radius: 10px;
    font-size: 16px;
    text-transform: uppercase;
    background: #8dd4ef;
    color: #3B3C3F;
    font-weight: 700;
}

section.hero-secion {  background: #253d44;}
  .job_portal .heading {text-align: center;}
  .job_portal .heading .inner_col {  padding: 30px 0;}
  .job_portal .heading .inner_col p { margin-bottom: 10px;}
  .job_portal .heading .inner_col h4 { font-size: 35px;  font-weight: 800; text-transform: uppercase;}
  .job_portal .side_bar .sidebar_filter { border: 2px solid  #344248; border-radius: 10px;  padding: 15px;  max-width: 70%; margin: 0 auto 20px; box-shadow: 0 0 5px #263d44;}
  .job_portal .side_bar .sidebar_filter h4 { font-weight: 600;  color: #283e45;}
  .job_portal .side_bar .sidebar_filter form label { font-size: 14px;}
  .job_portal .inner_row {  border: 2px solid #273e44;  border-radius: 11px; padding: 30px 10px;  margin: 0px -15px 30px;  box-shadow: 0 0 5px #263d44;}
  .job_portal .inner_row .right_inner_col>h4 {  font-weight: 700; margin-bottom: 3px;}
  .job_portal .inner_row .right_inner_col>p {   font-size: 14px; color: #919191;}
  .job_portal .inner_row .buttons { text-align: right;}
  .job_portal .inner_row .buttons>.right_inner_col>a { background: #253d44;  border-radius: 30px;  font-size: 10px;  padding: 8px 20px; color: white;}
  .job_portal .inner_row  .apply_btn { margin-top: 30px;}
  .job_portal .inner_row .apply_btn a { padding: 10px;  border-radius: 30px; border: 2px solid #2c3f46;    color: #2c3f46;  margin-right: 20px;}
  .job_portal .inner_row .apply_btn a.apply_now_button { background: #2c3f46; color: white;}


</style>
@endpush
@section('content')
<section class="hero-secion pb-5">
   @include('website.layout.menu')
     <div class="container banner-content">
         <div class="banner-text">
            <h1>Quiz</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
   </div>
</section>

<!-- LMS Start here-->
<section>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Learning Management</h3>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Lecture</th>
                                <!-- <th>Upload File</th> -->
                                <th>Video</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($learningmanagement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->lecture }}</td>
                                    <!-- <td>{{ $item->upload_file }}</td> -->
                                    <td><video width="220" height="100" controls>
                              <source src="{{asset('website/'.$item->upload_video)}}" type="video/mp4" >
                            </video></td>
                                    <td>  

                                            <a title="Create Quiz" style="cursor: pointer;" class="create_lms_id" attr="{{ $item->id }}" href="{{route('learning')}}">  
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Start Learning
                                                </button>
                                            </a>
                                        
                                      


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- LMS Ends Here -->
</section>

    <section class="sec-business-analysis mt-5">
        <div class="container">
            <div class="row" >
                <div class="col-md-3"></div>  
                <div class="col-md-7">
                  <form method="POST" action="{{route('quiz_submit')}}" accept-charset="UTF-8" class="form-horizontal" >
                  <h1 style="border-bottom: 2px solid white;">Basic Information</h1>
                  <br>
                <input  type="text" name="name" placeholder="Enter your name">
                <input type="text" name="email" placeholder="Enter your email">
                <br>
                <br>
                  <h1 style="border-bottom: 2px solid white;">Attempt Quiz</h1>
                        {{ csrf_field() }}
                        {{--<input type="hidden" name="lms_id" value="{{$lms_session_id}}">--}}
                        @foreach ($assessment as $key=>$element)
                       <p style="color: white;"> Question#{{$element->id}}</p>
                        @if ($element->question_type == 'mcqs')
                        <!-- <input type="hidden" name="question_id" value="{{$element->id}}"> -->
                        <div class="mcqs">
                          <h1>{{$element->question}}</h1>
                          <div class="form-check">

                             <input class="form-check-input" type="hidden"name="answer[{{$key}}][question]" value="{{$element->id}}" id="true">
                             <input class="form-check-input" type="radio"name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[0] }}" id="true">
                             <label class="form-check-label" for="Option1">{{ json_decode($element->option)[0] }} </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio"name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[1] }}" id="false" checked="">
                             <label class="form-check-label" for="Option2">{{ json_decode($element->option)[1] }} </label>
                          </div>
                             <div class="form-check">
                             <input class="form-check-input" type="radio" name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[2] }}" id="Option3" >
                             <label class="form-check-label" for="Option3">{{ json_decode($element->option)[2] }}</label>
                          </div>
                          <div class="form-check">
                             <input class="form-check-input" type="radio" name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[3] }}" id="Option4" >
                             <label class="form-check-label" for="Option4">{{ json_decode($element->option)[3] }}</label>
                          </div>
                       </div>
                          @elseif($element->question_type == 'true_false')   
                       <div class="true_false">
                          <h1>{{$element->question}}</h1>
                          <div class="form-check">
                            <input class="form-check-input" type="hidden"name="answer[{{$key}}][question]" value="{{$element->id}}" id="true">
                             <input class="form-check-input" type="radio" name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[0] }}" id="true">
                             <label class="form-check-label" for="true">True</label>
                          </div>
                          <div class="form-check">
                             <input class="form-check-input" type="radio"name="answer[{{$key}}][ans]" value="{{ json_decode($element->option)[1] }}" id="false" checked="">
                             <label class="form-check-label" for="false">False</label>
                          </div>
                       </div>
                      @elseif($element->question_type == 'free_text')
                       <div class="text_box">
                          <h1>{{$element->question}}</h1>
                          <div class="form-check">
                            <input class="form-check-input" type="hidden"name="answer[{{$key}}][question]" value="{{$element->id}}" id="true">
                             <textarea id="text_box" name="answer[{{$key}}][ans]" class="md-textarea form-control" rows="4" cols="50" ></textarea>
                          </div>
                       </div>
                   @endif
                @endforeach
                         <div class="Submit_btn">
                           <button class="btn btn-primary" type="Submit">Submit</button>
                         </div>
                </form>    
  
</div>
<div class="col-md-3"></div>
             
            </div>
        </div>
            
    </section>
   
   
@endsection
@push('js')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


@endpush

