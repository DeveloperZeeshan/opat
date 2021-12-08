

<div id="mcqs" class="data col-md-12">
<div class="custom_heading">
<p>Choose Correct Answer</p>
</div>
	<div class="input_field_list">
<span><input type="radio" @if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[0]??'' ) checked @endif name="question[{{$Questions_no}}][Ans]" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[0]??''}}" @endif class="radio">&nbsp; <input class="form-control option" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[0]??''}}" @endif type="text" name="question[{{$Questions_no}}][option][]" id=""></span>
    <span><input type="radio"   @if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[1]??'' ) checked @endif name="question[{{$Questions_no}}][Ans]" class="radio">&nbsp;<input class="form-control option" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[1]??''}}" @endif type="text" name="question[{{$Questions_no}}][option][]" id=""></span>
    <span><input type="radio" @if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[2]??'' ) checked @endif name="question[{{$Questions_no}}][Ans]" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[2]??''}}" @endif class="radio">&nbsp;<input class="form-control option" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[2]??''}}" @endif type="text" name="question[{{$Questions_no}}][option][]" id=""></span>
    <span><input type="radio" @if(isset($qustion) && $qustion->correct_answer == json_decode($qustion->option)[3]??'' ) checked @endif name="question[{{$Questions_no}}][Ans]" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[3]??''}}" @endif class="radio">&nbsp; <input class="form-control option" @if(isset($qustion) && $qustion->question_type == 'mcqs' ) value="{{json_decode( $qustion->option)[3]??''}}" @endif type="text" name="question[{{$Questions_no}}][option][]" id=""></span>
	</div>
    
</div>
<script type="text/javascript">
    $(document).on('keyup','.option',function(e){
        var val =  $(this).val();
        $(this).closest('span').find('.radio').val(val)
    });
</script>