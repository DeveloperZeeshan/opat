<div class="form-group {{ $errors->has('lecture') ? 'has-error' : ''}}">
    <label for="lecture" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lecture" type="text" id="lecture" value="{{ $learningmanagement->lecture??''}}" >
        {!! $errors->first('lecture', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="description" id="description">{!! $learningmanagement->description??''!!}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--@if(isset($learningmanagement->upload_file))--}}
    {{--<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">--}}
    {{--<label for="upload_file" class="col-md-4 control-label">{{ 'Upload File' }}</label>--}}
    {{--<div class="col-md-6">--}}
         {{--<input class="form-control" name="upload_file" type="file" id="upload_file" aaccept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" value="{{ $learningmanagement->upload_file??''}}">--}}
        {{--{!! $errors->first('image', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--@else--}}
{{--<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">--}}
    {{--<label for="upload_file" class="col-md-4 control-label">{{ 'Upload File' }}</label>--}}
    {{--<div class="col-md-6">--}}
         {{--<input class="form-control" name="upload_file" type="file" id="upload_file"  accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" value="">--}}
        {{--{!! $errors->first('image', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endif--}}
@if(isset($learningmanagement->upload_video))
<div class="form-group {{ $errors->has('upload_video') ? 'has-error' : ''}}">
    <label for="upload_video" class="col-md-4 control-label">{{ 'Upload Video' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="upload_video" type="file" id="upload_video" accept="video/*" value="{{asset('website/'.$learningmanagement->upload_video)}}" >
        {!! $errors->first('upload_video', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@else
<div class="form-group {{ $errors->has('upload_video') ? 'has-error' : ''}}">
    <label for="upload_video" class="col-md-4 control-label">{{ 'Upload Video' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="upload_video" type="file" id="upload_video" accept="video/*" value="" >
        {!! $errors->first('upload_video', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="col-md-4 control-label">{{ 'External Link' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="link" type="text" id="link" value="{{ $learningmanagement->link??''}}" >
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">--}}
    {{--<label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>--}}
    {{--<div class="col-md-6">--}}
     {{--<select id="status" name="status" class="form-control">                               --}}
        {{--<option value="1">Active</option>--}}
        {{--<option value="0">Inactive</option>--}}
    {{--</select>--}}
       {{----}}
        {{--{!! $errors->first('status', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>

