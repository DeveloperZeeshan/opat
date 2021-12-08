<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $jobrequest->name??''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $jobrequest->email??''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('job_id') ? 'has-error' : ''}}">
    <label for="job_id" class="col-md-4 control-label">{{ 'Job Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="job_id" type="number" id="job_id" value="{{ $jobrequest->job_id??''}}" >
        {!! $errors->first('job_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">
    <label for="attachment" class="col-md-4 control-label">{{ 'Attachment' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="attachment" type="text" id="attachment" value="{{ $jobrequest->attachment??''}}" >
        {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
    <label for="notes" class="col-md-4 control-label">{{ 'Notes' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="notes" type="textarea" id="notes" >{{ $jobrequest->notes??''}}</textarea>
        {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $jobrequest->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
