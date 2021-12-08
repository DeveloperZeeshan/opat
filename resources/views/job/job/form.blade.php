<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $job->title??''}}" required>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="col-md-4 control-label">{{ 'Location' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="location" type="text" id="location" value="{{ $job->location??''}}" >
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="description" type="text" id="description" value="{{ $job->description??''}}" ></textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
    <label for="city_id" class="col-md-4 control-label">{{ 'City' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="city_id" id="city_id" required>
            <option value="" selected disabled>Select City</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
        {{-- <input class="form-control" name="city_id" type="number" id="city_id" value="{{ $job->city_id??''}}" > --}}
        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    <label for="department_id" class="col-md-4 control-label">{{ 'Department' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="department_id" id="department_id" required>
            <option value="" selected disabled>Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
        {{-- <input class="form-control" name="department_id" type="number" id="department_id" value="{{ $job->department_id??''}}" > --}}
        {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('job_type_id') ? 'has-error' : ''}}">
    <label for="job_type_id" class="col-md-4 control-label">{{ 'Job Type' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="job_type_id" id="job_type_id" required>
            <option value="" selected disabled>Select Job Type</option>
            @foreach($jobTypes as $jobType)
                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
            @endforeach
        </select>
        {{-- <input class="form-control" name="job_type_id" type="number" id="job_type_id" value="{{ $job->job_type_id??''}}" > --}}
        {!! $errors->first('job_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
     <select id="status" name="status" class="form-control">                               
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
       
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
