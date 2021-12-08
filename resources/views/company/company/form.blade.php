<div class="form-group {{ $errors->has('package_id') ? 'has-error' : ''}}">
    <label for="package_id" class="col-md-4 control-label">{{ 'Package Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="package_id" type="number" id="package_id" value="{{ $company->package_id??''}}" required>
        {!! $errors->first('package_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $company->user_id??''}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('column_1') ? 'has-error' : ''}}">
    <label for="column_1" class="col-md-4 control-label">{{ 'Column 1' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="column_1" type="text" id="column_1" value="{{ $company->column_1??''}}" >
        {!! $errors->first('column_1', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('column_2') ? 'has-error' : ''}}">
    <label for="column_2" class="col-md-4 control-label">{{ 'Column 2' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="column_2" type="text" id="column_2" value="{{ $company->column_2??''}}" >
        {!! $errors->first('column_2', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('column_3') ? 'has-error' : ''}}">
    <label for="column_3" class="col-md-4 control-label">{{ 'Column 3' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="column_3" type="text" id="column_3" value="{{ $company->column_3??''}}" >
        {!! $errors->first('column_3', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('column_4') ? 'has-error' : ''}}">
    <label for="column_4" class="col-md-4 control-label">{{ 'Column 4' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="column_4" type="text" id="column_4" value="{{ $company->column_4??''}}" >
        {!! $errors->first('column_4', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('column_5') ? 'has-error' : ''}}">
    <label for="column_5" class="col-md-4 control-label">{{ 'Column 5' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="column_5" type="text" id="column_5" value="{{ $company->column_5??''}}" >
        {!! $errors->first('column_5', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
