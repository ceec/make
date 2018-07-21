@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Group</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/group']) !!}    
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>               
          {!! Form::text('title','',['class'=>'form-control','id'=>'name']) !!}      
        </div>          
        <div class="form-group">
          <label for="project">Author</label>
          {!! Form::select('author_id', $authors,'' ,['class'=>'form-control', 'id'=>'project','placeholder' => 'Author']) !!} 
        </div>     
        <div class="form-group">
          <label for="project">Publisher</label>
          {!! Form::select('publisher_id', $publishers,'' ,['class'=>'form-control', 'id'=>'project','placeholder' => 'Publisher']) !!} 
        </div>            
        <div class="form-group">
          <label for="project">Type</label>
          {!! Form::select('type_id', $types,'' ,['class'=>'form-control', 'id'=>'project','placeholder' => 'Type']) !!} 
        </div>                                                                                           
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
