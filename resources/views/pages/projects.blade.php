@extends('layouts.layout')

@section('title')
@parent
Projects
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
		<h2>Projects</h2>
		<ul>
			<li><a href="/counties">County Map</a></li>
			<li><a href="/movies">Movies Seen</a></li>
			<li><a href="/london">London Trip</a></li>
			<li><a href="/chelsea">Chelsea Doujin</a></li>
			<li><a href="/manga">Manga Collected</a></li>
		</ul>

		<h2>To move Over</h2>
		<ul>
			<li>Wordcount</li>
			<li>Doujin</li>
			<li>Books</li>
			<li>Rocks</li>	
			<li>Trips</li>
		</ul>
	</div>

@endsection