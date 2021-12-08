<div class="col-md-6">
    <input class="form-control" name="logo" type="file" id="logo" required>
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
	@if(!$file=="")
    	<img src="{{ asset('website/').'/'.$file??'Not Available' }}" style="width: 100px;height: 100px" >
	@endif
</div>	