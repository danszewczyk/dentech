@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add a Form</div>

            <div class="panel-body">
               
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach

                <form action="{{ route('staff.forms.store') }}" method="post">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>   

                    <div class="form-group">
                        <label for="instructions">Instructions:</label>
                        <textarea class="form-control" rows="5" name="instructions">{{ old('instructions') }}</textarea>
                    </div>           
        
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-default">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
