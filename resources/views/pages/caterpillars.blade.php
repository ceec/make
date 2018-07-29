@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

<style>

    .card {
      margin-bottom:2%;
    }



</style>
	<div class="container">
    <h2>Caterpillars</h2><br>
    @foreach($caterpillars as $caterpillar)
    <div class="row">
      <div class="col-md-12">
        <h5 class="card-title">{{$caterpillar->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"><em>{{$caterpillar->latin}}</em></h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <div class="row">
          <div class="card col-md-2">
            <img src="/images/caterpillars/{{$caterpillar->url}}/egg.jpg">
          </div>
          <div class="card col-md-2">
            <img src="/images/caterpillars/{{$caterpillar->url}}/1stinstar.jpg">
          </div>          
        </div>
        </div>
      </div>
    @endforeach
  </div>


		
		
	</div>

@endsection