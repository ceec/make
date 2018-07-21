@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$author->name}}</h1>
			{!! Form::open(['url' => '/home/edit/author']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>               
          {!! Form::text('name',$author->name,['class'=>'form-control','id'=>'name']) !!}      
        </div>                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('author_id',$author->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
