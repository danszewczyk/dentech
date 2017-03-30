@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>

                <div class="panel-body">

                  @include('errors.list')
                  
                  <form action="{{ route('postContact', ['patient_id' => $patient_info['id']]) }}" method="post">
                    

                    

                      @foreach ( $phones as $phone )
                      <div class="row">
                      <div class="col-md-4">
                         <div class="form-group @if ($errors->has('phone.'.$loop->index.'.number')) has-error @endif">
                          <label class="control-label" for="phone_{{ $loop->iteration }}_number">Phone {{ $loop->iteration }}</label>
                          <input type="text" class="form-control" id="phone_{{ $loop->iteration }}_number" name="phone[{{ $loop->index }}][number]" value="{{ old('phone.'.$loop->index.'.number', $phone['number']) }}">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group @if ($errors->has('phone.'.$loop->index.'.type')) has-error @endif">
                          <label class="control-label" for="phone_{{ $loop->iteration }}_type">Type</label>
                          <select class="form-control" id="phone_{{ $loop->iteration }}_type" name="phone[{{ $loop->index }}][type]" >
                            <option value="{{ old('phone.'.$loop->index.'.type', $phone['type']) }}">{{ $phone['type'] }}</option>
                            <option value="MOBILE">Mobile</option>
                            <option value="HOME">Home</option>
                            <option value="WORK">Work</option>
                            <option value="OTHER">Other</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                         <label><input type="checkbox" name="phone[{{ $loop->index }}][smsAuthorizationStatus]" value="OPT_IN" @if (isset($phone['smsAuthorizationStatus']) && $phone['smsAuthorizationStatus'] == 'OPT_IN') checked @endif> Text Reminders</label>
                         <input name="phone[{{ $loop->index }}][sequence]" type="hidden" value="{{ $loop->iteration }}" /><br/>
                      </div>

                      </div>

                      @endforeach


                    


                    <div class="row">
                      <div class="col-md-12">
                         <div class="form-group @if ($errors->has('phones')) has-error @endif">
                          <label class="control-label" for="zip">Email</label>
                          <input type="text" class="form-control" id="phone" name="email" value="{{ old('email', $patient_info['primaryEmail']['address']) }}">
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('address1')) has-error @endif">
                          <label class="control-label" for="first_name">Address1</label>
                          <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $patient_info['patientAddress']['address1']) }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('address2')) has-error @endif">
                          <label class="control-label" for="last_name">Address2</label>
                          <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $patient_info['patientAddress']['address2']) }}">
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-12">
                         <div class="form-group @if ($errors->has('zip')) has-error @endif">
                          <label class="control-label" for="zip">Zip</label>
                          <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $patient_info['patientAddress']['postalCode']) }}">
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                          <label class="control-label" for="city">City</label>
                          <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $patient_info['patientAddress']['city']) }}">
                        </div>
                         <div class="form-group @if ($errors->has('state')) has-error @endif">
                          <label class="control-label" for="first_name">State</label>
                          <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $patient_info['patientAddress']['state']) }}">
                        </div>
                         <div class="form-group @if ($errors->has('zip')) has-error @endif">
                          <label class="control-label" for="zip">Zip</label>
                          <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $patient_info['patientAddress']['postalCode']) }}">
                        </div>
                      </div>
                    </div>
                    
                
                     
                
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div> -->

                     
                      <button type="submit" class="btn btn-default">Continue</button>
                      {{ csrf_field() }}
                  </form>  
                  
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
