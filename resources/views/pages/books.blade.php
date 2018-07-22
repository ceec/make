@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

<style>
    .padding{
        padding-left: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .volume {
        background-color: lightgray;
    }
</style>
	<div class="container">
    <input type="text" placeholder="Search" id="search">
    <br><br>



                
    @foreach($books as $book)
      <div class="card" style="width: 18rem;">
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

@endsection