<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{


    public function volumes()
    {
          return $this->hasMany('App\Volume');
    }


}
