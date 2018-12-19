@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$group->title}}</h1>
			{!! Form::open(['url' => '/home/edit/group']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>               
          {!! Form::text('title',$group->title,['class'=>'form-control','id'=>'name']) !!}      
        </div>          
        <div class="form-group">
          <label for="project">Author</label>
          {!! Form::select('author_id', $authors,$group->author_id,['class'=>'form-control', 'id'=>'project','placeholder' => 'Author']) !!} 
        </div>     
        <div class="form-group">
          <label for="project">Publisher</label>
          {!! Form::select('publisher_id', $publishers,$group->publisher_id,['class'=>'form-control', 'id'=>'project','placeholder' => 'Publisher']) !!} 
        </div>            
        <div class="form-group">
          <label for="project">Type</label>
          {!! Form::select('type_id', $types,$group->type_id,['class'=>'form-control', 'id'=>'project','placeholder' => 'Type']) !!} 
        </div>   
        <div class="form-group">
          <label for="url">url</label>               
          {!! Form::text('url',$group->url,['class'=>'form-control','id'=>'url']) !!}      
        </div>                                                                                
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('group_id',$group->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
