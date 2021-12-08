<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $finance->name??''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $finance->email??''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        <span style="color: red" id="email_exist_msg"></span>
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-4 control-label">{{ 'Password' }} <b style="color: red">*</b></label>
        <div class="col-md-6">
            <input class="form-control password" name="password" type="password" id="password" value="{{ $finance->password??''}}" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="position: absolute;right: 23px;top: 10px;color: black; font-size: 18px;cursor: pointer;"></span>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
        <span id="pass_message"></span>
    </div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone" id="phone" value="{{ $finance->phone??''}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" type = "tel">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="text" id="user_id" value="{{ $finance->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->
<div class="form-group {{ $errors->has('added_by_id') ? 'has-error' : ''}}">
    <label for="added_by_id" class="col-md-4 control-label">{{ 'Added by' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="added_by_id" type="text" id="added_by_id" value="{{ Auth()->user()->name}}" readonly>
        {!! $errors->first('added_by_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
     <select id="status" name="status" class="form-control">                               
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
       
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submit_button" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>

@push('js')
<script type="text/javascript">
     $(document).on('click', '.toggle-password', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $("#password");
                input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });

    $("#email").on('keyup paste',function(){
        var email = $(this).val();
        $.ajax({
            url                             : "{{ route('check_email') }}",
            method                          : "POST",
            data                            : {
                '_token': '{{ csrf_token() }}',
                email          :email,
            },
            success: function( data ) {
                console.log(data);
                if(data=='yes'){
                    $('#email_exist_msg').text("This email is already registered");
                    $('#submit_button').attr('disabled','disabled');
                }else{
                    $('#email_exist_msg').text("");
                    $('#submit_button').removeAttr('disabled');
                }
            },

        });
    });

</script>
@endpush
