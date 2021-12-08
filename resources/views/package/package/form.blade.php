

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $package->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}" >
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="number" id="price" value="{{ $package->price??''}}" required  min="0">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required >{!! $package->description??'' !!}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="col-md-4 control-label">{{ 'Logo' }}</label>
    @include('includes.image_or_logo_file',['file'=>$package->logo??""])
</div>

<!-- <div class="form-group {{ $errors->has('beds') ? 'has-error' : ''}}">
    <label for="beds" class="col-md-4 control-label">{{ 'Beds' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="beds" type="number" id="beds" value="{{ $package->beds??''}}" required  min="0" >
        {!! $errors->first('beds', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group {{ $errors->has('managers') ? 'has-error' : ''}}">
    <label for="managers" class="col-md-4 control-label">{{ 'Managers' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="managers" type="number" id="managers" value="{{ $package->managers??''}}" required  min="0">
        {!! $errors->first('managers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('caretakers') ? 'has-error' : ''}}">
    <label for="caretakers" class="col-md-4 control-label">{{ 'Caretakers' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="caretakers" type="number" id="caretakers" value="{{ $package->caretakers??''}}" required  min="0">
        {!! $errors->first('caretakers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input class="form-control" name="lms_access" type="hidden" id="lms_access" value="{{ $package->lms_access??''}}" >
<!-- <div class="form-group {{ $errors->has('lms_access') ? 'has-error' : ''}}">
    <label for="lms_access" class="col-md-4 control-label">{{ 'LMS Access' }}</label>
    <div class="col-md-6">
        {!! $errors->first('lms_access', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    @include('includes.status_dropdown',['status'=>$package->status??1])
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
