@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dental Information</div>

                <div class="panel-body">

                  @include('errors.list')
                  
                  <form action="{{ route('postDental', ['patient_id' => $patient_info['id'], 'step' => $current_step]) }}" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-01"> My gums bleed when I brush or floss
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-02"> I have earaches or neck pain
                          </label>
                        </div>
                      </div> 
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-03"> My teeth are sensitive to cold, hot, sweets, or pressure
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-04"> I have clicking, popping, or discomfort in my jaw
                          </label>
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-05"> My mouth is dry
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-06"> I brux or grind my teeth
                          </label>
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-07"> I have had periodontal (gum) treatments
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-08"> I have sores or ulcers in my mouth
                          </label>
                        </div>
                      </div> 
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-09"> I have had othodontic (braces) treatment
                          </label>
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
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="dental-page-01-question-11"> I have had problems associated with previous dental treatment
                          </label>
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
