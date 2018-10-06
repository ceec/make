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

.col-md-12 {
	
}
</style>
	<div class="container">
		<h2>Projects</h2>
			<div class="row">
			<?php $x=1; ?>
			@foreach ($projects as $project)
				<div class="col-sm-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><a href="/project/{{$project->url}}">{{$project->name}}</a></h5>
						
								<p class="card-text"></p>
						<span>{{date('F j, Y g:i a',strtotime($project->last_step_updated_at))}}</span>
				
						</div>
					</div>
				</div>			
      <?php
        if ($x%4==0) {
			?>
				</div>
				<br>
				<div class="row">
			<?php                            
				}
				$x++;
			?>			
			@endforeach
			</div>
		<h2>Websites</h2>
		<ul>
			<li><a href="https://enstars.info">enstars.info</a></li>
			<li><a href="https://figurerant.com">figurerant.com</a></li>
		</ul>
	</div>

@endsection


	<!--		<ul>
			<li><a href="/movies">Movies Seen</a></li>
			<li><a href="/london">London Trip</a></li>
			<li><a href="/chelsea">Chelsea Doujin</a></li>
			<li><a href="/manga">Manga Collected</a></li>
			<li><a href="/wordcount">Wordcount</a></li>
			<li><a href="/books">Books</a></li>		
			<li><a href="/caterpillars">Caterpillars</a></li>			
		</ul>-->

<!--		<h2>To move Over</h2>
		<ul>
			<li>Doujin</li>
			<li>Books</li>
			<li>Rocks</li>	
			<li>Trips</li>
		</ul>-->