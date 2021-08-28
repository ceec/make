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
		<table class="table">
		<thead>
			<tr>
      <td>Name</td>
      <td>Length</td>
			<td>Artist</td>
			<td>Album</td>
      <td>Track</td>
      <td>Plays</td>
			</tr>
		</thead>

	@foreach($songs as $song)


		<tr>
      <td>{{$song->name}}</td>
      <td>{{ltrim(gmdate("i:s", $song->length),0)}}</td>
			<td>{{$song->findartist()}}</td>
			<td>{{$song->album->name}}</td>
      <td>{{$song->track}}</td>
      <td>{{$song->spotifyplays()}}</td>
		</tr>
		



	@endforeach
	</table>
	</div>

@endsection