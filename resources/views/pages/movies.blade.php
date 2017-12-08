@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
<style>
.cosplay {
	background-color: #e2aef2;
}

.programming {
	background-color: #afd2ff;
}

.step-container {
	padding-top: 10px;
	padding-bottom: 5px;
}
</style>
	<div class="container">
	<!-- hardcoded one -->
		<br>
		<a href="/"><h1>CC Makes Things</h1></a>
		<br>
		<table class="table">
		<thead>
			<tr>
			<td>Title</td>
			<td>Rating</td>
			<td>Seen</td>
			<td>Price</td>
			</tr>
		</thead>

	@foreach($movies as $movie)
		<tr>
			<td>{{$movie->title}}</td>
			<td>{{$movie->rating_id}}</td>
			<td>{{$movie->time}}</td>
			<td>{{$movie->price}}</td>
		</tr>
		



	@endforeach
	</table>
	</div>

@endsection