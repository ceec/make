@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Projects</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($projects as $project)
        {{date('Y-m-d',strtotime($project->created_at))}} <a href="/home/project/edit/{{$project->id}}">{{ $project->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
