@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit "{{ $form->name }}"</div>

            <div class="panel-body">
               
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach

                <form action="{{ route('staff.forms.update', $form->id) }}" method="post">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $form->name) }}">
                    </div>   

                    <div class="form-group">
                        <label for="instructions">Instructions:</label>
                        <textarea class="form-control" rows="5" name="instructions">{{ old('instructions', $form->instructions) }}</textarea>
                    </div>           

                    {{ method_field('PUT') }} 
        
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-default">Edit</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
