@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Notes</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($notes as $note)
        {{date('Y-m-d',strtotime($note->created_at))}} <a href="/home/note/edit/{{$note->id}}">{{ $note->id }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
