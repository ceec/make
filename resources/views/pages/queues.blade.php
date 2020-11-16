@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

	<div class="container">
		<table class="table">
		<thead>
			<tr>
			<td>Title</td>
			<td>Why</td>
			<td>Type</td>
			<td>Reccomended By</td>
			</tr>
		</thead>

	@foreach($qs as $q)
		<tr>
			<td>{{$q->title}}</td>
			<td>{{$q->why}}</td>
			<td>{{$q->type_id}}</td>
			<td>{{$q->reccomended_by}}</td>
		</tr>
		



	@endforeach
	</table>
	</div>

@endsection