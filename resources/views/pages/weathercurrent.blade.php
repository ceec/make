@extends('layouts.layout')



@section('content')
<div class="container">
  <br>
  <h1>Current Weather at {{date('F n, Y G:i',strtotime($current->created_at))}}</h1>

  <h2>Temperature: {{$current->temperature}} &deg;C</h2>
  <h2>Humidity: {{$current->humidity}}%</h2>
  <h2>Pressure: {{$current->pressure}} mb</h2>

  <hr>

  @foreach($recent as $data)
  Time: {{$data->created_at}} Temperature: {{$data->temperature}} &deg;C Humidity: {{$data->humidity}}% Pressure: {{$data->pressure}} mb<br>
  @endforeach

@endsection
