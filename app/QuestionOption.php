<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    public $timestamps = false;

    public function option () {
    	return $this->belongsTo('App\OptionChoice');
    }
}
