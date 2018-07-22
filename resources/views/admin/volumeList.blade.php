@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Volumes</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($volumes as $volume)
        {{date('Y-m-d',strtotime($volume->created_at))}} <a href="/home/volume/edit/{{$volume->id}}">{{ $volume->title_e }} - {{ $volume->title_j }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
