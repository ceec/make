@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$publisher->name}}</h1>
			{!! Form::open(['url' => '/home/edit/publisher']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>               
          {!! Form::text('name',$publisher->name,['class'=>'form-control','id'=>'name']) !!}      
        </div>                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('publisher_id',$publisher->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
