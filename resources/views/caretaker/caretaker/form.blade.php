
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="text" id="user_id" value="{{ $caretaker->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Company Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_id" type="text" id="company_id" value="{{ $caretaker->company_id??''}}" >
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
{{-- {{dd($caretaker->getUserDetail->full_name)}} --}}

<div class="form-group {{ $errors->has('facility_id') ? 'has-error' : ''}}">
    <label for="facility_id" class="col-md-4 control-label">{{ 'Facility' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="facility_id" required>
            <option selected disabled value="">Select Facility</option>
            @foreach($facilities as $facility)
                <option value="{{ $facility->id }}" @if(isset($caretaker->facility_id) && $facility->id == $caretaker->facility_id ) selected   @endif>{{ $facility->name }}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="facility_id" type="text" id="facility_id" value="{{ $caretaker->getFacilityDetail->name??''}}" required> -->
        {!! $errors->first('facility_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="col-md-4 control-label">{{ 'Full Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="full_name" type="text" id="full_name" value="{{ $caretaker->getUserDetail->name??''}}" required>
        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control email" name="email" type="text" id="email" value="{{ $caretaker->getUserDetail->email??''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if($action != 'edit')
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-6">
        <input class="form-control password" name="password" type="text" id="password" value="{{ $caretaker->getUserDetail->password??''}}" required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
    <span id="pass_message"></span>
</div>
@endif
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control phone" name="phone" id="phone" value="{{ $caretaker->getUserDetail->profile->phone??''}}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nation_id_card') ? 'has-error' : ''}}">
    <label for="nation_id_card" class="col-md-4 control-label">{{ 'Social Security Number' }}</label>
    <div class="col-md-6">
        <input class="form-control nationalIdCard" name="nation_id_card" type="text" id="nation_id_card" value="{{ $caretaker->getUserDetail->profile->nation_id_card??''}}" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
        {!! $errors->first('nation_id_card', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    <label for="dob" class="col-md-4 control-label">{{ 'Date of Birth' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dob" type="date" max="{{Date('Y-m-d', strtotime('+1 day'))}}" id="dob" value="{{ $caretaker->getUserDetail->profile->dob??''}}" >
        {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="{{ $caretaker->getUserDetail->profile->address??''}}" required>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="col-md-4 control-label">{{ 'Country' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="country" type="text" id="country" value="{{ $caretaker->getUserDetail->profile->country??''}}" >
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-md-4 control-label">{{ 'City' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="{{ $caretaker->getUserDetail->profile->city??''}}" >
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('postal') ? 'has-error' : ''}}">
    <label for="postal" class="col-md-4 control-label">{{ 'Postal' }}</label>
    <div class="col-md-6">
        <input class="form-control postal" name="postal" type="text" id="postal" value="{{ $caretaker->getUserDetail->profile->postal??''}}" >
        {!! $errors->first('postal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('pic') ? 'has-error' : ''}}">
    <label for="pic" class="col-md-4 control-label">{{ 'Picture' }}</label>
   @include('includes.image_file',['file'=>$caretaker->getUserDetail->profile->pic??""])
</div> -->
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'status' }}</label>
    @include('includes.status_dropdown',['status'=>$caretaker->getUserDetail->status??1])
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_btn" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>

