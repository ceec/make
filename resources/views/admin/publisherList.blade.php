@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Publishers</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($publishers as $publisher)
        {{date('Y-m-d',strtotime($publisher->created_at))}} <a href="/home/publisher/edit/{{$publisher->id}}">{{ $publisher->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
