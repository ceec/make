@extends('layouts.app')

@section('content')


 
 <div class="container">
    <div class="row">
        <div class="col-md-3">    
            {!! Form::open(['url' => '/add/task']) !!}
            {!! Form::text('task','',['class'=>'','id'=>'content']) !!}
            {!! Form::hidden('project_id',17) !!} 
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}         
        </div>
        <div class="col-md-3">
            <a href="/home/tasks"><h2>To Do</h2></a>
        </div>
        <div class="col-md-3">
            <a href="/home/tasks/complete"><h2>Completed</h2></a>
        </div>
    </div>

    <div class="row">  
        <div class="col-md-6">
            <h2>Daily</h2>
            @foreach($tasks as $task)
                @if($task->status == '0')
                    {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                        {!! Form::hidden('task_id',$task->id) !!} 
                        {!! Form::hidden('status','1') !!} 
                        {!! Form::submit('&#x2714;',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                    {!! Form::close() !!}  
                @endif   
                
                @if ($task->status == 0) 
                    <small>{{date('F j g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                @endif
                {{$task->task}}

                            <div class="pull-right">
                                <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                            </div>
                            <br>
            @endforeach            
        </div>
        <div class="col-md-6">
            <h2>Weekly</h2>
            <h2>Random</h2>
        </div>
            





    
    </div>
</div>


@endsection
