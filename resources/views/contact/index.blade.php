@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>

                <div class="panel-body">

                  <h2>Is this correct?</h2>



                  <h4>Address</h4>
                  <p>{{ $patient_info['patientAddress']['address1'] }}</p>
                  <p>{{ $patient_info['patientAddress']['address2'] }}</p>
                  <p>{{ $patient_info['patientAddress']['city'] }} {{ $patient_info['patientAddress']['state'] }} {{ $patient_info['patientAddress']['postalCode'] }}</p>

                  <h4>Email</h4>
                  <p>{{ $patient_info['primaryEmail']['address'] }}</p>

                  <h4>Phone</h4>
                  @foreach ($phones as $phone)

                  <p>{{ $phone['number'] }} | {{ $phone['type'] }} | {{ $phone['smsAuthorizationStatus'] or 'n/a' }}</p>

                  @endforeach

                  <a href=" {{ route($next_page, ['patient_id' => $patient_info['id']]) }}">Yes</a>
                  <a href="{{ action('ContactController@getEdit', ['patient_id' => $patient_info['id']]) }}">No</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
