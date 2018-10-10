@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Stores</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($stores as $store)
        {{date('Y-m-d',strtotime($store->created_at))}} <a href="/home/store/edit/{{$store->id}}">{{ $store->store }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
