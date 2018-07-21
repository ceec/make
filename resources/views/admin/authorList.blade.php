@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Authors</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($authors as $author)
        {{date('Y-m-d',strtotime($author->created_at))}} <a href="/home/author/edit/{{$author->id}}">{{ $author->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
