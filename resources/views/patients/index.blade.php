@extends('layouts.staff')

@section('content')

	<h2>Patients</h2>
	
	<a href="{{ route('patients.create') }}" class="btn btn-default">Add Patient</a>	

		

	

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif



	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Patient</th>
	            <th>Contact</th>
	            <th>Date of Birth</th>
	            <th>Updated at</th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($patients as $key => $patient)
	        <tr>
	            <td>
	            	<h4><a href="{{ route('patients.show', $patient->id) }}">{{ $patient->person->full_name }}</a></h4>
					<p>{{ $patient->person->gender }}</p>
					<p>{{ $patient->person->formated_date_of_birth }} ({{ $patient->person->age }})</p>
	            </td>
	            <td>
	            	@foreach ($patient->person->phones as $phone)
					<p>{{ $phone->type->name }}: {{ $phone->number }}</p>
					@endforeach
					<p>Email: {{ $patient->person->email }}</p>
	            </td>
	            <td>{{ $patient->person->formated_date_of_birth }} ({{ $patient->person->age }} years old)</td>
				<td>{{ $patient->updated_at }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
	                <a class="btn btn-small btn-success btn-block" href="{{ route('patients.login', $patient->id) }}">Log in</a><br/>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
	                <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('patients/' . $patient->id . '') }}">View</a><br/>

	                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
	                <a class="btn btn-small btn-info btn-block" href="{{ URL::to('patients/' . $patient->id . '/edit') }}">Edit</a><br/>

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<form action="{{ route('patients.destroy', [$patient->id]) }}" method="POST">

						<input type="submit" class="btn btn-danger btn-block" value="Delete" />

						{{ method_field('DELETE') }}
						{{ csrf_field() }}

					</form>

	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection