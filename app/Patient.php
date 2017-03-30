<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

	use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = [
        'social_security_number', 
        'occupation'
    ];


/*
 * ---------------  RELATIONSHIPS  ---------------
 */

    public function person()
    {
        return $this->morphOne('App\Person', 'personable');
    }

    public function attributes() {
    	return $this->belongsToMany('App\RecordAttribute')->withPivot('value', 'created_at')->withTimestamps();
    }



/*
 * ---------------  MUTATORS  ---------------
 */

    public function setSocialSecurityNumberAttribute($value) {
        $this->attributes['social_security_number'] = encrypt(preg_replace("/[^0-9]/", "", $value));
    }

    public function setOccupationAttribute($value) {
        $this->attributes['occupation'] = encrypt($value);
    }


/*
 * ---------------  ACCESSORS  ---------------
 */

    public function getSocialSecurityNumberAttribute($value) {

        if ($value) {
            if(  preg_match( '/(\d{3})(\d{2})(\d{4})$/', decrypt($value),  $matches ) ) {
                $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
                return $result;
            }
        }
    }

    public function getOccupationAttribute($value) {

        if($value) {

            return decrypt($value);

        }

    }



}