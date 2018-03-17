@extends('layouts.app')

@section('content')
<div class="container">

    <h1>To Do</h1>
    

    <div class="row">
    	<div class="col-md-12">
            @foreach($projects as $project)
                <h2>{{$project->project->name}}</h2>
                @foreach($project->tasks as $task)
                    {{$task->task}}<small>{{$task->created_at}}</small><br>
                @endforeach
        

      @endforeach
    	</div>
   	</div>

</div>


@endsection
