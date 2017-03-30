@extends('layouts.default')

@section('content')

<h1>Attributes for {{ $patient->person->first_name }} {{ $patient->person->last_name }}</h1>
<ul>
@foreach ($patient->attributes->sortBy('created_at') as $attribute)
	<li><strong>{{ $attribute->name }}</strong>: {{ $attribute->pivot->value }} - <i>{{ $attribute->pivot->created_at }}</i></li>
@endforeach
</ul>
@endsection