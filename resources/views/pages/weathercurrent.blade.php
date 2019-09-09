@extends('layouts.layout')



@section('content')
<div class="container">

  <?php
  // Make a friendly Farenheight function
  function convertToFarenheight($c) {

    $f = ((9/4) * $c) + 32;

    $f = round($f,2);

    return $f;
  }

  function convertPressure($pressure) {

    $pressure = $pressure / 100;

    return $pressure;
  }



?>
  <br>
  <h1>Current Weather at {{date('F n, Y G:i',strtotime($current->created_at))}}</h1>

  <h2>Temperature: {{$current->temperature}} &deg;C</h2>
  <h2>Temperature: {{convertToFarenheight($current->temperature)}} &deg;F</h2>
  <h2>Humidity: {{$current->humidity}}%</h2>
  <h2>Pressure: {{convertPressure($current->pressure)}} mb</h2>

  <hr>

  @foreach($recent as $data)
  Time: {{$data->created_at}} Temperature: {{$data->temperature}} &deg;C Temperature: {{convertToFarenheight($data->temperature)}} &deg;F Humidity: {{$data->humidity}}% Pressure: {{convertPressure($data->pressure)}} mb<br>
  @endforeach

@endsection
