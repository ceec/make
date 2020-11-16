@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Qs</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($qs as $q)
        {{date('Y-m-d',strtotime($q->created_at))}} <a href="/home/queue/edit/{{$q->id}}">{{ $q->title }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
