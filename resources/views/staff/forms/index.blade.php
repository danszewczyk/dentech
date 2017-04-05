@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Forms</div>

            <div class="panel-body">
		
				<a href="{{ route('staff.forms.create') }}" class="btn">Create</a>
				
					<ul>
	                @forelse ($forms as $form)
						<li><a href="{{ route('staff.forms.show', $form->id) }}">{{ $form->name }}<a/></li>
	                @empty
	                	<li>No Forms</li>
	                @endif
	               	</ul>
            </div>
        </div>
    </div>
</div>

@endsection
