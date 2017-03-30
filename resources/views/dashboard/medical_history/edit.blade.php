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
                        <div class="form-group form-inline @if ($errors->has('allergy_other')) has-error @endif">
                          <label class="control-label" for="allergy_other">Other </label>
                          <input type="text" class="form-control" id="allergy_other" name="allergy_other">
                        </div>
                      </div>
                    </div>

                   
                    
                   
                      

        
                      
                      



<h4>Dental Information</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-2-1" class="col-md-9 control-label" style="text-align:left">Do your gums bleed when you brush or floss?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-1" id="radio-choice-page-2-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-1" id="radio-choice-page-2-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-2-2" class="col-md-9 control-label" style="text-align:left">Are your teeth sensitive to cold, hot, sweets, or pressure?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-2" id="radio-choice-page-2-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-2" id="radio-choice-page-2-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-2-3" class="col-md-9 control-label" style="text-align:left">Does food or floss catch between your teeth?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-3" id="radio-choice-page-2-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-3" id="radio-choice-page-2-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-2-4" class="col-md-9 control-label" style="text-align:left">Is your mouth dry?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-4" id="radio-choice-page-2-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-4" id="radio-choice-page-2-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-2-5" class="col-md-9 control-label" style="text-align:left">Have you had any periodontal (gum) treatments?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-5" id="radio-choice-page-2-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-5" id="radio-choice-page-2-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-2-6" class="col-md-9 control-label" style="text-align:left">Have you ever had any problems associated with previous dental treatment?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-6" id="radio-choice-page-2-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-6" id="radio-choice-page-2-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-2-7" class="col-md-9 control-label" style="text-align:left">Do you drink bottled or filtered water?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-7" id="radio-choice-page-2-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-7" id="radio-choice-page-2-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-2-8" class="col-md-9 control-label" style="text-align:left">Are you currently experiencing dental pain or discomfort?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-8" id="radio-choice-page-2-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-2-8" id="radio-choice-page-2-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
</div>







<br/>
<h4>Medical Information (1 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-3-1" class="col-md-9 control-label" style="text-align:left">Do you use contolled substances (drugs)?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-1" id="radio-choice-page-3-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-1" id="radio-choice-page-3-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-3-2" class="col-md-9 control-label" style="text-align:left">Do you use tobacco (smoking, snuff, chew, bids)</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-2" id="radio-choice-page-3-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-2" id="radio-choice-page-3-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-3-3" class="col-md-9 control-label" style="text-align:left">Do you wear contact lenses?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-3" id="radio-choice-page-3-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-3" id="radio-choice-page-3-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-3-4" class="col-md-9 control-label" style="text-align:left">Do you drink alcoholic beverages?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-4" id="radio-choice-page-3-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-4" id="radio-choice-page-3-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-3-5" class="col-md-9 control-label" style="text-align:left">Have you had an orthepedic total joint (hip, knee, elbow, finger) replacement?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-5" id="radio-choice-page-3-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-5" id="radio-choice-page-3-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-3-6" class="col-md-9 control-label" style="text-align:left">Are you taking or scheduled to begin taking either of the medications alendronate (Fosamax<sup>&reg;</sup>) or risedronate (Actonel<sup>&reg;</sup>) for osteoporosis or Paget's disease?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-6" id="radio-choice-page-3-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-6" id="radio-choice-page-3-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-3-7" class="col-md-9 control-label" style="text-align:left">Since 2001, were you treated or are your presently scheduled to begin treatment with the intravenous bisphosphonates (Aredia<sup>&reg;</sup> or Zometa<sup>&reg;</sup>) for bone pain, hypercalcemia or skeletal complications resulting from Paget's disease, multiple myeloma or metastatic cancer?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-7" id="radio-choice-page-3-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-3-7" id="radio-choice-page-3-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>





<br/>
<h4>Medical Information (2 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-4-1" class="col-md-9 control-label" style="text-align:left">Do you have earaches or neck pains?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-1" id="radio-choice-page-4-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-1" id="radio-choice-page-4-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-4-2" class="col-md-9 control-label" style="text-align:left">Do you have any clicking, popping, or discomfort in the jaw?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-2" id="radio-choice-page-4-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-2" id="radio-choice-page-4-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-4-3" class="col-md-9 control-label" style="text-align:left">Do you brux or grind your teeth?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-3" id="radio-choice-page-4-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-3" id="radio-choice-page-4-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-4-4" class="col-md-9 control-label" style="text-align:left">Do you have sores or ulcers in your mouth?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-4" id="radio-choice-page-4-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-4" id="radio-choice-page-4-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-4-5" class="col-md-9 control-label" style="text-align:left">Do you wear dentures or partials?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-5" id="radio-choice-page-4-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-5" id="radio-choice-page-4-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-4-6" class="col-md-9 control-label" style="text-align:left">Do you participate in active recreational activities?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-6" id="radio-choice-page-4-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-6" id="radio-choice-page-4-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-4-7" class="col-md-9 control-label" style="text-align:left">Have you ever had a serious injury to your head or mouth?</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-7" id="radio-choice-page-4-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-4-7" id="radio-choice-page-4-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>





<br/>
<h4>Medical Information (3 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-5-1" class="col-md-9 control-label" style="text-align:left">Artificial (prosthetic) heart valvue</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-1" id="radio-choice-page-5-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-1" id="radio-choice-page-5-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-5-2" class="col-md-9 control-label" style="text-align:left">Previous infective endocarditis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-2" id="radio-choice-page-5-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-2" id="radio-choice-page-5-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-5-3" class="col-md-9 control-label" style="text-align:left">Damaged valves in transplanted heart</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-3" id="radio-choice-page-5-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-3" id="radio-choice-page-5-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-5-4" class="col-md-9 control-label" style="text-align:left">Congenital heart disease (CHD)</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-4" id="radio-choice-page-5-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-4" id="radio-choice-page-5-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-5-5" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unrepaired, cyanotic CHD</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-5" id="radio-choice-page-5-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-5" id="radio-choice-page-5-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-5-6" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Repaired (completely in last 6 months)</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-6" id="radio-choice-page-5-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-6" id="radio-choice-page-5-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-5-7" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Repaired CHD with residual defects</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-7" id="radio-choice-page-5-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-7" id="radio-choice-page-5-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-5-8" class="col-md-9 control-label" style="text-align:left">Active Tuberculosis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-8" id="radio-choice-page-5-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-8" id="radio-choice-page-5-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-5-9" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Persistant cough greater than a 3 week duration</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-9" id="radio-choice-page-5-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-9" id="radio-choice-page-5-9-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-5-10" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cough that produces blood</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-10" id="radio-choice-page-5-10-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-10" id="radio-choice-page-5-10-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-5-11" class="col-md-9 control-label" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Been exposed to anyone with tuberculosis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-11" id="radio-choice-page-5-11-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-5-11" id="radio-choice-page-5-11-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>





<br/>
<h4>Medical Information (4 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-6-1" class="col-md-9 control-label" style="text-align:left">Cardiovascular disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-1" id="radio-choice-page-6-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-1" id="radio-choice-page-6-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-6-2" class="col-md-9 control-label" style="text-align:left">Angina</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-2" id="radio-choice-page-6-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-2" id="radio-choice-page-6-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-6-3" class="col-md-9 control-label" style="text-align:left">Arteriosclerosis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-3" id="radio-choice-page-6-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-3" id="radio-choice-page-6-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-6-4" class="col-md-9 control-label" style="text-align:left">Congestive heart failure</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-4" id="radio-choice-page-6-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-4" id="radio-choice-page-6-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-6-5" class="col-md-9 control-label" style="text-align:left">Damaged heart valves</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-5" id="radio-choice-page-6-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-5" id="radio-choice-page-6-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-6-6" class="col-md-9 control-label" style="text-align:left">Heart attack</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-6" id="radio-choice-page-6-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-6" id="radio-choice-page-6-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-7" class="col-md-9 control-label" style="text-align:left">Heart murmur</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-7" id="radio-choice-page-6-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-7" id="radio-choice-page-6-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-8" class="col-md-9 control-label" style="text-align:left">Low blood pressure</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-8" id="radio-choice-page-6-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-8" id="radio-choice-page-6-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-9" class="col-md-9 control-label" style="text-align:left">High blood pressure</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-9" id="radio-choice-page-6-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-9" id="radio-choice-page-6-9-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-10" class="col-md-9 control-label" style="text-align:left">Other congenital heart defects</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-10" id="radio-choice-page-6-10-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-10" id="radio-choice-page-6-10-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-11" class="col-md-9 control-label" style="text-align:left">Mitral valve prolapse</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-11" id="radio-choice-page-6-11-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-11" id="radio-choice-page-6-11-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-6-12" class="col-md-9 control-label" style="text-align:left">Pacemaker</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-12" id="radio-choice-page-6-12-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-6-12" id="radio-choice-page-6-12-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>








<br/>
<h4>Medical Information (5 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-7-1" class="col-md-9 control-label" style="text-align:left">Rheumatic fever</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-1" id="radio-choice-page-7-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-1" id="radio-choice-page-7-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-7-2" class="col-md-9 control-label" style="text-align:left">Rheumatic heart disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-2" id="radio-choice-page-7-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-2" id="radio-choice-page-7-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-7-3" class="col-md-9 control-label" style="text-align:left">Abnormal bleeding</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-3" id="radio-choice-page-7-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-3" id="radio-choice-page-7-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-7-4" class="col-md-9 control-label" style="text-align:left">Anemia</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-4" id="radio-choice-page-7-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-4" id="radio-choice-page-7-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-7-5" class="col-md-9 control-label" style="text-align:left">Blood transfusion</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-5" id="radio-choice-page-7-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-5" id="radio-choice-page-7-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-7-6" class="col-md-9 control-label" style="text-align:left">Hemophilia</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-6" id="radio-choice-page-7-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-6" id="radio-choice-page-7-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-7-7" class="col-md-9 control-label" style="text-align:left">AIDS or HIV infection</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-7" id="radio-choice-page-7-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-7" id="radio-choice-page-7-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-7-8" class="col-md-9 control-label" style="text-align:left">Arthritis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-8" id="radio-choice-page-7-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-8" id="radio-choice-page-7-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-7-9" class="col-md-9 control-label" style="text-align:left">Autoimmune disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-9" id="radio-choice-page-7-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-9" id="radio-choice-page-7-9-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-7-10" class="col-md-9 control-label" style="text-align:left">Rheumatoid arthritis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-10" id="radio-choice-page-7-10-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-10" id="radio-choice-page-7-10-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-7-11" class="col-md-9 control-label" style="text-align:left">Systemic lupus erythematosus</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-11" id="radio-choice-page-7-11-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-7-11" id="radio-choice-page-7-11-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>




<br/>
<h4>Medical Information (6 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-8-1" class="col-md-9 control-label" style="text-align:left">Asthma</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-1" id="radio-choice-page-8-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-1" id="radio-choice-page-8-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-8-2" class="col-md-9 control-label" style="text-align:left">Bronchitis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-2" id="radio-choice-page-8-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-2" id="radio-choice-page-8-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-8-3" class="col-md-9 control-label" style="text-align:left">Emphysema</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-3" id="radio-choice-page-8-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-3" id="radio-choice-page-8-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-8-4" class="col-md-9 control-label" style="text-align:left">Sinus trouble</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-4" id="radio-choice-page-8-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-4" id="radio-choice-page-8-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-8-5" class="col-md-9 control-label" style="text-align:left">Tuberculosis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-5" id="radio-choice-page-8-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-5" id="radio-choice-page-8-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-8-6" class="col-md-9 control-label" style="text-align:left">Cancer/Chemotherapy/Radiation Treatment</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-6" id="radio-choice-page-8-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-6" id="radio-choice-page-8-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-7" class="col-md-9 control-label" style="text-align:left">Chest pain upon exertion</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-7" id="radio-choice-page-8-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-7" id="radio-choice-page-8-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-8" class="col-md-9 control-label" style="text-align:left">Chronic pain</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-8" id="radio-choice-page-8-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-8" id="radio-choice-page-8-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-9" class="col-md-9 control-label" style="text-align:left">Diabetes Type I or II</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-9" id="radio-choice-page-8-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-9" id="radio-choice-page-8-9-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-10" class="col-md-9 control-label" style="text-align:left">Eating disorder</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-10" id="radio-choice-page-8-10-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-10" id="radio-choice-page-8-10-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-11" class="col-md-9 control-label" style="text-align:left">Malnutrition</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-11" id="radio-choice-page-8-11-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-11" id="radio-choice-page-8-11-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-8-12" class="col-md-9 control-label" style="text-align:left">Gastrointestinal disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-12" id="radio-choice-page-8-12-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-8-12" id="radio-choice-page-8-12-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>






<br/>
<h4>Medical Information (7 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-9-1" class="col-md-9 control-label" style="text-align:left">G.E. Reflux/persistent heartburn</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-1" id="radio-choice-page-9-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-1" id="radio-choice-page-9-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-9-2" class="col-md-9 control-label" style="text-align:left">Ulcers</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-2" id="radio-choice-page-9-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-2" id="radio-choice-page-9-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-9-3" class="col-md-9 control-label" style="text-align:left">Thyroid problems</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-3" id="radio-choice-page-9-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-3" id="radio-choice-page-9-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-9-4" class="col-md-9 control-label" style="text-align:left">Stroke</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-4" id="radio-choice-page-9-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-4" id="radio-choice-page-9-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-9-5" class="col-md-9 control-label" style="text-align:left">Glaucoma</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-5" id="radio-choice-page-9-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-5" id="radio-choice-page-9-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-9-6" class="col-md-9 control-label" style="text-align:left">Hepatitis, jaundice, or liver disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-6" id="radio-choice-page-9-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-6" id="radio-choice-page-9-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-9-7" class="col-md-9 control-label" style="text-align:left">Epilepsy</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-7" id="radio-choice-page-9-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-7" id="radio-choice-page-9-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-9-8" class="col-md-9 control-label" style="text-align:left">Fainting spells or seizures</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-8" id="radio-choice-page-9-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-8" id="radio-choice-page-9-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-9-9" class="col-md-9 control-label" style="text-align:left">Neurological disorders</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-9" id="radio-choice-page-9-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-9" id="radio-choice-page-9-9-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-9-10" class="col-md-9 control-label" style="text-align:left">Sleep disorder</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-10" id="radio-choice-page-9-10-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-10" id="radio-choice-page-9-10-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-9-11" class="col-md-9 control-label" style="text-align:left">Mental health disorders</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-11" id="radio-choice-page-9-11-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-9-11" id="radio-choice-page-9-11-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->

</div>



<br/>
<h4>Medical Information (8 of 8)</h4>

@include('errors.list')

<div class="form-horizontal">

<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-10-1" class="col-md-9 control-label" style="text-align:left">Recurrent infections</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-1" id="radio-choice-page-10-1-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-1" id="radio-choice-page-10-1-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-10-2" class="col-md-9 control-label" style="text-align:left">Kidney problems</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-2" id="radio-choice-page-10-2-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-2" id="radio-choice-page-10-2-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
  <div class="form-group">
    <label for="radio-choice-page-10-3" class="col-md-9 control-label" style="text-align:left">Night sweats</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-3" id="radio-choice-page-10-3-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-3" id="radio-choice-page-10-3-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-10-4" class="col-md-9 control-label" style="text-align:left">Osteoporosis</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-4" id="radio-choice-page-10-4-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-4" id="radio-choice-page-10-4-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-10-5" class="col-md-9 control-label" style="text-align:left">Persistent swollen glands in neck</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-5" id="radio-choice-page-10-5-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-5" id="radio-choice-page-10-5-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
 <div class="form-group">
    <label for="radio-choice-page-10-6" class="col-md-9 control-label" style="text-align:left">Severe headaches/migraines</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-6" id="radio-choice-page-10-6-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-6" id="radio-choice-page-10-6-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-10-7" class="col-md-9 control-label" style="text-align:left">Severe or rapid weight loss</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-7" id="radio-choice-page-10-7-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-7" id="radio-choice-page-10-7-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-10-8" class="col-md-9 control-label" style="text-align:left">Sexually transmitted disease</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-8" id="radio-choice-page-10-8-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-8" id="radio-choice-page-10-8-2" value="no"> No
      </label>
    </div>
  </div>
<!--  //////////////////////////////////////////////////////////////  -->
<div class="form-group">
    <label for="radio-choice-page-10-9" class="col-md-9 control-label" style="text-align:left">Excessive urination</label>
    <div class="col-md-3">
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-9" id="radio-choice-page-10-9-1" value="yes"> Yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio-choice-page-10-9" id="radio-choice-page-10-9-2" value="no"> No
      </label>
    </div>
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
