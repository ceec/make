@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Books</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($books as $book)
        {{date('Y-m-d',strtotime($book->created_at))}} <a href="/home/book/edit/{{$book->id}}">{{ $book->title }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
