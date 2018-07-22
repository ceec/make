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
    <div class="row">              
    @foreach($books as $book)
      <div class="card col-md-3">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">by {{$book->author_id}}</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">{{$book->type_id}}</a>
          <a href="#" class="card-link">{{$book->publisher_id}}</a>
        </div>
      </div>
    @endforeach
    </div>
  </div>


		
		
	</div>

@endsection