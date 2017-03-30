<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function attributes() {
    	return $this->hasMany('App\RecordAttribute');
    }
}
