@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Type</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/type']) !!}    
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="type">Type</label>               
          {!! Form::text('type','',['class'=>'form-control','id'=>'type']) !!}      
        </div>                                                                                                  
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
