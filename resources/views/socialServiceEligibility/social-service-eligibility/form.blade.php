@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@if(Route::current()->getName() == 'create')
<div class="form-group {{ $errors->has('consumer_name') ? 'has-error' : ''}}">
    <label for="consumer_name" class="col-md-4 control-label">{{ 'Resident' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="consumer_name" type="text" id="consumer_name" value="{{ $consumer->getUserDetail->name??''}}" readonly >
        <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="{{ $consumer->user_id??''}}">
        {!! $errors->first('consumer_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@else
    <div class="form-group {{ $errors->has('consumer_name') ? 'has-error' : ''}}">
        <label for="consumer_name" class="col-md-4 control-label">{{ 'Resident' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="consumer_name" type="text" id="consumer_name" value="{{ $socialserviceeligibility->getUserDetail->name??''}}" readonly >
            <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="{{ $socialserviceeligibility->consumer_id??''}}">
            {!! $errors->first('consumer_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif


<div class="form-group {{ $errors->has('eligibility') ? 'has-error' : ''}}">
    <label for="eligibility" class="col-md-4 control-label">{{ 'Eligibility' }}</label>
    <div class="col-md-6">
        <select class="selectpicker" name="eligibility[]" id="eligibility" required multiple  data-live-search="true">
            @foreach($service as $services)
            <option value="{{$services->name}}" >{{$services->name}}</option>
            @endforeach
        </select>
        {!! $errors->first('eligibility', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_dropdown',['status'=>$facility->status??1])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>$('select').selectpicker();</script>
@endpush