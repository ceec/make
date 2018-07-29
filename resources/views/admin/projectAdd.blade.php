@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Project</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/project']) !!}    
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="name">Project</label>               
          {!! Form::text('name','',['class'=>'form-control','id'=>'name']) !!}      
        </div> 
        <div class="form-group">
          <label for="name">Url</label>               
          {!! Form::text('url','',['class'=>'form-control','id'=>'name']) !!}      
        </div>         
        <div class="form-group">
          <label for="author">Category</label>               
          {!! Form::select('category_id',$categories,'',['class'=>'form-control','id'=>'author']) !!}       
        </div>                                                                                                            
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
