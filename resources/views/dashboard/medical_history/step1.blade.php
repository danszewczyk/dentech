@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Allergies</div>

                <div class="panel-body">

                  
                  
                  <form action="{{ route('postMedical', ['patient_id' => $profile_info['id']]) }}" method="post">

                    <h4>Are you allergic to or have had a reaction to:</h4>

                    @include('errors.list')

                    <div class="row">
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_01" name="allergy_01" value="yes"> Local Anesthetics
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_02" name="allergy_02" value="yes"> Aspirin
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_03" name="allergy_03" value="yes"> Penicillin or other antibiotics
                        </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_04" name="allergy_04" value="yes"> Barbiturates, sedatives, or sleeping pills
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_05" name="allergy_05" value="yes"> Sulfa drugs
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_06" name="allergy_06" value="yes"> Codeine or other narcotics
                        </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_07" name="allergy_07" value="yes"> Metals
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_08" name="allergy_08" value="yes"> Latex (rubber)
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_09" name="allergy_09" value="yes"> Iodine
                        </label>
                      </div>
                    </div>

                  

                    <div class="row">
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_10" name="allergy_10" value="yes"> Hay fever/seasonal
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_11" name="allergy_11" value="yes"> Animals
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_12" name="allergy_12" value="yes"> Food
                        </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_13" name="allergy_13" value="yes"> Other
                        </label>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-inline @if ($errors->has('allergy_other')) has-error @endif">
                          <label class="control-label" for="allergy_other"></label>
                          <input type="text" class="form-control" id="allergy_other" name="allergy_other" placeholder="Other">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="allergy_14" name="allergy_14" value="yes"> None
                        </label>
                      </div>
                    </div>

<div class="row">
  <div class="col-md-12">
    <button type="submit" class="btn btn-default pull-right">Continue</button>
  </div>
</div>



                      {{ csrf_field() }}
    
                      </form>
                  



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   