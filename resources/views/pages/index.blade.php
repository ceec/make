@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
<style>
.ccmake-cosplay {
	background-color: #e2aef2;
}

.ccmake-programming {
	background-color: #afd2ff;
}

.step-container {
	padding-top: 10px;
	padding-bottom: 5px;
}
</style>
	<div class="container">
	@foreach($steps as $step)


		<div class="ccmake-{{strtolower($step->project->category->name)}} col-md-12 step-container">
		{{ date('F j, Y', strtotime($step->started_at)) }}<br>
			<h2><a href="/category/{{$step->project->category->url()}}">{{$step->project->category->name}}</a> - <a href="/project/{{$step->project->url()}}"> {{$step->project->name}}</a></h2>
			<h2>{{$step->name}}</h2>
			@if($step->project_id == 8)
			<div class="row">
				<div class="col-3">
					Theater: 
				</div>
				<div class="col-3">
					Rating:
				</div>
			</div>
			@endif			
			<div class="row">
				<div class="col-3">
					@if(!($step->tags)->isEmpty())
						<i class="fa fa-folder-o" aria-hidden="true"></i>
						Tags: 
						@foreach($step->tags as $key => $tag)
						    @if( count( $step->tags ) != $key + 1 )
						        <a href="/tag/{{strtolower($tag->tag->name)}}">{{$tag->tag->name}}</a>,
						     @else
						        <a href="/tag/{{strtolower($tag->tag->name)}}">{{$tag->tag->name}}</a>
						    @endif
						@endforeach
					@endif


					
				</div>
				<div class="col-3">
					@if(!($step->tools)->isEmpty())
						<i class="fa fa-wrench" aria-hidden="true"></i>
						Tools: 
						@foreach($step->tools as $key => $tool)
						    @if( count( $step->tools ) != $key + 1 )
						        <a href="/tool/{{strtolower($tool->tool->url)}}">{{$tool->tool->name}}</a>,
						     @else
						        <a href="/tool/{{strtolower($tool->tool->url)}}">{{$tool->tool->name}}</a>
						    @endif
						@endforeach
					@endif
				</div>
			</div>
			
			<p>{!! $step->text !!}</p>
			@if(isset($step->completed_at))
			<?php
				//figure out how long 
				
				//start
				$start = new DateTime($step->started_at);
				$end = new DateTime($step->completed_at);
				$time_spent = $start->diff($end);

				//create a function to format this
				$time_display = '';
				if ($time_spent->y > 0) {
					$time_display .= $time_spent->y." years ";
				}

				if ($time_spent->m > 0) {
					$time_display .= $time_spent->m." months ";
				}

				if ($time_spent->d > 0) {
					$time_display .= $time_spent->d." days ";
				}

				if ($time_spent->h > 0) {
					$time_display .= $time_spent->h." hours ";
				}	

				if ($time_spent->i > 0) {
					$time_display .= $time_spent->i." minutes ";
				}								
			?>
			<div class="row">
				<div class="col-3">
					<strong><i class="fa fa-clock-o" aria-hidden="true"></i> Time Spent: {{$time_display}}</strong> 
				</div>
				<div class="col-3">
					
				</div>
			</div>
			@endif
		</div>
		<br><br>


	@endforeach

	</div>

@endsection