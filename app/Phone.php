<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

	protected $fillable = [
		'number',
		'extension',
		'type_id',
		'order',
		'sms_subscribed'
	];

    public function person() {
    	return $this->belongsTo('App\Person');
    }

    public function type() {
    	return $this->belongsTo('App\PhoneType');
    }
}
