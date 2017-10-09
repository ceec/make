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
		<a href="/"><h1>CC Makes Things</h1></a>
		<br>
		<?php
			phpinfo();
			exit;
		?>

	@foreach($steps as $step)


		<div class="{{strtolower($step->project->category->name)}} col-md-12 step-container">
		{{ date('F j, Y', strtotime($step->started_at)) }}<br>
			<h2><a href="/category/{{strtolower($step->project->category->name)}}">{{$step->project->category->name}}</a> - <a href="/project/{{strtolower($step->project->name)}}"> {{$step->project->name}}</a></h2>
			<h2>{{$step->name}}</h2>
			<div class="row">
				<div class="col-3">

			</div>
			
			<p>{!! $step->text !!}</p>
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