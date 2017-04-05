@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $form->name }} / {{ $section->name }} </div>

            <div class="panel-body">
		
				<p>Name: {{ $section->name }}</p>
				<p>Title: {{ $section->title }}</p>
                <p>Sub-heading: {{ $section->sub_heading }}</p>
				
            </div>

            <div class="panel-footer">
	
				<a href="{{ route('staff.forms.sections.edit', [$form->id, $section->id]) }}" class="btn btn-warning btn-block">Edit</a> <br/>

            	<form action="{{ route('staff.forms.sections.destroy', [$form->id, $section->id]) }}" method="POST">

            		<input type="submit" class="btn btn-danger btn-block" value="Delete" />

            		{{ method_field('DELETE') }}
            		{{ csrf_field() }}

            	</form>
            </div>
        </div>
    </div>
</div>

@endsection
