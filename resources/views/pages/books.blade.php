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
      <div class="col-md-3">
        {!! Form::open(['url' => '/books/search']) !!}
        {!! Form::text('query','',['class'=>'form-control','id'=>'store','placeholder'=>'Search']) !!}                                                                      
        {!! Form::submit('Search') !!}
        {!! Form::close() !!}
      </div>
    </div>
    <br>
    <div class="row">              
    @foreach($books as $book)
      <div class="card col-md-3">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">by {{$book->author->name}}</h6>
        <img class="img-fluid" src="/images/books/{{$book->id}}.jpg"><br>
        Type: <a href="/books/type/{{$book->type->url}}" class="card-link">{{$book->type->type}}</a><br>
          Publisher: <a href="#" class="card-link">{{$book->publisher->name}}</a><br>
          @if($book->group_id != 0)
        Group: <a href="/books/group/{{$book->group->url}}" class="card-link">{{$book->group->title}}</a>
          @endif
        </div>
      </div>
    @endforeach
    </div>
  </div>


		
		
	</div>

@endsection