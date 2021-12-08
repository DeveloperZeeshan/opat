<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="text" id="user_id" value="{{ $userassessment->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Company Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_id" type="text" id="company_id" value="{{ $userassessment->company_id??''}}" >
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('caretaker_id') ? 'has-error' : ''}}">
    <label for="caretaker_id" class="col-md-4 control-label">{{ 'Caretaker Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="caretaker_id" type="text" id="caretaker_id" value="{{ $userassessment->caretaker_id or ''}}" >
        {!! $errors->first('caretaker_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quiz_id') ? 'has-error' : ''}}">
    <label for="quiz_id" class="col-md-4 control-label">{{ 'Quiz Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quiz_id" type="text" id="quiz_id" value="{{ $userassessment->quiz_id??''}}" >
        {!! $errors->first('quiz_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="col-md-4 control-label">{{ 'Answer' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="answer" type="text" id="answer" value="{{ $userassessment->answer??''}}" >
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $userassessment->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
