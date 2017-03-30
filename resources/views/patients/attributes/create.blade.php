@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2"><br/>

          <form method="post" action="{{ route('patients.attributes.store', [$patient->id]) }}">

            @foreach ($records->where('parent_record_id', '=', '0')->sortBy('order') as $record)

            <div class="panel panel-info">
              <div class="panel-heading"><h1>{{ $record->name }}</h1></div>

              <div class="panel-body">

                <i>For the following questions, please select your reponses to the following questions.</i>

                @foreach ($records->where('parent_record_id', '=', $record->id) as $sub_record)
                  <h2>{{ $sub_record->name }}</h2>

                  @foreach ($sub_record->attributes->sortBy('order')->chunk(2) as $chunk)
                            <div class="row">
                                @foreach ($chunk as $attribute)
                                  <div class="col-xs-6">
                                     <div class="form-group">
                                      @if($attribute->type->name == "boolean")
                                      <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" value="1"> &nbsp;{{ $attribute->name }}
                                          </label>
                                      </div>
                                      @elseif($attribute->type->name == "text")
                                      <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                                      <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="text" >
                                      @elseif($attribute->type->name == "date")
                                      <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                                      <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="date" >
                                      @elseif($attribute->type->name == "integer")
                                      <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                                      <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="number" >
                                      @endif

                                    </div>
                                  </div>
                                @endforeach
                            </div>
                  @endforeach

                @endforeach

               
                @foreach ($record->attributes->sortBy('order')->chunk(2) as $chunk)

                  <div class="row">
                      @foreach ($chunk as $attribute)
                        <div class="col-xs-6">
                           <div class="form-group">
                            @if($attribute->type->name == "boolean")
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" value="1"> &nbsp;{{ $attribute->name }}
                                </label>
                            </div>
                            @elseif($attribute->type->name == "text")
                            <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                            <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="text" >
                            @elseif($attribute->type->name == "date")
                            <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                            <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="date" >
                            @elseif($attribute->type->name == "integer")
                            <label class="control-label" for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>
                            <input class="form-control" name="attributes[{{ $attribute->id }}]" id="attributes[{{ $attribute->slug }}]" type="number" >
                            @endif

                          </div>
                        </div>
                      @endforeach
                  </div>

                @endforeach

              </div>

            </div>

            @endforeach

          <input type="hidden" name="person_id" value="{{ $patient->person->id }}" />
          <input type="hidden" name="attributes_list" value="true" />
            <div class="row">
              <div class="col-xs-6 col-xs-offset-3">
                <br/><br/>
                <button type="submit" class="btn btn-success btn-lg btn-block btn-raised"><h4>Submit</h4></button>
              </div>
            </div>

            {{ csrf_field() }}
          </form>

          <div class="row" style="margin-top:60px;">
            <div class="col-xs-12">
              <p class="text-center">Dental Facial Aesthetics
                <br/>128 Central Park South, Suite 1A
                <br/>New York, NY 10019</p> 
                <br/>          
            </div>
          </div>

        </div>

    </div>
</div>


                  
                  
@endsection
