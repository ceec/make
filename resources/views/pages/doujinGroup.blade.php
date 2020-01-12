@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

	<div class="container">
    <h2><a href="/doujin">Doujin</a> / {{$group->title}}</h2>
    <div class="row">
      @foreach($volumes as $volume)
        <div class="col-md-2">
          <div class="card">
            <img class="card-img-top" src="/images/doujin/{{$group->url}}.jpg" alt="Card image cap">
            <div class="card-block">
            <h4 class="card-title"><a href="/doujin/{{$group->url}}/{{$volume->id}}">{{$volume->title_e}}</a></h4>
            </div>
          </div>
          
        </div>
      @endforeach
    </div>
	</div>

@endsection