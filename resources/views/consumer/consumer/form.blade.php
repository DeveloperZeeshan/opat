<style type="text/css">
    
    .Form_p1, .Form_p2,.Form_p3,.Form_p4, .Form_p5 {
    border: 2px solid;
    max-width: 55%;
    padding: 40px 5px;
    position: relative;
    margin: 0 auto;
    margin-bottom: 4%;
}

.Form_p1:before, .Form_p2:before, .Form_p3:before, .Form_p4:before, .Form_p5:before {content: '';border: 1px solid;padding: 10px 40px;text-transform: uppercase;font-weight: 800;background: #628d93;position: absolute;top: -20px;}

.Form_p1 .form-group , .Form_p2 .form-group {
    display: block !important;
}

.Form_p1:before {
    content: 'Personal Information';
    background: #0F4C82;
}

.Form_p2:before {
    content: 'Resident Status';
    background: #0F4C82;

}
.Form_p3:before {
    content: 'Rent Information';
        background: #0F4C82;

}
.Form_p4:before {
    content: 'General Information';
        background: #0F4C82;

}

.Form_p5:before {
    content: 'Profile Information';
        background: #0F4C82;

}

</style>

{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $consumer->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Company Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_id" type="number" id="company_id" value="{{ $consumer->company_id??''}}" >
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="Form_p1" >
    <div class="form-group {{ $errors->has('caretaker_id') ? 'has-error' : ''}}">
        <label for="caretaker_id" class="col-md-4 control-label">{{ 'Caretaker' }} <b style="color: red">*</b></label>
        <div class="col-md-6">
            <select name="caretaker_id" class="form-control" required id="caretaker_id">
                <option selected disabled value="">Select Caretaker</option>
                @foreach($caretakers as $caretaker)
                    <option @if(isset($caretaker->getFacilityDetail)) attr="{{ $caretaker->getFacilityDetail->name??"Not Available" }}" @else attr='Not Available' @endif value="{{ $caretaker->getUserDetail->id }}">{{ $caretaker->getUserDetail->name }}</option>
                @endforeach
            </select>
            <!-- <input class="form-control" name="caretaker_id" type="text" id="caretaker_id" value="{{ $consumer->getUserDetail->name??''}}" required> -->
            {!! $errors->first('caretaker_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
        <label for="full_name" class="col-md-4 control-label">{{ 'Full Name' }} <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control" name="full_name" type="text" id="full_name" value="{{ $consumer->getUserDetail->name??''}}" required>
            {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="col-md-4 control-label">{{ 'Email' }} <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control email" name="email" type="text" id="email" value="{{ $consumer->getUserDetail->email??''}}" required>
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @if($action != 'edit')
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-4 control-label">{{ 'Password' }} <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control password" name="password" type="password" id="password" value="{{ $consumer->getUserDetail->password??''}}" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="position: absolute;right: 23px;top: 10px;color: black; font-size: 18px;cursor: pointer;"></span>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
        <span id="pass_message"></span>
    </div>
    @endif
    <div class="form-group">
        <label for="facility" class="col-md-4 control-label">{{ 'Facility' }}</label>
        <div class="col-md-6">
        <input class="form-control" type="hidden"  name="facility_id" id='facility_id' value="{{$caretaker->getFacilityDetail->id??''}}" >
        <input class="form-control" type="text" name="facility_name" id='facility_name' value="{{$caretaker->getFacilityDetail->name??''}}" readonly>
        </div>
    </div>
</div>

{{-- project information div --}}
<div class="Form_p2" >
    <div class="form-group {{ $errors->has('project_exit_date') ? 'has-error' : ''}}">
        <label for="project_exit_date" class="col-md-4 control-label">{{ 'Exit Date' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="project_exit_date" type="date" id="project_exit_date"  value="{{ $consumer->getUserDetail->profile->project_exit_date??''}}" >
            {!! $errors->first('project_exit_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    {{--<div class="form-group {{ $errors->has('effective_leave_date') ? 'has-error' : ''}}">--}}
        {{--<label for="effective_leave_date" class="col-md-4 control-label">{{ 'Effective Leave Date' }}</label>--}}
        {{--<div class="col-md-6">--}}
            {{--<input class="form-control" name="effective_leave_date" type="text" id="effective_leave_date" value="{{ $consumer->getUserDetail->profile->effective_leave_date??''}}" >--}}
            {{--{!! $errors->first('effective_leave_date', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="form-group {{ $errors->has('thirty_day_notice') ? 'has-error' : ''}}">
        <label for="thirty_day_notice" class="col-md-4 control-label">{{ '30 Day Notice' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="thirty_day_notice" type="date" id="thirty_day_notice"  value="{{ $consumer->getUserDetail->profile->thirty_day_notice??''}}" >
            {!! $errors->first('thirty_day_notice', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('extension_granted') ? 'has-error' : ''}}">
        <label for="extension_granted" class="col-md-4 control-label">{{ 'Extension Granted' }}</label>
        <div class="col-md-6">
            {{-- <input class="form-control" name="extension_granted" type="text" id="extension_granted" value="{{ $consumer->getUserDetail->profile->extension_granted??''}}"> --}}
            <input class="" style="margin-top: 9px" name="extension_granted" type="checkbox" id="extension_granted"    @if(isset($consumer) && $consumer->getUserDetail->profile->extension_granted_check == 'on') checked @endif class="daysCheckbox4">
        {!! $errors->first('extension_granted', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('ninty_day_extension') ? 'has-error' : ''}}">
<label for="ninty_day_extension" class="col-md-4 control-label">{{ '90 Day Extension' }}</label>
<div class="col-md-6">
 <input class="form-control" name="ninty_day_extension" type="date"  id="ninty_day_extension" value="{{ $consumer->getUserDetail->profile->ninty_day_extension??''}}" >
 {!! $errors->first('ninty_day_extension', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
{{-- rent information div --}}
<div class="Form_p3" >
<div class="form-group {{ $errors->has('monthly_rent_amount') ? 'has-error' : ''}}">
<label for="monthly_rent_amount" class="col-md-4 control-label">{{ 'Monthly Rent Amount $' }}</label>
<div class="col-md-6">
 <input class="form-control" name="monthly_rent_amount" type="number" id="monthly_rent_amount" value="{{ $consumer->getUserDetail->profile->monthly_rent_amount??''}}" >
 {!! $errors->first('monthly_rent_amount', '<p class="help-block">:message</p>') !!}
</div>
</div>
{{--<div class="form-group {{ $errors->has('entry_date') ? 'has-error' : ''}}">--}}
{{--<label for="entry_date" class="col-md-4 control-label">{{ 'Entry Date' }}</label>--}}
{{--<div class="col-md-6">--}}
 {{--<input class="form-control" name="entry_date" type="date" max="{{Date('Y-m-d', strtotime('+1 day'))}}" id="entry_date" value="{{ $consumer->getUserDetail->profile->entry_date??''}}" >--}}
 {{--{!! $errors->first('entry_date', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('bed_hold_amount') ? 'has-error' : ''}}">
<label for="bed_hold_amount" class="col-md-4 control-label">{{ 'Bed Hold Amount' }}</label>
<div class="col-md-6">
 <input class="form-control" name="bed_hold_amount" type="number" id="bed_hold_amount" value="{{ $consumer->getUserDetail->profile->bed_hold_amount??''}}" >
 {!! $errors->first('bed_hold_amount', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('date_of_bedhold_reciept') ? 'has-error' : ''}}">
<label for="date_of_bedhold_reciept" class="col-md-4 control-label">{{ 'Date of Bedhold Reciept' }} </label>
<div class="col-md-6">
 <input class="form-control" name="date_of_bedhold_reciept" type="date" id="date_of_bedhold_reciept" value="{{ $consumer->getUserDetail->profile->date_of_bedhold_reciept??''}}" required>
 {!! $errors->first('date_of_bedhold_reciept', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="form-group {{ $errors->has('rent_source_id') ? 'has-error' : ''}}">
        <label for="rent_source_id" class="col-md-4 control-label">{{ 'Rent Source' }}</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="rent_source_id" name="rent_source_id" list="rent_source">
            <datalist id="rent_source">
             @foreach($rentSources as $rentSource)
                 <option  @if(isset($rent_source_id) && $rent_source_id==$rentSource->id) selected @endif>{{$rentSource->name}}</option>
             @endforeach
            </datalist>
        </div>

    </div>
{{--<div class="col-md-6">--}}
 {{--<select class="form-control" id="rent_source_id" name="rent_source_id">--}}
     {{--@foreach($rentSources as $rentSource)--}}
         {{--<option value="{{$rentSource->id}}" @if(isset($rent_source_id) && $rent_source_id==$rentSource->id) selected @endif>{{$rentSource->name}}</option>--}}
     {{--@endforeach--}}
 {{--</select>--}}
  {{--<input class="form-control" name="rent_source" type="text" id="rent_source" value="{{ $consumer->getUserDetail->profile->rent_source??''}}" >--}}
 {{--{!! $errors->first('rent_source_id', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

<div class="form-group {{ $errors->has('mdoc_agent_id') ? 'has-error' : ''}}">
<label for="mdoc_agent_id" class="col-md-4 control-label">{{ 'Care Agent' }}</label>
<div class="col-md-6">
 {{--<select class="form-control" id="mdoc_agent_id" name="mdoc_agent_id">--}}
     {{--@foreach($mdocAgents as $mdocAgent)--}}
         {{--<option value="{{$mdocAgent->id}}" @if(isset($mdoc_agent_id) && $mdoc_agent_id==$mdocAgent->id) selected @endif>{{$mdocAgent->name}}</option>--}}
     {{--@endforeach--}}
 {{--</select>--}}
  <input class="form-control" name="mdoc_agent_id" type="text" id="mdoc_agent_id" value="{{ $consumer->getUserDetail->profile->mdoc_agent_id??''}}" >
 {!! $errors->first('mdoc_agent_id', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('educationl_level_id') ? 'has-error' : ''}}">
<label for="educationl_level_id" class="col-md-4 control-label">{{ 'Education Level' }}</label>
<div class="col-md-6">
 <select class="form-control" id="educationl_level_id" name="educationl_level_id">
     @foreach($educationLevels as $educationLevel)
         <option value="{{$educationLevel->id}}" @if(isset($educationl_level_id) && $educationl_level_id==$educationLevel->id) selected @endif>{{$educationLevel->name}}</option>
     @endforeach
 </select>
 {{-- <input class="form-control" name="educationl_level_id" type="text" id="educationl_level_id" value="{{ $consumer->getUserDetail->profile->educationl_level_id??''}}" > --}}
 {!! $errors->first('educationl_level_id', '<p class="help-block">:message</p>') !!}
</div>
</div>
        <div class="form-group {{ $errors->has('consumer_type_id') ? 'has-error' : ''}}">
        <label for="consumer_type_id" class="col-md-4 control-label">{{ 'Resident Type' }}</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="consumer_type_id" name="consumer_type_id" list="consumer_type">
            <datalist id="consumer_type">
             @foreach($consumerTypes as $consumerType)
                 <option value="{{$consumerType->id}}" @if(isset($consumer_type_id) && $consumer_type_id==$consumerType->id) selected @endif>{{$consumerType->name}}</option>
             @endforeach
            </datalist>
        </div>
        </div>


    {{--<div class="form-group {{ $errors->has('bridge_card_eligible') ? 'has-error' : ''}}">--}}
        {{--<label for="bridge_card_eligible" class="col-md-4 control-label">{{ 'Bridge Card Eligible' }}</label>--}}
        {{--<div class="col-md-6">--}}
            {{--<input class=""  style="margin-top: 9px" name="bridge_card_eligible_check" type="checkbox" id="bridge_card_eligible_check"  @if(isset($consumer) && $consumer->getUserDetail->profile->bridge_card_eligible_check == 'on') checked @endif >--}}
            {{--<textarea class="form-control" name="bridge_card_eligible" type="bridge_card_eligible" id="bridge_card_eligible" > {{ $consumer->getUserDetail->profile->bridge_card_eligible??''}} </textarea>--}}
            {{--{!! $errors->first('Bridge Card Eligible', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="form-group {{ $errors->has('gov_assistance_eligible') ? 'has-error' : ''}}">
        <label for="gov_assistance_eligible" class="col-md-4 control-label">{{ 'Government Assistance Eligible' }}</label>
        <div class="col-md-6">
            <input class=""  style="margin-top: 9px" name="gov_assistance_eligible_check" type="checkbox" id="gov_assistance_eligible_check"    @if(isset($consumer) && $consumer->getUserDetail->profile->gov_assistance_eligible_check == 'on') checked @endif class="daysCheckbox4">
            <textarea class="form-control" name="gov_assistance_eligible" type="text" id="gov_assistance_eligible" > {{ $consumer->getUserDetail->profile->gov_assistance_eligible??''}} </textarea>
            {!! $errors->first('Bridge Card Eligible', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('injury') ? 'has-error' : ''}}">
        <label for="injury" class="col-md-4 control-label">{{ 'Injury' }}</label>
        <div class="col-md-6">
        <input class=""  style="margin-top: 9px" name="injury_check" type="checkbox" id="injury_check" @if(isset($consumer) && $consumer->getUserDetail->profile->injury_check == 'on') checked @endif class="daysCheckbox4" >
            <textarea class="form-control" name="injury" type="text" id="injury" > {{ $consumer->getUserDetail->profile->injury??''}} </textarea>
        {!! $errors->first('injury', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
<div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
<label for="notes" class="col-md-4 control-label">{{ 'Notes' }}</label>
<div class="col-md-6">
 <textarea class="form-control" name="notes" type="text" id="notes" value="{{ $consumer->getUserDetail->profile->notes??''}}" > {{ $consumer->getUserDetail->profile->notes??''}} </textarea>
 {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
</div>
</div>

</div>
<div class="Form_p4" >
<div class="form-group {{ $errors->has('nation_id_card') ? 'has-error' : ''}}">
<label for="nation_id_card" class="col-md-4 control-label">{{ 'Social Security Number' }}</label>
<div class="col-md-6">
 <input class="form-control nationalIdCard" name="nation_id_card" id="nation_id_card" value="{{ $consumer->getUserDetail->profile->nation_id_card??''}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" type="text" >
 {!! $errors->first('nation_id_card', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
<label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
<div class="col-md-6">
 <input class="form-control phone"  name="phone" type="number" id="phone" value="{{ $consumer->getUserDetail->profile->phone??''}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel">
 {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
<label for="dob" class="col-md-4 control-label">{{ 'Date of Birth' }}</label>
<div class="col-md-6">
 <input class="form-control" name="dob" type="date" max="{{Date('Y-m-d', strtotime('+1 day'))}}" id="dob" value="{{ $consumer->getUserDetail->profile->dob??''}}" >
 {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
<label for="country" class="col-md-4 control-label">{{ 'Country' }} <b style="color: red">*</b></label>
<div class="col-md-6">
 <input class="form-control" name="country" type="text" id="country" value="{{ $consumer->getUserDetail->profile->country??''}}" required>
 {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
<label for="city" class="col-md-4 control-label">{{ 'City' }}</label>
<div class="col-md-6">
 <input class="form-control" name="city" type="text" id="city" value="{{ $consumer->getUserDetail->profile->city??''}}" >
 {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('postal') ? 'has-error' : ''}}">
<label for="postal" class="col-md-4 control-label">{{ 'Zip Code' }}</label>
<div class="col-md-6">
 <input class="form-control postal" name="postal" type="text" id="postal" value="{{ $consumer->getUserDetail->profile->postal??''}}" >
 {!! $errors->first('postal', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
<label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
<div class="col-md-6">
 <input class="form-control" name="address" type="text" id="address" value="{{ $consumer->getUserDetail->profile->address??''}}" >
 {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="Form_p5" >
<div class="form-group {{ $errors->has('pic') ? 'has-error' : ''}}">
<label for="pic" class="col-md-4 control-label">{{ 'Profile Picture' }}</label>
@include('includes.image_file',['file'=>$manager->getUserDetail->profile->pic??""])
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
<label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
@include('includes.status_dropdown',['status'=>$manager->status??1])
</div>
</div>
<div class="form-group">
<div class="col-md-offset-4 col-md-4">
<input class="btn btn-primary" id="submit_btn" type="submit" value="{{ $submitButtonText??'Create' }}">
</div>
</div>
<br>
@push('js')
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
$(document).on('click', '.toggle-password', function() {
 $(this).toggleClass("fa-eye fa-eye-slash");
 var input = $("#password");
 input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
$(document).on('change','#caretaker_id',function(e){
 var id = $(this).find(':selected').attr('value');
 var name = $(this).find(':selected').attr('attr');
 $('#facility_id').val(id);
 $('#facility_name').val(name);
});
$(document).on('change','#caretaker_id',function(e){
 var id = $(this).find(':selected').attr('value');
 var name = $(this).find(':selected').attr('attr');
 $('#facility_id').val(id);
 $('#facility_name').val(name);
});

$("#phone").inputmask();
</script>
@endpush