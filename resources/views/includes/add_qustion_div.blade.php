<div class="row {{ $errors->has('assessment_title') ? 'has-error' : ''}}">
    <br>
    <div class="col-md-5">
        <p>Question{{$Questions_no}}</p><input class="form-control addquestion" type="text" name="question[{{$Questions_no}}][question]" id="question" value="{{$qustion->question??''}}" required>
        @if(isset($qustion))
            <input type="hidden" name="question[{{$Questions_no}}][id]" value="{{$qustion->id}}" required>
        @endif
    </div>
    <div class="col-md-2">
        <p>Select Answer type
            <select data-qution-no = "{{$Questions_no}}" class="form-control required assessment_answer_typeQ{{$Questions_no}}" name="question[{{$Questions_no}}][type]" id="assessment_answer_typeQ{{$Questions_no}}" required>
                <option value="none" selected disabled>None</option>
                <option @if(isset($qustion) && $qustion->question_type == 'mcqs' ) selected @endif value="mcqs">MCQs</option>
                <option @if(isset($qustion) && $qustion->question_type == 'true_false' ) selected @endif value="true_false">True/False</option>
                <option @if(isset($qustion) && $qustion->question_type == 'free_text' ) selected @endif value="free_text">Free Text</option>
            </select>
        </p>
    </div>
    <div class="row " id="assessment_answer_type_response_divQ{{$Questions_no}}">

    </div>
</div>

<script type="text/javascript">

    @if(isset($qustion))

    answerType("{{$qustion->question_type}}","{{$qustion->id}}","{{$Questions_no}}")

    @endif

    $(document).on('change','#assessment_answer_typeQ{{$Questions_no}}',function(e){
        var assessment_answer_type_selected =  $(this).val();
        questionsno = $(this).attr('data-qution-no');
        if(assessment_answer_type_selected){
            //alert(assessment_answer_type_selected);
            id = 'no';
            answerType(assessment_answer_type_selected,id,questionsno)

        }
    });

    function answerType(assessment_answer_type_selected,id,questionsno){

        $.ajax({
            type : 'get',
            url : "{{route('assessment_answer_type_process')}}/"+assessment_answer_type_selected+"/"+questionsno+"/"+id,
            success:function(data){
                console.log(data);
                $('#assessment_answer_type_response_divQ'+questionsno).html(data);
            }
        });
    }
</script>