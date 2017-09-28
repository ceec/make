<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectsteptool extends Model
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
    public function tool()
    {
        return $this->belongsTo('App\Tool');
    }    
}
