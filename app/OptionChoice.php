<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionChoice extends Model
{
    public $timestamps = false;

    public function group() {
    	return $this->belongsTo('App\OptionGroup');
    }

}
