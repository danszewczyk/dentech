@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Personal Information</div>

                <div class="panel-body">

                  @include('errors.list')
                  
                  <form action="{{ route('postPersonal', ['patient_id' => $patient_info['id']]) }}" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                          <label class="control-label" for="first_name">First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $patient_info['firstName']) }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                          <label class="control-label" for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $patient_info['lastName']) }}">
                        </div>
                      </div>
                    </div>
                    
            
                     
                
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div> -->
                    
                 



                  

                  <br/>
                  
                  
                      
                     
                      


                     
                      <button type="submit" class="btn btn-default">Continue</button>
                      {{ csrf_field() }}
                  </form>  
                  
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
