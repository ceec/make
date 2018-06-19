@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-2">
                <h3>Tags</h3>
            </div>
            <div class="col-md-10">
                <h2>{{$note->title}}</h2>
                <p>
                  {{$note->note}}
                </p>

            </div>
        </div>


	</div>

@endsection