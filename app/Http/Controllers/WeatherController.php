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

     /**
     * Data for weather graph
     *
     * @return \Illuminate\Http\Response
     */
    public function dataWeek(){

        // Need to get data for last week
        $data = Weather::where('created_at', '>=', Carbon::now()->subWeek())->get();

        // Check if there were any errors
        $count = Weather::where('temperature','=','-143.68')->where('created_at', '>=', Carbon::now()->subWeek())->count();
        if ($count > 0) {
          // Loop through the errors and set -143.68 to ''
          //$data = json_encode($data);
          foreach($data as $key => $point) {
            if ($point->temperature == '-143.68') {
              $point->temperature = '';
            }
          }
        }

        echo json_encode($data);
    }


}
