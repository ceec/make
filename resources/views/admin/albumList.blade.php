@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Albums</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($albums as $album)
        {{date('Y-m-d',strtotime($album->created_at))}} <a href="/home/album/edit/{{$album->id}}">{{ $album->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
