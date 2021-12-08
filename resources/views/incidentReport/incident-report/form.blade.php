<div class="form-group {{ $errors->has('consumer_id') ? 'has-error' : ''}}">
    <label for="consumer_id" class="col-md-4 control-label">{{ 'Resident' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="consumer_id" required >
            <option @if(!isset($incidentreport->consumer_id)) selected @endif disabled value="" >Select Resident</option>
            @foreach($consumers as $consumer)
                <option value="{{ $consumer->user_id }}" @if(isset($incidentreport->consumer_id) && $consumer->getUserDetail->id == $incidentreport->consumer_id) selected @endif >{{ $consumer->getUserDetail->name }}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="{{ $incidentreport->consumer_id??''}}" > -->
        {!! $errors->first('consumer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nature_of_incident') ? 'has-error' : ''}}">
    <label for="nature_of_incident" class="col-md-4 control-label">{{ 'Nature Of Incident' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nature_of_incident" type="text" id="nature_of_incident" list="incident" value="{{ $incidentreport->nature_of_incident??''}}" >
        {!! $errors->first('nature_of_incident', '<p class="help-block">:message</p>') !!}
        {{--<datalist id="incident">--}}
            {{--<option>Parole violation</option>--}}
            {{--<option>Collection</option>--}}
        {{--</datalist>--}}
    </div>
</div>

<div class="form-group {{ $errors->has('incident_detail') ? 'has-error' : ''}}">
    <label for="incident_detail" class="col-md-4 control-label">{{ 'Incident Detail' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="incident_detail" type="textarea" id="incident_detail" >{{ $incidentreport->incident_detail??''}}</textarea>
        {!! $errors->first('incident_detail', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('additional_notes') ? 'has-error' : ''}}">
    <label for="additional_notes" class="col-md-4 control-label">{{ 'Additional Notes' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="additional_notes" type="textarea" id="additional_notes" >{{ $incidentreport->additional_notes??''}}</textarea>
        {!! $errors->first('additional_notes', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('incident_date') ? 'has-error' : ''}}">
    <label for="incident_date" class="col-md-4 control-label">{{ 'Incident Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="incident_date" type="Date" id="incident_date" max="{{Date('Y-m-d', strtotime('+1 day'))}}" value="{{ $incidentreport->incident_date??''}}" >
        {!! $errors->first('incident_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('report_created_by') ? 'has-error' : ''}}">
    <label for="report_created_by" class="col-md-4 control-label">{{ 'Report Created By' }}</label>
    <div class="col-md-6">

        <input class="form-control"  type="text"  value="{{ Auth::user()->name??''}}" readonly>
        <input class="form-control" name="report_created_by" type="hidden" id="report_created_by" value="{{ Auth::user()->id??'' }}" readonly>
        <!-- <input class="form-control" name="report_created_by" type="number" id="report_created_by" value="{{ $incidentreport->report_created_by??''}}" > -->
        {!! $errors->first('report_created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    @include('includes.status_dropdown',['status'=>$incidentreport->status??1])

    <!-- <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $incidentreport->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
