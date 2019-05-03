@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Book</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/book']) !!}    
    <div class="row">
    	<div class="col-md-6">       
        <div class="form-group">
          <label for="title">Title</label>
            {!! Form::text('title','',['class'=>'form-control','id'=>'title']) !!}
        </div>                           
        <div class="form-group">
          <label for="isbn">ISBN</label>
            {!! Form::text('isbn','',['class'=>'form-control','id'=>'isbn']) !!}
        </div>                                                                                           
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
