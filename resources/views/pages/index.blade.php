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
</style>
	<div class="container">
	<!-- hardcoded one -->
		<h1>CC Makes Things</h1>
		<br>

	@foreach($steps as $step)


		<div class="programming col-md-12">
		
			<h2><a href="">Category</a> - <a href=""> {{$step->project->name}}</a> <small>{{ date('F d, Y', strtotime($step->started_at)) }}</small></h2>
			<div class="row">
				<div class="col-3">
					<i class="fa fa-folder-o" aria-hidden="true"></i> Tags: Programming, PHP, Laravel
				</div>
				<div class="col-3">
					<i class="fa fa-wrench" aria-hidden="true"></i> Tools: Sublime Text
				</div>
			</div>
			<h2>{{$step->name}}</h2>
			<p>{{$step->text}}</p>
			<div class="row">
				<div class="col-3">
					<strong><i class="fa fa-clock-o" aria-hidden="true"></i> Time Spent: 2 hours</strong> 
				</div>
				<div class="col-3">
					
				</div>
			</div>
			
			<br>
		</div>
		<br><br>


	@endforeach

	</div>

@endsection