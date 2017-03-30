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
                      <div class="col-md-12">
                        <h2>Rate your smile!</h2>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-1">
                        
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="1"> 1
                          </label>
                        </div>
                      </div> 
                      <div class="col-md-1">
                        <div class="checkbox">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="2"> 2
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="3"> 3
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="4"> 4
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="5"> 5
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="6"> 6
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="7"> 7
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="8"> 8
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="9"> 9
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="dental-page-02-rate" value="10"> 10
                          </label>
                        </div>
                      </div> 

                      <div class="col-md-1">
                        
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
