<form method="POST" action="{{ url('/rentPayment/rent-payment/' . $rentpayment->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Edit Rent Payment</h2>
          <button type="button" class="close rentpayment_edit_close_button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('consumer_id') ? 'has-error' : ''}}">
              <label for="consumer_id" class="col-md-4 control-label">{{ 'Consumer Name' }}</label>
              <div class="col-md-6">
                  <input class="form-control" type="text" value="{{ $rentpayment->getConsumerDetail->name??''}}" readonly >
                  <input class="form-control" name="consumer_id" type="hidden" id="consumer_id" value="{{ $rentpayment->consumer_id??''}}" >
                  {!! $errors->first('consumer_id', '<p class="help-block">:message</p>') !!}
              </div>
          </div>
          <div class="form-group {{ $errors->has('rent_date') ? 'has-error' : ''}}">
              <label for="rent_date" class="col-md-4 control-label">{{ 'Rent Date' }}</label>
              <div class="col-md-6">
                  <input class="form-control" name="rent_date" type="date" id="rent_date" value="{{ $rentpayment->rent_date??''}}" >
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
              <label for="actual_amount" class="col-md-4 control-label">{{ 'Actual Amount' }}</label>
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

          {{--<div class="form-group {{ $errors->has('due_amount') ? 'has-error' : ''}}">--}}
              {{--<label for="actual_amount" class="col-md-4 control-label">{{ 'Due Amount' }}</label>--}}
              {{--<div class="col-md-6">--}}
                  {{--<input class="form-control" name="due_amount" type="number" id="due_amount" value="{{ $rentpayment->due_amount??''}}" >--}}
                  {{--{!! $errors->first('due_amount', '<p class="help-block">:message</p>') !!}--}}
              {{--</div>--}}
          {{--</div>--}}
          <div class="form-group {{ $errors->has('added_by') ? 'has-error' : ''}}">
              <label for="added_by" class="col-md-4 control-label">{{ 'Added By' }}</label>
              <div class="col-md-6">
                  {{-- <input class="form-control" name="added_by" type="number" id="added_by" value="{{ $rentpayment->added_by??''}}"> --}}
                  <input class="form-control"  type="text"  value="{{ Auth::user()->name??'' }}" readonly>
                  <input class="form-control" name="added_by" type="hidden" id="added_by" value="{{ Auth::user()->id??'' }}" readonly>
                  {!! $errors->first('added_by', '<p class="help-block">:message</p>') !!}
              </div>
          </div>
          <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
              <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
              @include('includes.status_dropdown',['status'=>$rentpayment->status??1])
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary rentpayment_edit_close_button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>