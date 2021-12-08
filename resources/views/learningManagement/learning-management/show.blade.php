@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Blogs{{ $learningmanagement->id }}</h3>
                    @can('view-'.str_slug('LearningManagement'))
                        <a class="btn btn-success pull-right" href="{{ url('/learningManagement/learning-management') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                               <!--  <th>ID</th> -->
                                <!-- <td>{{ $learningmanagement->id }}</td>
 -->                            </tr>
                            <tr><th> Lecture </th><td> {{ $learningmanagement->lecture }} </td></tr>
                            <tr><th> Lecture File </th><td><iframe style="border:1px solid #666CCC" src="{{asset('website/'.$learningmanagement->upload_file)}}" title="file" frameborder="1" scrolling="auto" height="500" width="100%" ></iframe> 
                            <tr><th> Lecture Video </th><td> <iframe src="{{asset('website/'.$learningmanagement->upload_video)}}" title="video" width="100%" height="400px;"></iframe>
                             <br>
                             <br>
                             @if(auth()->user()->hasrole('consumer'))
                             <a title="Create Quiz" style="cursor: pointer; text-align: right;" class="create_lms_id" attr="{{$learningmanagement->id}}">  
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Start Quiz
                                </button>
                            </a>
                            @endif

                            </td> 
                                            
                            </tr>
                                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
$(document).on('click','.create_lms_id',function(e){
            var quiz_id = $(this).attr('attr');
            $.ajax({
                url: "{{route('show_lms_id_session')}}/"+quiz_id,
                type:'get',
                success: function(response) {
                    location.href = "{{ url('quiz/quiz/show') }}";
                }
            });
        });
</script>
@endpush

