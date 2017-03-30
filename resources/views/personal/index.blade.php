@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Personal Information</div>

                <div class="panel-body">

                  <h2>Is this correct?</h2>

                  <h4>Name</h4>
                  <p>{{ $patient_info['firstName'] }} {{ $patient_info['lastName'] }}</p>

                  <h4>Prefered Name</h4>
                  <p>{{ $patient_info['preferredName'] }}</p>

                  <h4>Gender</h4>
                  <p>{{ $patient_info['gender'] }}</p>

                  <a href="{{ route($next_page, ['patient_id' => $patient_info['id']]) }}">Yes</a>
                  <a href="{{ action('PersonalController@getEdit', ['patient_id' => $patient_info['id']]) }}">No</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
