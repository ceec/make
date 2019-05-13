@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Minerals</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($minerals as $mineral)
        {{date('Y-m-d',strtotime($mineral->created_at))}} <a href="/home/mineral/edit/{{$mineral->id}}">{{ $mineral->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
