@if(Route::current()->getName() =='cognitive-psycological.create')
<div class="form-group {{ $errors->has('memory_problem') ? 'has-error' : ''}}">
    <label for="memory_problem" class="col-md-4 control-label">{{ 'Resident' }}</label>
    <div class="col-md-6">
        <input class="form-control" rows="5" name="consumer_id" type="hidden" id="consumer_id" value="{{ $consumer->id??''}}">
        <input class="form-control" rows="5" name="consumer_name" type="text" id="consumer_name" value="{{ $consumer->getUserDetail->name??''}}" readonly>
        {!! $errors->first('memory_problem', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@else
    <div class="form-group {{ $errors->has('memory_problem') ? 'has-error' : ''}}">
        <label for="memory_problem" class="col-md-4 control-label">{{ 'Resident' }}</label>
        <div class="col-md-6">
            <input class="form-control" rows="5" name="consumer_id" type="hidden" id="consumer_id" value="{{ $cognitivepsycological->consumer_id??''}}">
            <input class="form-control" rows="5" name="consumer_name" type="text" id="consumer_name" value="{{ $cognitivepsycological->consumer_name??''}}" readonly>
            {!! $errors->first('memory_problem', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
<div class="form-group {{ $errors->has('memory_problem') ? 'has-error' : ''}}">
    <label for="memory_problem" class="col-md-4 control-label">{{ 'Memory Problem' }}</label>
    <div class="col-md-6">
        <input class=""  style="margin-top: 9px" name="memory_problem_check" type="checkbox" id="memory_problem_check" @if(isset($cognitivepsycological) && $cognitivepsycological->memory_problem_check == 'on') checked @endif  class="daysCheckbox4">
        <textarea class="form-control" rows="2" name="memory_problem" type="textarea" id="memory_problem" >{{ $cognitivepsycological->memory_problem??''}}</textarea>
        {!! $errors->first('memory_problem', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('memory_care') ? 'has-error' : ''}}">
    <label for="memory_problem" class="col-md-4 control-label">{{ 'Memory Care' }}</label>
    <div class="col-md-6">
        <input class=""  style="margin-top: 9px" name="memory_care_check" type="checkbox" id="memory_care_check" @if(isset($cognitivepsycological) && $cognitivepsycological->memory_care_check == 'on') checked @endif class="daysCheckbox4">
        <textarea class="form-control" rows="2" name="memory_care" type="textarea" id="memory_care" >{{ $cognitivepsycological->memory_care??''}}</textarea>
        {!! $errors->first('memory_care', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('Ambulatory') ? 'has-error' : ''}}">
    <label for="ambulatory" class="col-md-4 control-label">{{ 'Ambulatory' }}</label>
    <div class="col-md-6">
        <input class=""  style="margin-top: 9px" name="ambulatory_check" type="checkbox" id="ambulatory_check" @if(isset($cognitivepsycological) && $cognitivepsycological->ambulatory_check == 'on') checked @endif  class="daysCheckbox4">
        <textarea class="form-control" rows="2" name="ambulatory" type="textarea" id="ambulatory" >{{ $cognitivepsycological->ambulatory??''}}</textarea>
        {!! $errors->first('Ambulatory', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('perception') ? 'has-error' : ''}}">
    <label for="perception" class="col-md-4 control-label">{{ 'Perception' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="perception" type="textarea" id="perception" >{{ $cognitivepsycological->perception??''}}</textarea>
        {!! $errors->first('perception', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
    <label for="language" class="col-md-4 control-label">{{ 'Language' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="language" type="textarea" id="language" >{{ $cognitivepsycological->language??''}}</textarea>
        {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('critical_thinking') ? 'has-error' : ''}}">
    <label for="critical_thinking" class="col-md-4 control-label">{{ 'Critical Thinking' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="2" name="critical_thinking" type="textarea" id="critical_thinking" >{{ $cognitivepsycological->critical_thinking??''}}</textarea>
        {!! $errors->first('critical_thinking', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    @include('includes.status_dropdown',['status'=>$cognitivepsycological->status??1])
            <!--     <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $facility->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div> -->
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
