<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonRelationship extends Pivot
{
    protected $table = "person_relationships";

    public function type() {
        return $this->belongsTo('App\RelationshipType');
    }
}
