@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Artist</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($artists as $artist)
        {{date('Y-m-d',strtotime($artist->created_at))}} <a href="/home/artist/edit/{{$artist->id}}">{{ $artist->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
