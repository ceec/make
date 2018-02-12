<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Volume;
use App\County;
use App\Item;
use App\Wordcount;

class DataController extends Controller
{

    ///travel
     /**
     * counites
     *
     * @return \Illuminate\Http\Response
     */
    public function counties(){

        $counties = County::select('code','county')->get();

        // foreach($counties as $key => $county) {
        //     var_dump($county->id);
        //     $counties[$key]['id'] = (string) $county->id;
        // }
        // print '<pre>';
        // print_r($counties);
        // print '</pre>';

        echo json_encode($counties);
    }


    //writing
     /**
     * words
     *
     * @return \Illuminate\Http\Response
     */
    public function words(){

        $words = Wordcount::where('updated_at','!=','0000-00-00 00:00:00')->get();


        foreach ($words as $word) {
            //remove time
            $word->updated = date('Y-m-d',strtotime($word->updated_at));
        }


        echo json_encode($words);
    }



}