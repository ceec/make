@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$book->title}}</h1>
			{!! Form::open(['url' => '/home/edit/book']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>
            {!! Form::text('title',$book->title,['class'=>'form-control','id'=>'title']) !!}
        </div> 
        <div class="form-group">
          <label for="author">Author</label>               
          {!! Form::select('author_id',$authors,$book->author_id,['class'=>'form-control','id'=>'author']) !!}       
        </div>   
        <div class="form-group">
          <label for="publisher">Publisher</label>               
          {!! Form::select('publisher_id',$publishers,$book->publisher_id,['class'=>'form-control','id'=>'publisher']) !!}       
        </div>   
        <div class="form-group">
          <label for="type">Type</label>               
          {!! Form::select('type_id',$types,$book->type_id,['class'=>'form-control','id'=>'type']) !!}       
        </div>                   
        <div class="form-group">
          <label for="isbn">ISBN</label>
            {!! Form::text('isbn',$book->isbn,['class'=>'form-control','id'=>'isbn']) !!}
        </div>                                                                        
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('book_id',$book->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
