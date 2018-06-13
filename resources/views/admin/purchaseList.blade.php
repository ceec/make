@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Blog Posts</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($purchases as $purchase)
        {{date('Y-m-d',strtotime($purchase->created_at))}} <a href="/home/purchase/edit/{{$purchase->id}}">{{ $purchase->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
