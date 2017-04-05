@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sections for "{{ $form->name }}"</div>

            <div class="panel-body">
		
				<a href="{{ route('staff.forms.sections.create', $form->id) }}" class="btn">Create</a>
				
					<ul>
	                @forelse ($sections as $section)
						<li><a href="{{ route('staff.forms.sections.show', [$form->id, $section->id]) }}">{{ $section->name }}<a/></li>
	                @empty
	                	<li>No Sections</li>
	                @endif
	               	</ul>
            </div>
        </div>
    </div>
</div>

@endsection
