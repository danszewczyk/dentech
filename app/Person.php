<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Person extends Model
{

    use SoftDeletes;

    protected $table = 'people';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name', 
        'preferred_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email'
    ];


/*
 * ---------------  RELATIONSHIPS  ---------------
 */

    public function personable() {
        return $this->morphTo();
    }

    public function phones() {
    	return $this->hasMany('App\Phone');
    }

    public function address() {
    	return $this->morphOne('App\Address', 'addressable');
    }

    public function relationships() {
    	return $this->belongsToMany('App\Person', 'people_relationships', 'person_id', 'related_person_id')
            ->withPivot(['type_id', 'is_emergency_contact'])
            ->using('App\PersonRelationship');
    }

    public function emergency_contacts() {
        return $this->belongsToMany('App\Person', 'people_relationships', 'person_id', 'related_person_id')
            ->wherePivot('is_emergency_contact', 1)
            ->using('App\PersonRelationship')
            ->withPivot('type_id');
    }



/*
 * ---------------  MUTATORS  ---------------
 */

    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setPreferredNameAttribute($value) {
        $this->attributes['preferred_name'] = ucfirst($value);
    }

    public function setMiddleNameAttribute($value) {
        $this->attributes['middle_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = encrypt(strtolower($value));
    }

    public function setDateOfBirthAttribute($value) {
        $this->attributes['date_of_birth'] = encrypt($value);
    }

 
/*
 * ---------------  ACCESSORS  ---------------
 */


    /* Full Name */

    public function getFullNameAttribute() {
        
        $output = $first_name = $this->first_name;

        if ($this->preferred_name) {
            $output .= ' (' . $this->preferred_name . ')';
        }

        if ($this->middle_name) {
            $output .= ' ' . $this->middle_initial;
        }

        $output .= ' ' . $this->last_name;

        return $output;

    }


    /* Display Name */

    public function getDisplayNameAttribute() {
        return $this->preferred_name_or_first_name . ' ' . $this->last_name;
    }


    /* Preferred Name OR First Name */

    public function getPreferredNameOrFirstNameAttribute() {
        return $this->preferred_name ?: $this->first_name;
    }


    /* Middle Initial */

    public function getMiddleInitialAttribute() {
        if ($this->middle_name) {
            return $this->middle_name[0] . ".";
        } 
    }


    /* Email */

    public function getEmailAttribute($value) {
        return decrypt($value);
    }

    /* Date of Birth */

    public function getDateOfBirthAttribute($value) {
        return decrypt($value);
    }


    /* Formated Gender */

    public function getGenderAttribute($value) {
        if ($value == 'm') {
            return 'Male';
        } else if ($value == 'f') {
            return 'Female';
        } else {
            return 'Unknown';
        }
    }


    /* Formated Date of Birth */

    public function getFormatedDateOfBirthAttribute() {
        return Carbon::parse($this->date_of_birth)
            ->toFormattedDateString();
    }


    /* Age */

    public function getAgeAttribute() {
        return Carbon::parse($this->date_of_birth)->age;
    }




}
