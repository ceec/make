<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volume;
use App\Group;

use Auth;

class DoujinController extends Controller {


    /**
     * All Doujin List
     *
     * @return \Illuminate\Http\Response
     */
    public function doujin(){
        $volumes = Volume::where('user_id','=',2)->get();

        $groups = Group::where('type_id','=',3)->get();
       

        return  view('pages.doujin')
            ->with('groups',$groups)
            ->with('volumes',$volumes);
    }  

    /**
     * Doujin by group
     *
     * @return \Illuminate\Http\Response
     */
    public function group($url){

        $group = Group::where('type_id','=',3)->where('url','=',$url)->first();

        $volumes = Volume::where('group_id','=',$group->id)->get();

        return  view('pages.doujinGroup')
            ->with('volumes',$volumes)
            ->with('group',$group);
    }   
    
    /**
     * Doujin by volume
     *
     * @return \Illuminate\Http\Response
     */
    public function volume($url,$volume_id){

        $volume = Volume::where('id','=',$volume_id)->first();
        $group = Group::where('id','=',$volume->group_id)->first();

        return  view('pages.doujinVolume')
            ->with('group',$group)
            ->with('volume',$volume);
    }      


}
