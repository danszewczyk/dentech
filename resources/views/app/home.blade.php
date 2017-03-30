@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <div class="jumbotron" style="margin-top:30px;">        
	            <h2 class="text-left">Hello there!</h2>
				<br/>
	            <h3>{{ $patient->person->display_name }},</h3><br/>
	            <p>Glad to see you back at our office! You might have noticed a few changes. 
	            Dental Facial Aesthetics is taking a step into the future and processing your information
	        	on tablets (like this one). </p>
	
				<br/>
	        	<a href="{{ route('app.edit') }}" class="btn btn-raised btn-primary btn-block">Tap here to get started</a>
	        </div>
	    </div>
	</div>
</div>

@endsection
