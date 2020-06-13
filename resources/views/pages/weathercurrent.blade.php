@extends('layouts.layout')



@section('content')
<style>
#chartdiv {
  width: 100%;
  height: 200px;
}

#chartdiv2 {
  width: 100%;
  height: 200px;
}

#chartdiv3 {
  width: 100%;
  height: 200px;
}

#chartdiv4 {
  width: 100%;
  height: 300px;
}
</style>
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
			<script src="https://www.amcharts.com/lib/3/serial.js"></script>
			<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
			<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
			<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
			<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
      <script src="https://www.amcharts.com/lib/3/plugins/responsive/responsive.min.js"></script>

<div class="container">

  <?php
  // Make a friendly Farenheight function
  function convertToFarenheight($c) {

    $f = ((9/5) * $c) + 32;

    $f = round($f,2);

    return $f;
  }

  function convertPressure($pressure) {

    $pressure = $pressure / 100;

    $pressure = round($pressure,1);

    return $pressure;
  }



?>
  <br>
  <h1>Current Weather at {{date('F n, Y G:i',strtotime($current->created_at))}}</h1>
  <div class="row">
    <div class="col-md-3">
      <h2>Temp: {{$current->air_temperature}} &deg;C</h2>
      <h2>Temp: {{convertToFarenheight($current->air_temperature)}} &deg;F</h2>
      <h2>Humidity: {{$current->relative_humidity}}%</h2>
      <h2>Pressure: {{$current->barometric_pressure}} mb</h2>
      <h2>Average Wind: {{$current->wind_avg}} mph {{$current->wind_direction}}&deg; {{$current->cardinal_direction}}
    </div>
    <div class="col-md-3">
       <div id="chartdiv"></div>
    </div>
    <div class="col-md-3">
       <div id="chartdiv2"></div>
    </div>
    <div class="col-md-3">
       <div id="chartdiv3"></div>
    </div>        
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="chartdiv4"></div>
    </div>
  </div>


  <hr>

  @foreach($recent as $data)
  Time: {{$data->created_at}} Temperature: {{$data->air_temperature}} &deg;C Temperature: {{convertToFarenheight($data->air_temperature)}} &deg;F Humidity: {{$data->relative_humidity}}% Pressure: {{$data->barometric_pressure}} mb<br>
  @endforeach
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "dataLoader": {
    "url": "/weather/data",
    "format": "json"
  },
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
       // "maximum": "14000000",
        "title": "Temperature"
    }],
    "graphs": [{
      // "id":events[i].id,
      "title": 'Temperature',
      // "bullet": "none",
      "valueField":'air_temperature'
    }],
    "categoryField": "created_at",
    "categoryAxis": {
      "parseDates": true,
      "minPeriod": "ss",
    },

    "export": {
        "enabled": false
    }
});

var chart = AmCharts.makeChart("chartdiv2", {
    "type": "serial",
    "theme": "light",
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "dataLoader": {
    "url": "/weather/data",
    "format": "json"
  },
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
       // "maximum": "14000000",
        "title": "Humidity"
    }],
    "graphs": [{
      // "id":events[i].id,
      "title": 'Temperature',
      // "bullet": "none",
      "valueField":'relative_humidity'
    }],
    "categoryField": "created_at",
    "categoryAxis": {
      "parseDates": true,
      "minPeriod": "ss",
    },

    "export": {
        "enabled": false
    }
});

var chart = AmCharts.makeChart("chartdiv3", {
    "type": "serial",
    "theme": "light",
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "dataLoader": {
    "url": "/weather/data",
    "format": "json"
  },
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
       // "maximum": "14000000",
        "title": "Pressure"
    }],
    "graphs": [{
      // "id":events[i].id,
      "title": 'Temperature',
      // "bullet": "none",
      "valueField":'barometric_pressure'
    }],
    "categoryField": "created_at",
    "categoryAxis": {
      "parseDates": true,
      "minPeriod": "ss",
    },

    "export": {
        "enabled": false
    }
});

var chart = AmCharts.makeChart("chartdiv4", {
    "type": "serial",
    "theme": "light",
    "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
    "dataLoader": {
    "url": "/weather/data/week",
    "format": "json"
  },
    "valueAxes": [{
        "id": "temperature",
        "position": "left",
        "title": "Temperature"
    }, {
        "id": "humidity",
        "position": "left",
        "inside": true
    }, {
        "id": "pressure",
        "inside": true,
        "position": "right",
        "title": "Pressure"
    }],
    "graphs": [{
      // "id":events[i].id,
      "title": 'Temperature',
      // "bullet": "none",
      "valueAxis": "temperature",
      "valueField":'air_temperature'
    },{
      // "id":events[i].id,
      "title": 'Humidity',
      // "bullet": "none",
      "valueAxis": "humidity",
      "valueField":'relative_humidity'
    },{
      // "id":events[i].id,
      "title": 'Pressure',
      // "bullet": "none",
      "valueAxis": "pressure",
      "valueField":'barometric_pressure'
    }],
    "categoryField": "created_at",
    "categoryAxis": {
      "parseDates": true,
      "minPeriod": "mm"
    },
    "legend": {
      "position": "bottom",
    },
    "export": {
        "enabled": false
    }
});
</script>
@endsection
