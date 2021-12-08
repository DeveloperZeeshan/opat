<div class="form-group {{ $errors->has('consumer_id') ? 'has-error' : ''}}">
    <label for="consumer_id" class="col-md-4 control-label">{{ 'Resident Name' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="consumer_id" required>
            <option @if(!isset($rentpayment->consumer_id)) selected @endif disabled value="">Select Resident</option>
            @foreach($consumers as $consumer)
                <option value="{{ $consumer->user_id }}" @if(isset($rentpayment->consumer_id) && $consumer->getUserDetail->id == $rentpayment->consumer_id) selected @endif >{{ $consumer->getUserDetail->name }}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="consumer_id" type="number" id="consumer_id" value="{{ $rentpayment->consumer_id??''}}" > -->
        {!! $errors->first('consumer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rent_date') ? 'has-error' : ''}}">
    <label for="rent_date" class="col-md-4 control-label">{{ 'Rent Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rent_date" type="date" max="{{Date('Y-m-d', strtotime('+1 day'))}}" id="rent_date" value="{{ $rentpayment->rent_date??''}}" >
        {!! $errors->first('rent_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bed_amount') ? 'has-error' : ''}}">
    <label for="bed_amount" class="col-md-4 control-label">{{ 'Bed Amount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="bed_amount" type="number" id="bed_amount" value="{{ $rentpayment->bed_amount??''}}" >
        {!! $errors->first('bed_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('actual_amount') ? 'has-error' : ''}}">
    <label for="actual_amount" class="col-md-4 control-label">{{ 'Expected Amount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="actual_amount" type="number" id="actual_amount" value="{{ $rentpayment->actual_amount??''}}" >
        {!! $errors->first('actual_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('recieved_amount') ? 'has-error' : ''}}">
    <label for="actual_amount" class="col-md-4 control-label">{{ 'Recieved Amount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="recieved_amount" type="number" id="recieved_amount" value="{{ $rentpayment->recieved_amount??''}}" >
        {!! $errors->first('recieved_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--@php--}}
{{--$due_amount= 0;--}}
{{--$due_amount += $rentpayment['actual_amount']-$rentpayment['bed_amount'];--}}
{{--@endphp--}}
{{--<div class="form-group {{ $errors->has('due_amount') ? 'has-error' : ''}}">--}}
    {{--<label for="actual_amount" class="col-md-4 control-label">{{ 'Due Amount' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="due_amount" type="number" id="due_amount" value="{{ ($rentpayment->actual_amount-$rentpayment->recieved_amount) }}">--}}
        {{--{!! $errors->first('due_amount', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}


<div class="form-group {{ $errors->has('added_by') ? 'has-error' : ''}}">
    <label for="added_by" class="col-md-4 control-label">{{ 'Added By' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="added_by" type="number" id="added_by" value="{{ $rentpayment->added_by??''}}"> -->
        <input class="form-control"  type="text"  value="{{ Auth::user()->name??'' }}" readonly>
        <input class="form-control" name="added_by" type="hidden" id="added_by" value="{{ Auth::user()->id??'' }}" readonly>
        {!! $errors->first('added_by', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
        @include('includes.status_dropdown',['status'=>$rentpayment->status??1])
    <!-- <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $rentpayment->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div> -->
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
