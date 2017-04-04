@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="content">
        	
            <br/>
            <form action="{{ route('app.update') }}" method="POST" autocomplete="off">

            <!-- Panel #1 -->

            @if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>    

		            <li>Oops! Looks like you made a view mistakes.</li>
		        </ul>
		    </div>
			@endif
            
            <div class="panel panel-info">
                
                <div class="panel-heading">
                    <h1>Personal Information</h1>
                </div>

                <div class="panel-body">
                    
                    <!-- Row #1 -->

                    <div class="row">
                    	<div class="col-xs-3">
	                    	<div class="form-group label-floating @if ($errors->has('first_name')) has-error @elseif (old('first_name')) has-success @endif">
	                    	    <label class="control-label" for="first_name">First Name</label>
	                    	    <input type="hidden" name="external_id" value="{{ $patient->external_id }}"
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $patient->person->first_name) }}">
	                    	    @if ($errors->has('first_name'))
                                <p class="help-block">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
	                    </div>

                        <div class="col-xs-3">
                            <div class="form-group label-floating @if ($errors->has('preferred_name')) has-error @elseif (old('preferred_name')) has-success @endif">
                                <label class="control-label" for="preferred_name">Preferred Name</label>
                                <input type="text" class="form-control" name="preferred_name" value="{{ old('preferred_name', $patient->person->preferred_name) }}">
                                @if ($errors->has('preferred_name'))
                                <p class="help-block">{{ $errors->first('preferred_name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group label-floating @if ($errors->has('middle_name')) has-error @elseif (old('middle_name')) has-success @endif">
                                <label class="control-label" for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name', $patient->person->middle_name) }}">
                                @if ($errors->has('middle_name'))
                                <p class="help-block">{{ $errors->first('middle_name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group label-floating @if ($errors->has('last_name')) has-error @elseif (old('last_name')) has-success @endif">
                                <label class="control-label" for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $patient->person->last_name) }}">
                                @if ($errors->has('last_name'))
                                <p class="help-block">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <!-- Row #2 -->

                    <div class="row">
                        
                        <div class="col-xs-3">
                            <div class="form-group label-static @if ($errors->has('gender')) has-error @elseif (old('gender')) has-success @endif">
                                <label class="control-label" for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="">Select a gender</option>
                                    <option value="m" @if(old('gender', $patient->person->gender) == 'Male') selected @endif>Male</option>
                                    <option value="f" @if (old('gender', $patient->person->gender) == 'Female') selected @endif>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                <p class="help-block">{{ $errors->first('gender') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group label-static @if ($errors->has('date_of_birth')) has-error @elseif (old('date_of_birth')) has-success @endif">
                                <label class="control-label" for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $patient->person->date_of_birth) }}">
                                @if ($errors->has('date_of_birth'))
                                <p class="help-block">{{ $errors->first('date_of_birth') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-5">
                            <div class="form-group label-floating @if ($errors->has('social_security_number')) has-error @elseif (old('social_security_number')) has-success @endif">
                                <label class="control-label" for="social_security_number">Social Security Number</label>
                                <input type="text" class="form-control" name="social_security_number" value="{{ old('social_security_number', $patient->social_security_number) }}">
                                @if ($errors->has('social_security_number'))
                                <p class="help-block">{{ $errors->first('social_security_number') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>


                    <!-- Row #3 -->

                    <div class="row">

                        <div class="col-xs-12">
                            <div class="form-group label-floating @if ($errors->has('occupation')) has-error @elseif (old('occupation')) has-success @endif">
                                <label class="control-label" for="occupation">Occupation</label>
                                <input type="text" class="form-control" name="occupation" value="{{ old('occupation', $patient->occupation) }}">
                                @if ($errors->has('occupation'))
                                <p class="help-block">{{ $errors->first('social_security_number') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

            </div>



            <div class="panel panel-info">
                
                <div class="panel-heading">
                    <h1>Contact Information</h1>
                </div>

                <div class="panel-body">
                    
                    <!-- Row #1 -->

                    <div class="row">

                        <div class="col-xs-12">
                            <div class="form-group label-floating @if ($errors->has('email')) has-error @elseif (old('email')) has-success @endif">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $patient->person->email) }}">
                                @if ($errors->has('email'))
                                <p class="help-block">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                    
                    </div>


                    <!-- Row #2 -->

                    <div class="row">

                        <div class="col-xs-6">
                            <div class="form-group label-floating @if ($errors->has('line_1')) has-error @elseif (old('line_1')) has-success @endif">
                                <label class="control-label" for="line_1">Address</label>
                                <input type="text" class="form-control" name="line_1" value="{{ old('line_1', $patient->person->address->line_1) }}">
                                @if ($errors->has('line_1'))
                                <p class="help-block">{{ $errors->first('line_1') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group label-floating @if ($errors->has('line_2')) has-error @elseif (old('line_2')) has-success @endif">
                                <label class="control-label" for="line_2">Apt, Suite, etc.</label>
                                <input type="text" class="form-control" name="line_2" value="{{ old('line_2', $patient->person->address->line_2) }}">
                                @if ($errors->has('line_2'))
                                <p class="help-block">{{ $errors->first('line_2') }}</p>
                                @endif
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">

                        <div class="col-xs-3">
                            <div class="form-group label-floating @if ($errors->has('city')) has-error @elseif (old('city')) has-success @endif">
                                <label class="control-label" for="city">City</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city', $patient->person->address->city) }}">
                                @if ($errors->has('city'))
                                <p class="help-block">{{ $errors->first('city') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group label-static @if ($errors->has('state')) has-error @elseif (old('state')) has-success @endif">
                                <label class="control-label" for="state">State</label>
                                <select class="form-control" name="state">
                                    <option value="">Select a state</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}" @if(old('state', $patient->person->address->state->id) == $state->id) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state'))
                                <p class="help-block">{{ $errors->first('state') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group label-floating @if ($errors->has('zip_code')) has-error @elseif (old('zip_code')) has-success @endif">
                                <label class="control-label" for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code', $patient->person->address->zip_code) }}">
                                @if ($errors->has('zip_code'))
                                <p class="help-block">{{ $errors->first('zip_code') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group label-static @if ($errors->has('country')) has-error @elseif (old('country')) has-success @endif">
                                <label class="control-label" for="state">Country</label>
                                <select class="form-control" name="country">
                                    <option value="">Select a country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if(old('country', $patient->person->address->country->id) == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                <p class="help-block">{{ $errors->first('country') }}</p>
                                @endif
                            </div>
                        </div>


                    </div>

                    

                        @foreach ($patient->person->phones->sortBy('order') as $phone)

                               
                    <div class="row">
                        <div class="col-xs-4">

                            <div class="form-group label-floating @if ($errors->has('phones.'.$loop->index.'.number')) has-error @elseif (old('phones.'.$loop->index.'.number')) has-success @endif">
                                <label class="control-label" for="phones[{{ $loop->index }}][number]">Phone Number #{{ $loop->iteration }}</label>
                                <input type="phone" class="form-control" name="phones[{{ $loop->index }}][number]" value="{{ old('phones.'.$loop->index.'.number', $phone->number) }}">
                                <input type="hidden" class="form-control" name="phones[{{ $loop->index }}][order]" value="{{ $loop->iteration }}">
                                <input type="hidden" class="form-control" name="phones[{{ $loop->index }}][id]" value="{{ $phone->id }}">
                               
                                @if ($errors->has('phones.'.$loop->index.'.number'))
                                <p class="help-block">{{ $errors->first('phones.'.$loop->index.'.number') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="col-xs-2">

                            <div class="form-group label-static @if ($errors->has('phones.'.$loop->index.'.extension')) has-error @elseif (old('phones.'.$loop->index.'.extension')) has-success @endif">
                                <label class="control-label" for="phones[{{ $loop->index }}][extension]">Extension</label>
                                <input type="text" class="form-control" name="phones[{{ $loop->index }}][extension]" value="{{ old('phones.'.$loop->index.'.extension', $phone->extension) }}">
                                @if ($errors->has('phones.'.$loop->index.'.extension'))
                                <p class="help-block">{{ $errors->first('phones.'.$loop->index.'.extension') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="col-xs-3">

                            <div class="form-group label-static @if ($errors->has('phones.'.$loop->index.'.type')) has-error @elseif (old('phones.'.$loop->index.'.type')) has-success @endif">
                                <label class="control-label" for="phones[{{ $loop->index }}][type]">Type</label>
                                <select class="form-control" name="phones[{{ $loop->index }}][type]">
                                    <option value="">Select a type</option>
                                    @foreach ($phone_types as $type)
                                    <option value="{{ $type->id }}" @if(old('phones.'. $loop->parent->index .'.type', $phone->type_id) == $type->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('phones.'.$loop->index.'.type'))
                                <p class="help-block">{{ $errors->first('phones.'.$loop->index.'.type') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="col-xs-1">

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="phones[{{ $loop->index }}][sms_subscribed]" value="1" @if(old('phones.'. $loop->index .'.sms_subscribed', $phone->sms_subscribed)) checked @endif> Text reminders
                                    </label>

                                </div>
                            </div>

                        </div>

                                
                    </div>

                        @endforeach


            </div>


        </div>


        <div class="panel panel-info">
            
            <div class="panel-heading">
                <h1>Emergency Contact</h1>
            </div>

            <div class="panel-body">
                
                <!-- Row #1 -->
                @foreach ($patient->person->emergency_contacts as $emergency_contact)

        

            <div class="row">

                <div class="col-xs-4">
                    <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->index.'.first_name')) has-error @elseif (old('emergency_contacts.'.$loop->index.'.first_name')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->index }}][first_name]">First Name</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->index }}][first_name]" value="{{ old('emergency_contacts.'.$loop->index.'.first_name') }}">
                        <input type="hidden" class="form-control" name="emergency_contacts[{{ $loop->index }}][id]" value="{{ $emergency_contact->id }}">
                        @if ($errors->has('emergency_contacts.'.$loop->index.'.first_name'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->index.'.first_name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-xs-4">
                    <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->index.'.last_name')) has-error @elseif (old('emergency_contacts.'.$loop->index.'.last_name')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->index }}][last_name]">Last Name</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->index }}][last_name]" value="{{ old('emergency_contacts.'.$loop->index.'.last_name') }}">
                        @if ($errors->has('emergency_contacts.'.$loop->index.'.last_name'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->index.'.last_name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->index.'.type')) has-error @elseif (old('emergency_contacts.'.$loop->index.'.type')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->index }}][type]">Relationship</label>
                        <select class="form-control" name="emergency_contacts[{{ $loop->index }}][type]">
                            <option value="">Select a relationship</option>
                            @foreach ($relationship_types as $type)
                            <option value="{{ $type->id }}" @if(old('emergency_contacts.'. $loop->parent->index .'.type') == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('emergency_contacts.'.$loop->index.'.type'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->index.'.type') }}</p>
                        @endif
                    </div>
                </div>

            </div>

            @foreach ($emergency_contact->phones->sortBy('order') as $phone)

            <div class="row">

                <div class="col-xs-5">

                     <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number')) has-error @elseif (old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][number]">Phone Number #{{ $loop->iteration }}</label>
                        <input type="phone" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][number]" value="{{ old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number') }}">
                        <input type="hidden" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][order]" value="{{ $loop->iteration }}">
                        <input type="hidden" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][id]" value="{{ $phone->id }}">
                        @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number') }}</p>
                        @endif
                    </div>

                </div>

                <div class="col-xs-3">

                    <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.extension')) has-error @elseif (old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.extension')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][extension]">Extension</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][extension]" value="{{ old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.extension') }}">
                        @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.extension'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number') }}</p>
                        @endif
                    </div>

                </div>

                <div class="col-xs-3">

                    <div class="form-group @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.type')) has-error @elseif (old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.type')) has-success @endif">
                        <label class="control-label" for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][type]">Type</label>
                        <select class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][type]">
                            <option value="">Select a type</option>
                            @foreach ($phone_types as $type)
                            <option value="{{ $type->id }}" @if(old('emergency_contacts.'.$loop->parent->parent->index.'.phones.'.$loop->parent->index.'.type') == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.type'))
                        <p class="help-block">{{ $errors->first('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.type') }}</p>
                        @endif
                    </div>

                </div>

            </div>


            @endforeach
            




        @endforeach

            </div>

        </div>






    </div>

</div>



    


      

        

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <br/><br/>
                <button type="submit" class="btn btn-success btn-lg btn-block btn-raised">
                    <h4>Continue</h4>
                </button><br/><br/><br/>
            </div>
        </div>
    
    </form>

@endsection     