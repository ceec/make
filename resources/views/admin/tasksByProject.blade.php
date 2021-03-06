@extends('layouts.app')

@section('content')
<style> 
.arrow {
    display:inline;
}
</style>
 <div class="container">
     <!-- header row -->
    <div class="row">
        <div class="col-md-3">    
            {!! Form::open(['url' => '/add/task']) !!}
            {!! Form::text('task','',['class'=>'','id'=>'content']) !!}
             {!! Form::select('project_id',$allprojects,'',['class'=>'','id'=>'content']) !!}
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}         
        </div>
        <div class="col-md-3">
            <a href="/home/tasks"><h2>To Do</h2></a>
        </div>
        <div class="col-md-3">
            <a href="/home/tasks/project"><h2>By Project</h2></a>
        </div>        
        <div class="col-md-3">
            <a href="/home/tasks/complete"><h2>Completed</h2></a>
        </div>
    </div>

    @foreach($projects as $project)
      <h2>{{$project->name}}</h2>
            @foreach($project->tasks as $task)
            <div class="row">  
                <div class="col-md-12">
                @if($task->status == '0')
                    {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                        {!! Form::hidden('task_id',$task->id) !!} 
                        {!! Form::hidden('status','1') !!} 
                        {!! Form::submit('&#x2714;',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                    {!! Form::close() !!}  
                @endif   
                
                @if ($task->status == 0) 
                    <small>{{date('F j Y g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j Y g:i a',strtotime($task->updated_at))}}</small>
                @endif
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>
                            <br>
                        </div>
                    </div>    
            @endforeach         
    @endforeach


    </div>
</div>




@endsection
