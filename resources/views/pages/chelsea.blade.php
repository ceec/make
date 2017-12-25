@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
	

	@foreach($volumes as $volume)

		{{$volume->title_j}} {{$volume->title_e	}}<br>
	@endforeach


@endsection