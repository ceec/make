@extends('layouts.app')

@section('content')
<div class="container">

    <h1>To Do</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($tasks as $task)
        {{$task}}<br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
