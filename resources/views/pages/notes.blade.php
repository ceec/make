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
                @foreach($notes as $note)
                    <div class="card card-block bg-faded">
                    <h3>{{$note->title}}</h3>
                        {!! $note->note !!}<br>
                        <small>{{$note->created_at}}</small>
                    </div>
                    <br>
	            @endforeach
            </div>
        </div>


	</div>

@endsection