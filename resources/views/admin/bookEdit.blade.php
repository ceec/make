@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$volume->title_e}}</h1>
			{!! Form::open(['url' => '/home/edit/book']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="price">Group</label>               
          {!! Form::select('group_id',$groups,$volume->group_id,['class'=>'','id'=>'content']) !!}       
        </div>          
        <div class="form-group">
          <label for="name">Volume</label>
            {!! Form::text('volume',$volume->volume,['class'=>'form-control','id'=>'name']) !!}
        </div>       
        <div class="form-group">
          <label for="name">English Title</label>
            {!! Form::text('title_e',$volume->title_e,['class'=>'form-control','id'=>'name']) !!}
        </div>                       
        <div class="form-group">
          <label for="name">Japanese Title</label>
            {!! Form::text('title_j',$volume->title_j,['class'=>'form-control','id'=>'name']) !!}
        </div> 
        <div class="form-group">
          <label for="name">Date Published</label>
            {!! Form::date('published_date',$volume->published_date,['class'=>'form-control','id'=>'name']) !!}
        </div>                                        
        <div class="form-group">
          <label for="name">ISBN</label>
            {!! Form::text('isbn',$volume->isbn,['class'=>'form-control','id'=>'name']) !!}
        </div>                                     
        <div class="form-group">
          <label for="price">Price</label>
            {!! Form::number('original_price',$volume->original_price,['class'=>'form-control','id'=>'price']) !!}
        </div>                                                                       
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('volume_id',$volume->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
