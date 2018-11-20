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
            <a href="/home/tasks/complete"><h2>Completed</h2></a>
        </div>
    </div>

    @if($status != 'complete')
            <h2>Daily</h2>
            @foreach($dailytasks as $task)
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
                    <small>{{date('F j g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                @endif
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>
                            <div class="pull-right">
                                <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                                {!! Form::open(['url' => '/task/move','class'=>'todo-complete']) !!}
                                    {!! Form::hidden('task_id',$task->id) !!} 
                                    {!! Form::hidden('list_id','1') !!} 
                                    {!! Form::submit('&darr;',['class'=>'arrow','id'=>'content']) !!}
                                {!! Form::close() !!}   
                            </div>
                            <br>
                        </div>
                    </div>    
            @endforeach            
  
            <h2>General</h2>
            @foreach($generaltasks as $task)
            <div class="row">
                <div class="col-md-12">            
                    {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                        {!! Form::hidden('task_id',$task->id) !!} 
                        {!! Form::hidden('status','1') !!} 
                        {!! Form::submit('&#x2714;',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                    {!! Form::close() !!}  
                
                @if ($task->status == 0) 
                    <small>{{date('F j g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                @endif
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>

                            <div class="pull-right">
                                <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                                {!! Form::open(['url' => '/task/move','class'=>'todo-complete']) !!}
                                    {!! Form::hidden('task_id',$task->id) !!} 
                                    {!! Form::hidden('list_id','2') !!} 
                                    {!! Form::submit('&uarr;',['class'=>'arrow','id'=>'content']) !!}
                                {!! Form::close() !!}                                  
                            </div>
                            <br>
                </div>
            </div>                              
            @endforeach             
        @endif

    
    <!-- separate UI for completed with less features -->
    @if($status == 'complete')
        <h2>Completed</h2>
         @foreach($generaltasks as $task)
            <div class="row">  
                <div class="col-md-12">
                <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                {{$task->task}}
                 <div class="pull-right">
                    <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                 </div>
                </div>
            </div>
         @endforeach
    @endif


    </div>
</div>




@endsection
