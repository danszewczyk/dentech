@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Personal Information</div>

                <div class="panel-body">

                  Hey {{ $patient_info['firstName'] }}, <br/>
                  Let's update our personal info!
                  <br/>
                  <a href="{{ action('PersonalController@index', ['patient_id' => $patient_info['id']]) }}">Continue</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
