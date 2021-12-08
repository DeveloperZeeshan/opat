<div id="tf" class="data col-md-5">
    <p>Select Any One Of The Two For Correct Answer
        <select class="form-control" name="question[{{$Questions_no}}][Ans]">
            <option  @if(isset($qustion) && $qustion->correct_answer == 'true' ) selected @endif value="true" id="">True</option>
            <option @if(isset($qustion) && $qustion->correct_answer == 'false' ) selected @endif value="false" id="">False</option>
        </select>
    </p>
</div>