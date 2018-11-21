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

    <!-- individual task -->
    <h2>{{$task->task}}</h2>
    <strong>Created: {{$task->created_at}}</strong>
    <hr>

    @foreach($notes as $note)
      <p>{{$note->created_at}} {{$note->note}}</p>
    @endforeach

    
    {!! Form::open(['url' => '/add/task/note']) !!}
    {!! Form::textarea('note','',['class'=>'','id'=>'note']) !!}
      {!! Form::hidden('task_id',$task->id,['class'=>'','id'=>'task_id']) !!}
      <br>
    {!! Form::submit('Add Note') !!}
    {!! Form::close() !!}   




    </div>
</div>




@endsection
