<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;

    public function question_option () {
    	return $this->belongsTo('App\QuestionOption');
    }

    public function person() {
    	return $this->belongsTo('App\Person');
    }
}
