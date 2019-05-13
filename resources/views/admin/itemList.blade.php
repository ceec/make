@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Items (Rocks)</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($items as $item)
        {{date('Y-m-d',strtotime($item->created_at))}} <a href="/home/item/edit/{{$item->id}}">{{ $item->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
