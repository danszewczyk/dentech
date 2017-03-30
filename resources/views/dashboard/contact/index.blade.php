@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Contact Information</div>

                <div class="panel-body">                  

                  @include('errors.list')

                  <h3>Step 1</h3>
                  <br/>
                  <h4>Baisc Info</h4>

                  <h5>Name: {{ $profile_info['full_name'] }}</h5>

                  <h5>E-mail: {{ !is_null($profile_info['email']) ? $profile_info['email'] : 'n/a' }}</h5>

                  <br/>
                  <h4>Phone Number</h4>
                  @if ( !$profile_info['phones']->contains('type', 'MOBILE') )
                    <h5>Missing Mobile Number</h5>
                  @endif

                  @foreach ( $profile_info['phones'] as $phone )

                    @if (is_null($phone['number']))
                      @break
                    @endif

                  <h5>{{ $phone['type'] }} : {{ $phone['number'] }}</h5>

                  @endforeach

                  <br/>
                  <h4>Address</h4>

                  <h5>
                    {{ $profile_info['mailing_address']['address1'] }}<br/>
                    {{ $profile_info['mailing_address']['address2'] }}<br/>
                    {{ $profile_info['mailing_address']['city'] }}, {{ $profile_info['mailing_address']['state'] }} {{ $profile_info['mailing_address']['postalCode'] }}
                  </h5>

                  <br/>
                  <form action="{{ route('postContact', ['patient_id' => $profile_info['id']]) }}" method="post">
                  
                      <input name="first_name" type="hidden" value="{{ $profile_info['first_name'] }}" />
                      <input name="last_name" type="hidden" value="{{ $profile_info['last_name'] }}" />
                      <input name="email" type="hidden" value="{{ $profile_info['email'] }}" />

                      @foreach ( $profile_info['phones'] as $phone )

                      <input name="phone[{{ $loop->index }}][type]" type="hidden" value="{{ $phone['type'] }}" />
                      <input name="phone[{{ $loop->index }}][number]" type="hidden" value="{{ $phone['number'] }}" />
                      <input name="phone[{{ $loop->index }}][sequence]" type="hidden" value="{{ $loop->iteration }}" />

                      @endforeach


                      <input name="address1" type="hidden" value="{{ $profile_info['mailing_address']['address1'] }}" />
                      <input name="address2" type="hidden" value="{{ $profile_info['mailing_address']['address2'] }}" />
                      <input name="city" type="hidden" value="{{ $profile_info['mailing_address']['city'] }}" />
                      <input name="state" type="hidden" value="{{ $profile_info['mailing_address']['state'] }}" />
                      <input name="postalCode" type="hidden" value="{{ $profile_info['mailing_address']['postalCode'] }}" />
                    
                      <a href="{{ route('editContact', ['patient_id' => $profile_info['id']]) }}">Edit</a>
                      <button type="submit">Continue</button>
                      {{ csrf_field() }}
                  </form>  



                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
