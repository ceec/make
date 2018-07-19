@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$blog->title}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/blog']) !!}
            <div class="form-group">
              <label for="started-at">Started At</label>
               {!! Form::text('started_at',$blog->started_at,['class'=>'form-control','id'=>'title']) !!}
            </div>   
            <div class="form-group">
              <label for="completed-at">Completed At</label>
               {!! Form::text('completed_at',$blog->completed_at,['class'=>'form-control','id'=>'title']) !!}
            </div>  
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$blog->name,['class'=>'form-control','id'=>'title']) !!}
            </div>                  
            <div class="form-group">
              <label for="text">Text</label>
               {!! Form::textarea('text',$blog->text,['class'=>'form-control','id'=>'content']) !!}
            </div>    
              
               {!! Form::hidden('blog_id',$blog->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
