<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{

     /**
     * Get the types
     */
    public function type()
    {
        return $this->belongsTo('App\Queuetype');
    }

}
