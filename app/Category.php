<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = 'categories';

    
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
