@extends('layouts.default')

@section('content')
	<h1>Show a patient</h1>

	<h2>{{ $patient->person->first_name }} ({{ $patient->person->preferred_name }}) {{ $patient->person->middle_name }} {{ $patient->person->last_name }}</h2>

	<h3>Patient Details</h3>
	<ul>
		<li>Gender: {{ $patient->person->gender }}</li>
		<li>D.O.B: {{ $patient->person->date_of_birth }}</li>
		<li>External ID: {{ $patient->external_id }}</li>
		<li>Occupation: {{ $patient->occupation }}</li>
		<li>S.S.N: {{ $patient->social_security_number }}</li>

		<h4>Attributes</h4>
		
		@foreach ($patient->attributes as $attribute)
		<p style="size:14px">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
		
		@endforeach

		<h4>Emergency Contacts</h4>

		@foreach ($patient->person->emergency_contacts as $contact)

		{{ $contact->first_name }} {{ $contact->last_name }} <br/>

			@foreach($contact->phones as $phone)
			{{ $phone->number }} {{ $phone->type->name }}<br/>
			@endforeach

		@endforeach
	</ul>
	
	<h3>Address</h3>
	{{ $patient->person->address->line_1 }} <br/>
	{{ $patient->person->address->line_2 }} <br/>
	{{ $patient->person->address->city }}, {{ $patient->person->address->state }} {{ $patient->person->address->zip_code }}
@endsection
