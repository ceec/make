<?php
/**
* generate a url from the given name
*
* @param $name
*/
function formatUrl($name)
{
        //all lowercase
        $name = strtolower($name);

        //replace spaces with dashes
        $url = str_replace(' ','-',$name);
        
        return $url;
}