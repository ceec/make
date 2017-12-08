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
		<h1>CC Makes Things - Cee</h1>
		<br>

	@foreach($steps as $step)


		<div class="{{strtolower($step->project->category->name)}} col-md-12 step-container">
		{{ date('F j, Y', strtotime($step->started_at)) }}<br>
			<h2><a href="/category/{{strtolower($step->project->category->name)}}">{{$step->project->category->name}}</a> - <a href="/project/{{strtolower($step->project->name)}}"> {{$step->project->name}}</a></h2>
			<h2>{{$step->name}}</h2>
			<?php
				print_r($step);
			?>
			@if($step->project_id == 8)
			<div class="row">
				<div class="col-3">
					Theater:
				</div>
				<div class="col-3">
					Rating:
				</div>
			</div>
			@if
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
						        <a href="/tag/{{strtolower($tool->tool->name)}}">{{$tool->tool->name}}</a>,
						     @else
						        <a href="/tag/{{strtolower($tool->tool->name)}}">{{$tool->tool->name}}</a>
						    @endif
						@endforeach
					@endif
				</div>
			</div>
			
			<p>{{$step->text}}</p>
			@if(isset($step->completed_at))
			<div class="row">
				<div class="col-3">
					<strong><i class="fa fa-clock-o" aria-hidden="true"></i> Time Spent: 2 hours</strong> 
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