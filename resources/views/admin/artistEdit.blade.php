@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$artist->name}}</h1>
			{!! Form::open(['url' => '/home/edit/artist']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>               
          {!! Form::text('name',$artist->name,['class'=>'form-control','id'=>'name']) !!}      
        </div>                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('artist_id',$artist->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
