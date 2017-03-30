<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

	public function addressable() {
		return $this->morphTo();
	}

    public function country() {
    	return $this->belongsTo('App\Country');
    }

    public function state() {
    	return $this->belongsTo('App\State');
    }
}
