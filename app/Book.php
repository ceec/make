<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function author() {
        return $this->belongsTo('App\Author');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function publisher() {
        return $this->belongsTo('App\Publisher');
    }

    public function group() {
        return $this->belongsTo('App\Group');
    }

}
