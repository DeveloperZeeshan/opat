<style type="text/css">
    .dark{
        color: black;font-weight: bold;
    }
</style>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <label for="name" class="col-md- control-label dark">{{ 'Name: ' }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ $yacht->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="yacht_type_id" class="col-md- control-label dark">{{ 'Yacht Type: ' }}</label>
        <select class="form-control" name="yacht_type_id">
            <option disabled selected value="">Select Type</option>
            @foreach($yachtTypes as $yachtType)
                <option value="{{$yachtType->id}}">{{ $yachtType->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('cabins') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <label for="cabins" class="col-md- control-label dark">{{ 'Cabins: ' }}</label>
        <input class="form-control" name="cabins" type="text" id="cabins" value="{{ $yacht->cabins??''}}" >
        {!! $errors->first('cabins', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="berths" class="col-md- control-label dark">{{ 'Berths: ' }}</label>
        <input class="form-control" name="berths" type="text" id="berths" value="{{ $yacht->berths??''}}" >
        {!! $errors->first('berths', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('charter_type_id') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <label for="charter_type_id" class="col-md- control-label dark">{{ 'Charter Type: ' }}</label><br>
        @foreach($charterTypes as $charterType)
            &nbsp;&nbsp;&nbsp;{{$charterType->name}} <input  name="charter_type_id[]" type="checkbox" id="charter_type_id" value="{{ $charterType->id??''}}" >
        @endforeach
        {!! $errors->first('charter_type_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="owner_email" class="col-md- control-label dark">{{ 'Owner Email: ' }}</label>
        <input class="form-control" name="owner_email" type="text" id="owner_email" value="{{ $yacht->owner_email??''}}">
        {!! $errors->first('owner_email', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="description" class="col-md- control-label dark">{{ 'Description: ' }}</label>
        <textarea class="form-control"rows="6" name="description" ></textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('background_image') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="background_image" class="col-md- control-label dark">{{ 'Background Image: ' }}</label>
        <input type="file" name="background_image" class="form-control">
        {!! $errors->first('background_image', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('foreground_image') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="foreground_image" class="col-md- control-label dark">{{ 'Foreground Image: ' }}</label>
        <input type="file" name="foreground_image" class="form-control">
        {!! $errors->first('foreground_image', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('search_result_image') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="search_result_image" class="col-md- control-label dark">{{ 'Search Result Image: ' }}</label>
        <input type="file" name="search_result_image" class="form-control">
        {!! $errors->first('search_result_image', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('gallery_image') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="gallery_image" class="col-md- control-label dark">{{ 'Gallery Images: ' }}</label>
        <input type="file" name="gallery_image" class="form-control">
        {!! $errors->first('gallery_image', '<p class="help-block">:message</p>') !!}
    </div>    
</div>

<div class="form-group {{ $errors->has('embed_video_id') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="embed_video_id" class="col-md- control-label dark">{{ 'Embed Video ID:: ' }}</label>
        <input type="text" name="embed_video_id" class="form-control">
        {!! $errors->first('embed_video_id', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<h2 class="dark">Specification</h2>
<div class="form-group {{ $errors->has('specification_text') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="specification_text" class="col-md- control-label dark">{{ 'Specification Text: ' }}</label>
        <textarea class="form-control"rows="4" name="specification_text"></textarea>
        {!! $errors->first('specification_text', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('specification_image') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="specification_image" class="col-md- control-label dark">{{ 'Specification Image: ' }}</label>
        <input type="file" name="specification_image" class="form-control">
        {!! $errors->first('specification_image', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('loa') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <label for="loa" class="col-md- control-label dark">{{ 'L.O.A: ' }}</label>
        <input class="form-control" name="loa" type="text" id="loa" value="{{ $yacht->loa??''}}" >
        {!! $errors->first('loa', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="beam" class="col-md- control-label dark">{{ 'Beam: ' }}</label>
        <input class="form-control" name="beam" type="text" id="beam" value="{{ $yacht->beam??''}}" >
        {!! $errors->first('beam', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('draft') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <label for="draft" class="col-md- control-label dark">{{ 'Draft: ' }}</label>
        <input class="form-control" name="draft" type="text" id="draft" value="{{ $yacht->draft??''}}" >
        {!! $errors->first('draft', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="sail_area" class="col-md- control-label dark">{{ 'Sail Area: ' }}</label>
        <input class="form-control" name="sail_area" type="text" id="sail_area" value="{{ $yacht->sail_area??''}}" >
        {!! $errors->first('sail_area', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('engine') ? 'has-error' : ''}}">
    <div class="col-md-4">
        <label for="engine" class="col-md- control-label dark">{{ 'Engine: ' }}</label>
        <input class="form-control" name="engine" type="text" id="engine" value="{{ $yacht->engine??''}}" >
        {!! $errors->first('engine', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4">
        <label for="fuel_tank" class="col-md- control-label dark">{{ 'Fuel Tank: ' }}</label>
        <input class="form-control" name="fuel_tank" type="text" id="fuel_tank" value="{{ $yacht->fuel_tank??''}}" >
        {!! $errors->first('fuel_tank', '<p class="help-block">:message</p>') !!}
    </div>    
    <div class="col-md-4">
        <label for="water_tank" class="col-md- control-label dark">{{ 'Water Tank: ' }}</label>
        <input class="form-control" name="water_tank" type="text" id="water_tank" value="{{ $yacht->water_tank??''}}" >
        {!! $errors->first('water_tank', '<p class="help-block">:message</p>') !!}
    </div>    
    
</div>
<h2 class="dark">Base Informations</h2>
<div class="form-group {{ $errors->has('base') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="base" class="col-md- control-label dark">{{ 'Base: ' }}</label>
        <input type="text" name="base" class="form-control">
        {!! $errors->first('base', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group {{ $errors->has('base_text') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <label for="base_text" class="col-md- control-label dark">{{ 'Base Text: ' }}</label>
        <textarea class="form-control"rows="4" name="base_text"></textarea>
        {!! $errors->first('base_text', '<p class="help-block">:message</p>') !!}
    </div>    
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
