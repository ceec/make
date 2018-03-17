@extends('layouts.app')

@section('content')



<div class="container flex">  
            @foreach($projects as $project)
                <div>


                    {!! Form::open(['url' => '/add/task']) !!}

                        {!! Form::text('task','',['class'=>'','id'=>'content']) !!}
                        {!! Form::hidden('project_id',$project->project_id) !!} 

                        {!! Form::submit('Add','',['class'=>'btn btn-default']) !!}

                    {!! Form::close() !!}        
                 </div>             
      @endforeach
    


</div>


@endsection
