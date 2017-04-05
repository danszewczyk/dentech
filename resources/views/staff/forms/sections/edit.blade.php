@extends('layouts.staff')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit "{{ $section->name }}"</div>

            <div class="panel-body">
               
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach

                <form action="{{ route('staff.forms.sections.update', [$form->id, $section->id]) }}" method="post">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $section->name) }}">
                    </div>   
    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $section->title) }}">
                    </div> 

                    <div class="form-group">
                        <label for="sub_heading">Sub-heading</label>
                        <input type="text" class="form-control" name="sub_heading" value="{{ old('sub_heading', $section->subheading) }}">
                    </div> 
                           
                    {{ method_field('PUT') }} 

                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-default">Save</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
