@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Medical Information</div>

                <div class="panel-body">

                  @include('errors.list')
                  
                  <form action="{{ route('postMedical', ['patient_id' => $patient_info['id'], 'step' => $current_step]) }}" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="medical-page-01-question-01"> I am under care of a physician
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-02"> I have had a serious illness, operation, or been hospitalized in the past 5 years
                          </label>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('physician_name')) has-error @endif">
                          <label class="control-label" for="last_name">Physician Name</label>
                          <input type="text" class="form-control" id="physician_name" name="physician_name" value="{{ old('physician_name') }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('physician_name')) has-error @endif">
                          <label class="control-label" for="last_name">Indicate the illness or problem</label>
                          <input type="text" class="form-control" id="physician_name" name="physician_name" value="{{ old('physician_name') }}">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('physician_phone')) has-error @endif">
                          <label class="control-label" for="physician_phone">Physician Phone</label>
                          <input type="text" class="form-control" id="physician_phone" name="physician_phone" value="{{ old('physician_phone') }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-06"> I am taking/have recently taken precription or over the counter medicines
                          </label>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-07"> There have been significant changes to my general health in the past year
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('physician_name')) has-error @endif">
                          <label class="control-label" for="last_name">Indicate medications (including vitamins, natural or herbal preparations, and/or dietary supplements)</label>
                          <input type="text" class="form-control" id="physician_name" name="physician_name" value="{{ old('physician_name') }}">
                        </div>
                      </div> 
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group @if ($errors->has('physician_phone')) has-error @endif">
                          <label class="control-label" for="physician_phone">Condition Being Treated</label>
                          <input type="text" class="form-control" id="physician_phone" name="physician_phone" value="{{ old('physician_phone') }}">
                        </div>
            
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-10"> I wear dentures or partials
                          </label>
                        </div>
                      </div> 
                    </div>
            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @if ($errors->has('physician_phone')) has-error @endif">
                          <label class="control-label" for="physician_phone">Date of last physical exam</label>
                          <input type="text" class="form-control" id="physician_phone" name="physician_phone" value="{{ old('physician_phone') }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-12"> I participate in active recreational activities
                          </label>
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-13"> My home water supply is flouridated
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-14"> I have had a serious injury to my head or mouth
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-15"> I drink bottled/filtered water
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        
                      </div> 
                    </div>
                    
                     
                
                    
                    
                 



                  

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
