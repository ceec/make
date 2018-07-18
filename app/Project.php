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
     * Get the category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }    

     /**
     * generate a friendly url slug
     */
    public function url()
    {
        $name = $this->name;

        //all lowercase
        $name = strtolower($name);

        //replace spaces with dashes
        $url = str_replace(' ','-',$name);
        
        return $url;
    } 

}
