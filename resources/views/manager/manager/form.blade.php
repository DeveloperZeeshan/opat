<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="col-md-4 control-label">{{ 'Full Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="full_name" type="text" id="full_name" value="{{ old($manager->getUserDetail->name??' ')}}" required>
        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control email" name="email" type="text" id="email" value="{{ old($manager->getUserDetail->email??' ')}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if($action != 'edit')
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-6">
        <input class="form-control password" name="password" type="text" id="password" value="{{ old($manager->getUserDetail->password??' ')}}" required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        <span id="pass_message"></span>
    </div>
   
</div>
@endif
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control phone" name="phone" id="phone"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel"  placeholder="(xxx) xxx-xxxx" value="{{ old($manager->getProfileDetail->phone??' ')}}" required>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="alert alert-info" style="display: none;"></div>
<div class="form-group {{ $errors->has('nation_id_card') ? 'has-error' : ''}}">
    <label for="nation_id_card" class="col-md-4 control-label">{{ 'Social Security Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nation_id_card" type="text" placeholder="xxx-xxx-xxx" id="nation_id_card" value="{{ old($manager->getProfileDetail->nation_id_card??' ')}}" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
        {!! $errors->first('nation_id_card', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    <label for="dob" class="col-md-4 control-label">{{ 'Date Of Birth' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dob" type="date" id="dob" value="{{ old($manager->getProfileDetail->dob??' ')}}" >
        {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="{{ old($manager->getProfileDetail->address??' ')}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="col-md-4 control-label">{{ 'Country' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="country" type="text" id="country" value="{{ old($manager->getProfileDetail->country??' ')}}" >
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-md-4 control-label">{{ 'City' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="city" type="text" id="city" value="{{ old($manager->getProfileDetail->city??'')}}" required>
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('postal') ? 'has-error' : ''}}">
    <label for="postal" class="col-md-4 control-label">{{ 'Postal' }}</label>
    <div class="col-md-6">
        <input class="form-control postal" name="postal" type="text" id="postal" value="{{ old($manager->getProfileDetail->postal??' ')}}" required>
        {!! $errors->first('postal', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pic') ? 'has-error' : ''}}">
    <label for="pic" class="col-md-4 control-label">{{ 'Picture' }}</label>
   @include('includes.image_file',['file'=>$manager->getProfileDetail->pic??""])
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'status' }}</label>
    @include('includes.status_dropdown',['status'=>$manager->status??1])
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_btn" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
