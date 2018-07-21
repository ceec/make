@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Types</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($types as $type)
        {{date('Y-m-d',strtotime($type->created_at))}} <a href="/home/type/edit/{{$type->id}}">{{ $type->type }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
