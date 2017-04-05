<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'title', 'subheading'
    ];

    public function form() {
    	return $this->belongsTo('App\Form');
    }

    public function questions() {
    	return $this->hasMany('App\Question');
    }

    public function people() {
    	return $this->belongsToMany('App\Person', 'person_form_section', 'form_section_id', 'person_id');
    }
}
