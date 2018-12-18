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
          <label for="author">Author</label>               
          {!! Form::select('author_id',$authors,'',['class'=>'form-control','id'=>'author']) !!}       
        </div>   
        <div class="form-group">
          <label for="publisher">Publisher</label>               
          {!! Form::select('publisher_id',$publishers,'',['class'=>'form-control','id'=>'publisher']) !!}       
        </div>   
        <div class="form-group">
          <label for="type">Type</label>               
          {!! Form::select('type_id',$types,'',['class'=>'form-control','id'=>'type']) !!}       
        </div>   
        <div class="form-group">
          <label for="group">Group</label>               
          {!! Form::select('group_id',$groups,'',['class'=>'form-control','id'=>'group']) !!}       
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
