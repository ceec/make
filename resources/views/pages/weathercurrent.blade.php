@extends('layouts.layout')



@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<canvas id="myChart" width="200" height="200"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
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

  <h2>Temperature: {{$current->temperature}} &deg;C</h2>
  <h2>Temperature: {{convertToFarenheight($current->temperature)}} &deg;F</h2>
  <h2>Humidity: {{$current->humidity}}%</h2>
  <h2>Pressure: {{convertPressure($current->pressure)}} mb</h2>

  <hr>

  @foreach($recent as $data)
  Time: {{$data->created_at}} Temperature: {{$data->temperature}} &deg;C Temperature: {{convertToFarenheight($data->temperature)}} &deg;F Humidity: {{$data->humidity}}% Pressure: {{convertPressure($data->pressure)}} mb<br>
  @endforeach

@endsection
