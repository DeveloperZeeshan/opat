<div class="form-group {{ $errors->has('roleId') ? 'has-error' : ''}}">
    <label for="roleId" class="col-md-4 control-label">{{ 'Roleid' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="roleId" type="number" id="roleId" value="{{ $subscription->roleId or ''}}" required>
        {!! $errors->first('roleId', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subscription_type_id') ? 'has-error' : ''}}">
    <label for="subscription_type_id" class="col-md-4 control-label">{{ 'Subscription Type Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subscription_type_id" type="number" id="subscription_type_id" value="{{ $subscription->subscription_type_id or ''}}" required>
        {!! $errors->first('subscription_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $subscription->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <label for="duration" class="col-md-4 control-label">{{ 'Duration' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="duration" type="text" id="duration" value="{{ $subscription->duration or ''}}" required>
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="number" id="price" value="{{ $subscription->price or ''}}" required>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-md-4 control-label">{{ 'Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="date" id="date" value="{{ $subscription->date or ''}}" required>
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('token') ? 'has-error' : ''}}">
    <label for="token" class="col-md-4 control-label">{{ 'Token' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="token" type="text" id="token" value="{{ $subscription->token or ''}}" required>
        {!! $errors->first('token', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
