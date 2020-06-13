<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weather;
use Carbon\Carbon;

class WeatherController extends Controller
{

     /**
     * Get Data from Tempest
     *
     * @return \Illuminate\Http\Response
     */
    public function getData() {

      // Grab data from the url
      // My station id 19456
      // https://swd.weatherflow.com/swd/rest/observations/station/19456?api_key=20c70eae-e62f-4d3b-b3a4-8586e90f3ac8

      // There is 1000 better ways to do this?
      $rawdata = file_get_contents('https://swd.weatherflow.com/swd/rest/observations/station/19456?api_key=20c70eae-e62f-4d3b-b3a4-8586e90f3ac8');

      // Parse the data
      $data = json_decode($rawdata, true);

      // Calculate the wind direction from degrees

      $winddegree = $data['obs'][0]['wind_direction'];
      $direction = ($winddegree % 360);
      $direction = round($direction / 22.5);
     
      $directions = ["N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW","N"];

      $direction =  $directions[$direction];


      // Insert into the Weather table
      $w = new Weather;

      foreach($data['obs'][0] as $key => $value) {
        $w->$key = $value;
      }
      $w->cardinal_direction = $direction;
      $w->save();


    }


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
        $data = Weather::select('air_temperature','relative_humidity','barometric_pressure','created_at')->where('created_at', '>=', Carbon::now()->subWeek())->get();

        // Check if there were any errors
        // $count = Weather::where('air_temperature','=','-143.68')->where('created_at', '>=', Carbon::now()->subWeek())->count();
        // if ($count > 0) {
        //   // Loop through the errors and set -143.68 to ''
        //   //$data = json_encode($data);
        //   foreach($data as $key => $point) {
        //     if ($point->air_temperature == '-143.68') {
        //       unset($point->air_temperature);
        //       unset($point->relative_humidity);
        //       unset($point->barometric_pressure);
        //     }
            
        //   }
        // }

        echo json_encode($data);
    }


}
