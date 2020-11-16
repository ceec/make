@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Q</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/queue']) !!}    
    <div class="row">
    	<div class="col-md-6">        
        <div class="form-group">
          <label for="name">Title</label>
            {!! Form::text('title','',['class'=>'form-control','id'=>'name']) !!}
        </div>       
        <div class="form-group">
          <label for="name">Why</label>
            {!! Form::text('why','',['class'=>'form-control','id'=>'name']) !!}
        </div>                       
        <div class="form-group">
          <label for="name">Type</label>
            {!! Form::text('type_id','',['class'=>'form-control','id'=>'name']) !!}
        </div> 
        <div class="form-group">
          <label for="name">Reccomended By</label>
            {!! Form::text('reccomended_by','',['class'=>'form-control','id'=>'name']) !!}
        </div>                                                                                                            
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
