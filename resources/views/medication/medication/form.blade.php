<div class="form-group {{ $errors->has('consumer_id') ? 'has-error' : ''}}">
    <label for="consumer_id" class="col-md-4 control-label">{{ 'Resident Id' }}</label>
    <div class="col-md-6">

        <select class="form-control" name="consumer_id" required>
            <option @if(!isset($medication->consumer_id)) selected @endif disabled value="">Select Resident</option>
            @foreach($consumers as $consumer)
                <option value="{{ $consumer->user_id }}" @if(isset($medication->consumer_id) && $consumer->getUserDetail->id == $medication->consumer_id) selected @endif >{{ $consumer->getUserDetail->name }}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="{{ $medication->consumer_id??''}}" > -->
        {!! $errors->first('consumer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('medication') ? 'has-error' : ''}}">
    <label for="medication" class="col-md-4 control-label">{{ 'Medication' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="medication" type="textarea" id="medication" >{{ $medication->medication??''}}</textarea>
        {!! $errors->first('medication', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('frequency_taken') ? 'has-error' : ''}}">
    <label for="frequency_taken" class="col-md-4 control-label">{{ 'Frequency Taken' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="frequency_taken" type="text" id="frequency_taken" value="{{ $medication->frequency_taken??''}}" >
        {!! $errors->first('frequency_taken', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="col-md-4 control-label">{{ 'Start Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="start_date" type="date"  id="start_date" value="{{ $medication->start_date??''}}" >
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    <label for="end_date" class="col-md-4 control-label">{{ 'End Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="end_date" type="date"  id="end_date" value="{{ $medication->end_date??''}}" >
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('added_by') ? 'has-error' : ''}}">
    <label for="added_by" class="col-md-4 control-label">{{ 'Added By' }}</label>
    <div class="col-md-6">
        <input class="form-control"  type="text"  value="{{ Auth::user()->name??'' }}" readonly>
        <input class="form-control" name="added_by" type="hidden" id="added_by" value="{{ Auth::user()->id??'' }}" readonly>

        <!-- <input class="form-control" name="added_by" type="text" id="added_by" value="{{ $medication->added_by??''}}" > -->
        {!! $errors->first('added_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
