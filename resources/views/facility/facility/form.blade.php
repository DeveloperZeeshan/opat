@if(isset(auth()->user()->getCompanyDetail->id))
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->getCompanyDetail->id }}">
@else
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->getManagerDetail->id }}">
@endif

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $facility->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="address" type="textarea" id="address" required>{{ $facility->address??''}}</textarea>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-md-4 control-label">{{ 'City' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="{{ $facility->city??''}}" >
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="col-md-4 control-label">{{ 'State' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="state" type="text" id="state" value="{{ $facility->state??''}}" >
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
    <label for="zip_code" class="col-md-4 control-label">{{ 'Zip Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="zip_code" type="text" id="zip_code" value="{{ $facility->zip_code??''}}" >
        {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
 <div class="form-group {{ $errors->has('number_of_beds') ? 'has-error' : ''}}">
    <label for="number_of_beds" class="col-md-4 control-label">{{ 'Total number Of beds' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="number_of_beds" type="number" id="number_of_beds" value="{{ $facility->number_of_beds??''}}" required>
        {!! $errors->first('number_of_beds', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('rent_amount') ? 'has-error' : ''}}">--}}
    {{--<label for="rent_amount" class="col-md-4 control-label">{{ 'Rent Amount' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="rent_amount" type="number" id="rent_amount" value="{{ $facility->rent_amount??''}}" >--}}
        {{--{!! $errors->first('rent_amount', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone"  id="phone" value="{{ $facility->phone??''}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
    <label for="fax" class="col-md-4 control-label">{{ 'Fax' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ $facility->fax??''}}" >
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    @include('includes.status_dropdown',['status'=>$facility->status??1])
<!--     <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $facility->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
