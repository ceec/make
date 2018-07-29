@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$project->name}}</h1>
			{!! Form::open(['url' => '/home/edit/project']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>
            {!! Form::text('name',$project->name,['class'=>'form-control','id'=>'title']) !!}
        </div> 
        <div class="form-group">
          <label for="author">Category</label>               
          {!! Form::select('category_id',$categories,$project->category_id,['class'=>'form-control','id'=>'author']) !!}       
        </div>   
        <div class="form-group">
          <label for="publisher">Started At</label>               
            {!! Form::text('started_at',$project->started_at,['class'=>'form-control','id'=>'title']) !!}
        </div>   
        <div class="form-group">
          <label for="publisher">Completed At</label>               
            {!! Form::text('completed_at',$project->completed_at,['class'=>'form-control','id'=>'title']) !!}
        </div>    
        <div class="form-group">
          <label for="publisher">Complete</label>               
            {!! Form::text('complete',$project->complete,['class'=>'form-control','id'=>'title']) !!}
        </div>                            
        <div class="form-group">
          <label for="isbn">url</label>
            {!! Form::text('url',$project->url,['class'=>'form-control','id'=>'isbn']) !!}
        </div>                                                                        
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('project_id',$project->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
