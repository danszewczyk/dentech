@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>Appointment Time</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>  
                      <tbody>
                        @foreach ($todays_patients as $patient)
                        <tr>
                          <td><a href="{{ action('PatientController@index', ['patient_id' => $patient['id']]) }}">{{ $patient['id'] }}</a></td>
                          <td>{{ $patient['patient_info']['full_name'] }}</td>
                          <td>{{ $patient['appointment_time'] }}</td>
                          <td>{{ $patient['patient_info']['email'] or 'n/a' }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
