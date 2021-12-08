<div id="objective" class="data col-md-5">
    <p>Ans. <textarea class="form-control" name="question[{{$Questions_no}}][Ans]" @if(isset($qustion) && $qustion->question_type == 'free_text' ) value="{{$qustion->correct_answer}}" @endif  id=""> @if(isset($qustion) && $qustion->question_type == 'free_text' ){{$qustion->correct_answer}} @endif </textarea>
</div>