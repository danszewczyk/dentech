@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Attribute Addition Page</div>

                <div class="panel-body">

                  <form method="post">
                      
                      <h5>Name</h5>         
                      <input type="text" name="name"/><br/> 

                      <h5>Slug</h5>         
                      <input type="text" name="slug"/><br/>

                      <h5>Rules</h5>         
                      <input type="text" name="rules" value="nullable"/> <br/>  

                      <h5>Order</h5>         
                      <input type="text" name="order" value="{{ $record_attributes->first()->order + 1 }}"/> <br/>              
                        
                      <h5>Type</h5>
                      <select name="type_id">
                        @foreach($attribute_types as $attribute_type)
                        <option value="{{ $attribute_type->id }}">{{ $attribute_type->name }}</option>
                        @endforeach
                      </select><br/>

                      <h5>Record</h5>
                      <select name="record_id">
                        @foreach($records as $record)
                        <option value="{{ $record->id }}">{{ $record->name }}</option>
                        @endforeach
                      </select><br/>

                      <br/><br/>
                      <button type="submit" class="btn btn-default">Save</button>
                      {{ csrf_field() }}
                  </form>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">List of Attributes</div>

                <div class="panel-body">

                  @foreach($record_attributes as $record_attribute)
                  <h4>{{ $record_attribute->name }}</h4>
                  <small>{{ $record_attribute->type->name }} - {{ $record_attribute->record->name }} - /{{ $record_attribute->slug }} - {{ $record_attribute->order }} <br/> {{ $record_attribute->rules }}</small>
                  <hr/>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
