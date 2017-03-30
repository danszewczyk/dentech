@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>

                <div class="panel-body">

                  @include('errors.list')
                  
                  <form action="{{ route('postContact', ['patient_id' => $profile_info['id']]) }}" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                          <label class="control-label" for="first_name">First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $profile_info['first_name']) }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                          <label class="control-label" for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $profile_info['last_name']) }}">
                        </div>
                      </div>
                    </div>
                    
                   
                      <div class="form-group @if ($errors->has('email')) has-error @endif">
                        <label class="control-label" for="email">E-mail address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $profile_info['email']) }}">
                      </div>

                      <div class="form-group @if ($errors->has('address1')) has-error @endif">
                        <label class="control-label" for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $profile_info['mailing_address']['address1']) }}" placeholder="Mailing Address">
                      </div>

                      <div class="form-group @if ($errors->has('address2')) has-error @endif">
                        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $profile_info['mailing_address']['address2']) }}" placeholder="Apt #, Suite, etc.">
                      </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                          <label class="control-label" for="first_name">City</label>
                          <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $profile_info['mailing_address']['city']) }}">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group @if ($errors->has('state')) has-error @endif">
                          <label class="control-label" for="first_name">State</label>
                          <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $profile_info['mailing_address']['state']) }}">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group @if ($errors->has('postalCode')) has-error @endif">
                          <label class="control-label" for="first_name">Zip</label>
                          <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{ old('postalCode', $profile_info['mailing_address']['postalCode']) }}">
                        </div>
                      </div>

                    </div>

                    @foreach ( $profile_info['phones'] as $phone )

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group @if ($errors->has('phone.'.$loop->index.'.number')) has-error @endif">
                          <label class="control-label" for="phone_{{ $loop->iteration }}_number">Phone number</label>
                          <input type="text" class="form-control" id="phone_{{ $loop->iteration }}_number" name="phone[{{ $loop->index }}][number]" value="{{ old('phone.'.$loop->index.'.number', $phone['number']) }}">
                        </div>
                      </div>
                      <div class="col-md-3">
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
                    </div>

                    @endforeach
                     
                
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div> -->
                    
                 



                  

                  <br/>
                  
                  
                      
                     
                      


                      @foreach ( $profile_info['phones'] as $phone )

                     
                      
                      <input name="phone[{{ $loop->index }}][sequence]" type="hidden" value="{{ $loop->iteration }}" /><br/>
 
                      @endforeach

                      <button>Edit</button>
                      <button type="submit" class="btn btn-default">Continue</button>
                      {{ csrf_field() }}
                  </form>  
                  
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
