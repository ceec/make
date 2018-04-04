@extends('layouts.app')

@section('content')


 
 <div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="/home/tasks"><h2>To Do</h2></a>
        </div>
        <div class="col-md-3">
            <a href="/home/tasks/complete"><h2>Completed</h2></a>
        </div>
    </div>
    
    <div class="flex">  
            @foreach($projects as $project)
                <div>
                    <h2>{{$project->project->name}}</h2>
                    @foreach($project->tasks as $task)
                        <div class="todo">
                            {{$task->task}}<br>
                            @if ($task->status == 0) 
                                <small>{{date('F n, Y g:i a',strtotime($task->created_at))}}</small>
                            @else
                                <small>{{date('F n, Y g:i a',strtotime($task->updated_at))}}</small>
                            @endif

                            
                            @if($task->status == '0')
                                {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                                    {!! Form::hidden('task_id',$task->id) !!} 
                                    {!! Form::hidden('status','1') !!} 
                                    {!! Form::submit('Complete',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                                {!! Form::close() !!}  
                            @endif             
                        </div>
                    @endforeach

                    @if($task->status == 0)
                        {!! Form::open(['url' => '/add/task']) !!}
                            {!! Form::text('task','',['class'=>'','id'=>'content']) !!}
                            {!! Form::hidden('project_id',$project->project_id) !!} 
                            {!! Form::submit('Add') !!}
                        {!! Form::close() !!} 
                    @endif       
                 </div>             
            @endforeach
    
    </div>
</div>


@endsection
