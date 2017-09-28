<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectsteptag extends Model
{


     /**
     * Get the steps for the project.
     */
    public function steps()
    {
        return $this->hasMany('App\Projectstep');
    }



     /**
     * Get the category
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }    
}
