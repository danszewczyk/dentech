<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    public function form_section() {
    	return $this->belongsTo('App\FormSection');
    }

    public function options() {
    	return $this->belongsToMany('App\OptionChoice', 'question_options', 'question_id', 'option_choice_id');
    }

    public function option_group() {
    	return $this->belongsTo('App\OptionGroup');
    }
}
