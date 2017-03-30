<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    public function phones() {
    	return $this->hasMany('App\Phone');
    }
}
