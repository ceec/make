@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$q->title}}</h1>
			{!! Form::open(['url' => '/home/edit/queue']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>               
          {!! Form::text('title',$q->title,['class'=>'form-control','id'=>'type']) !!}      
        </div>   
        <div class="form-group">
          <label for="url">Why</label>               
          {!! Form::text('why',$q->why,['class'=>'form-control','id'=>'url']) !!}      
        </div>  
        <div class="form-group">
          <label for="url">Type Id</label>               
          {!! Form::text('type_id',$q->type_id,['class'=>'form-control','id'=>'url']) !!}      
        </div>       
        <div class="form-group">
          <label for="url">Reccomended by</label>               
          {!! Form::text('reccomended_by',$q->reccomended_by,['class'=>'form-control','id'=>'url']) !!}      
        </div>                                                                                                    
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('queue_id',$q->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
