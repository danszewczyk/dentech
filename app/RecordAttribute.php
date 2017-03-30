<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordAttribute extends Model
{
    public function record() {
    	return $this->belongsTo('App\Record');
    }

    public function type() {
    	return $this->belongsTo('App\AttributeType');
    }

}
