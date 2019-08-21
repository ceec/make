@extends('layouts.layout')



@section('content')
<div class="container">
  <h1>Weather</h1>

  @foreach($weather as $data)
{{$data->created_at}} Temperature: {{$data->temperature}} Humidity: {{$data->humidity}} Pressure: {{$data->pressure}} Windspeed: {{$data->windspeed}} <br>


  @endforeach

@endsection
