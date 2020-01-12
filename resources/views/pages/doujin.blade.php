@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

	<div class="container">
        <h2>Doujin</h2>

        @foreach($groups as $group)
            <a href="/doujin/{{$group->url}}">{{$group->title}}</a><br>

        @endforeach
    </div>
@endsection