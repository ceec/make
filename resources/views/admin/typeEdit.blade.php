@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$type->name}}</h1>
			{!! Form::open(['url' => '/home/edit/type']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Type</label>               
          {!! Form::text('type',$type->type,['class'=>'form-control','id'=>'type']) !!}      
        </div>                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('type_id',$type->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
