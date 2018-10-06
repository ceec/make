<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     /**
     * Get the steps for the project.
     */
    public function steps()
    {
        return $this->hasMany('App\Projectstep');
    }

     /**
     * Get the most recent step
     */
    public function recentStep()
    {
        return $this->hasMany('App\Projectstep')->latest()->take(1);
    }


     /**
     * Get the category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }    


}
