<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $table = 'form_headers';

    public function sections() {
    	return $this->hasMany('App\FormSection', 'form_header_id');
    }
}
