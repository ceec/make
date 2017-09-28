<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectstep extends Model
{
        public function project()
    {
        return $this->belongsTo('App\Project');
    }

        public function tags()
    {
        return $this->hasMany('App\Projectsteptag');
    }   

    public function tools() {
    	return $this->hasMany('App\Projectsteptool');
    } 
}
