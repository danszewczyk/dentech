<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
    public $timestamps = false;

    public function options() {
    	return $this->hasMany('App\OptionChoice');
    }
}
