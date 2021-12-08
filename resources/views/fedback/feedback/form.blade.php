<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Company' }}</label>
    <div class="col-md-6">
        <input class="form-control" type="text"  value="{{ $feedback->getUserDetail->name??Auth::user()->name??''}}" readonly >
        <input class="form-control" name="company_id" type="hidden" id="company_id" value="{{ $feedback->company_id??Auth::user()->id??''}}" >
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="col-md-4 control-label">{{ 'Message' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="message" type="textarea" id="message" >{{ $feedback->message??''}}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_dropdown',['status'=>$feedback->status??1])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
