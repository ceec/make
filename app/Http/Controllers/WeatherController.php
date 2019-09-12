<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weather;
use Carbon\Carbon;

class WeatherController extends Controller
{

     /**
     * Data for weather graph
     *
     * @return \Illuminate\Http\Response
     */
    public function data(){

        // Need to get 24 hours before now
        $data = Weather::where('created_at', '>=', Carbon::now()->subDay())->get();

        echo json_encode($data);
    }

}
