@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <h1 class="text-center">Create new patient</h1>

    @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach

    <form action="{{ route('patients.store') }}" method="post">
        
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
        </div>

        <div class="form-group">
            <label for="preferred_name">Preferred Name</label>
            <input type="text" class="form-control" name="preferred_name" placeholder="Preferred Name" value="{{ old('preferred_name') }}">
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
        </div>

        <hr/>

        <div class="form-group">
            <label for="external_id">External ID</label>
            <input type="text" class="form-control" name="external_id" placeholder="External ID" value="{{ old('external_id') }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender">
                <option value="">Select a gender</option>
                <option value="m" @if(old('gender') == 'm') selected @endif>Male</option>
                <option value="f" @if (old('gender') == 'f') selected @endif>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" placeholder="00/00/0000" value="{{ old('date_of_birth') }}">
        </div>

        <div class="form-group">
            <label for="social_security_number">Social Security Number</label>
            <input type="text" class="form-control" name="social_security_number" placeholder="000-00-0000" value="{{ old('social_security_number') }}">
        </div>

        <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>

        <hr/>

        <div class="form-group">
            <label for="line_1">Address (Line 1)</label>
            <input type="text" class="form-control" name="line_1" value="{{ old('line_1') }}">
        </div>

        <div class="form-group">
            <label for="line_2">Address (Line 2)</label>
            <input type="text" class="form-control" name="line_2" value="{{ old('line_2') }}">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <select class="form-control" name="state">
                <option value="">Select a state</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" @if(old('state') == $state->id) selected @endif>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="zip_code">Zip Code</label>
            <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" name="country">
                <option value="">Select a country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->id }}" @if(old('country') == $country->id) selected @endif>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <hr/>

        @foreach (range(0,2) as $x)

        <div class="row">

            <div class="col-md-5">

                <div class="form-group">
                    <label for="phones[{{ $loop->index }}][number]">Phone Number #{{ $loop->iteration }}</label>
                    <input type="phone" class="form-control" name="phones[{{ $loop->index }}][number]" value="{{ old('phones.'.$loop->index.'.number') }}">
                    <input type="hidden" class="form-control" name="phones[{{ $loop->index }}][order]" value="{{ $loop->iteration }}">
                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">
                    <label for="phones[{{ $loop->index }}][extension]">Extension</label>
                    <input type="text" class="form-control" name="phones[{{ $loop->index }}][extension]" value="{{ old('phones.'.$loop->index.'.extension') }}">
                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">
                    <label for="phones[{{ $loop->index }}][type]">Type</label>
                    <select class="form-control" name="phones[{{ $loop->index }}][type]">
                        <option value="">Select a type</option>
                        @foreach ($phone_types as $type)
                        <option value="{{ $type->id }}" @if(old('phones.'. $loop->parent->index .'.type') == $type->id) selected @endif>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-1">

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="phones[{{ $loop->index }}][sms_subscribed]" value="1" @if(old('phones.'. $loop->index .'.sms_subscribed')) checked @endif> &nbsp;Subscribe
                        </label>
                    </div>
                </div>

            </div>

        </div>


        @endforeach

        <hr/>

        <h3>Emergency Contact</h3>

        @foreach (range(0,0) as $x)

  

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->index }}][first_name]">First Name</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->index }}][first_name]" placeholder="First Name" value="{{ old('emergency_contacts.'.$loop->index.'.first_name') }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->index }}][last_name]">Last Name</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->index }}][last_name]" placeholder="Last Name" value="{{ old('emergency_contacts.'.$loop->index.'.last_name') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->index }}][type]">Relationship</label>
                        <select class="form-control" name="emergency_contacts[{{ $loop->index }}][type]">
                            <option value="">Select a relationship</option>
                            @foreach ($relationship_types as $type)
                            <option value="{{ $type->id }}" @if(old('emergency_contacts.'. $loop->parent->index .'.type') == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            @foreach (range(0,1) as $x)

            <div class="row">

                <div class="col-md-5">

                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][number]">Phone Number #{{ $loop->iteration }}</label>
                        <input type="phone" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][number]" value="{{ old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.number') }}">
                        <input type="hidden" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][order]" value="{{ $loop->iteration }}">
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][extension]">Extension</label>
                        <input type="text" class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][extension]" value="{{ old('emergency_contacts.'.$loop->parent->index.'.phones.'.$loop->index.'.extension') }}">
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label for="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][type]">Type</label>
                        <select class="form-control" name="emergency_contacts[{{ $loop->parent->index }}][phones][{{ $loop->index }}][type]">
                            <option value="">Select a type</option>
                            @foreach ($phone_types as $type)
                            <option value="{{ $type->id }}" @if(old('emergency_contacts.'.$loop->parent->parent->index.'.phones.'.$loop->parent->index.'.type') == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>


            @endforeach
            




        @endforeach


        {{ csrf_field() }}

        <button type="submit" class="btn btn-default">Submit</button>
    
    </form>
</div>
</div>

@endsection     