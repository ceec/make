<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

     /**
     * Get the category
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }  

}
