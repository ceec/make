@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$album->name}}</h1>
			{!! Form::open(['url' => '/home/edit/album']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>               
          {!! Form::text('name',$album->name,['class'=>'form-control','id'=>'name']) !!}      
        </div>                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('album_id',$album->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
