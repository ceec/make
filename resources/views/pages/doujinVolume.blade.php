@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

	<div class="container">
  <h2><a href="/doujin">Doujin</a> / <a href="/doujin/{{$group->url}}">{{$group->title}}</a> / {{$volume->title_e}}</h2>
  <br>
    <div class="row">
      <div class="col-md-8">
        <img src="/images/doujin/{{$volume->id}}.jpg">
        <img src="/images/doujin/{{$volume->id}}b.jpg">
      </div>      
      <div class="col-md-4">
        <h3>{{$volume->title_e}}</h3>
        <h6>{{$volume->title_j}}</h6>
        <h6>Published: {{$volume->published_date}}</h6>
      </div>
    </div>
	</div>

@endsection