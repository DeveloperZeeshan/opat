<div class="col-md-6">
    <input class="form-control" name="image" type="file" id="image" required>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
	@if(!$file=="")
    	<img src="{{ asset('website/').'/'.$file??'Not Available' }}" style="width: 100px;height: 100px" >
	@endif
</div>