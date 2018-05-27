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
		<h2>Projects</h2>
		<ul>
			<li><a href="/counties">County Map</a></li>
			<li><a href="/movies">Movies Seen</a></li>
			<li><a href="/london">London Trip</a></li>
			<li><a href="/chelsea">Chelsea Doujin</a></li>
			<li><a href="/manga">Manga Collected</a></li>
			<li><a href="/wordcount">Wordcount</a></li>
		</ul>

		<h2>To move Over</h2>
		<ul>
			<li>Wordcount</li>
			<li>Doujin</li>
			<li>Books</li>
			<li>Rocks</li>	
			<li>Trips</li>
		</ul>
		<h2>Websites</h2>
		<ul>
			<li><a href="https://enstars.info">enstars.info</a></li>
			<li><a href="https://figurerant.com">figurerant.com</a></li>
		</ul>
	</div>

@endsection