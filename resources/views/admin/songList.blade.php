@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Songs</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($songs as $song)
        {{date('Y-m-d',strtotime($song->created_at))}} <a href="/home/song/edit/{{$song->id}}">{{ $song->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
