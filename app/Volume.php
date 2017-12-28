<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{

        public function pairing()
    {
        return $this->belongsTo('App\Pairing');
    } 

}
