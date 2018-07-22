@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Purchase</h1>
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {!! Form::open(['url' => '/home/add/volume']) !!}    
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="price">Group</label>               
          {!! Form::select('group_id',$groups,'',['class'=>'','id'=>'content']) !!}       
        </div>          
        <div class="form-group">
          <label for="name">Volume</label>
            {!! Form::text('volume','',['class'=>'form-control','id'=>'name']) !!}
        </div>       
        <div class="form-group">
          <label for="name">English Title</label>
            {!! Form::text('title_e','',['class'=>'form-control','id'=>'name']) !!}
        </div>                       
        <div class="form-group">
          <label for="name">Japanese Title</label>
            {!! Form::text('title_j','',['class'=>'form-control','id'=>'name']) !!}
        </div> 
        <div class="form-group">
          <label for="name">Date Published</label>
            {!! Form::date('published_date','',['class'=>'form-control','id'=>'name']) !!}
        </div>                                        
        <div class="form-group">
          <label for="name">ISBN</label>
            {!! Form::text('isbn','',['class'=>'form-control','id'=>'name']) !!}
        </div>                                     
        <div class="form-group">
          <label for="price">Price</label>
            {!! Form::number('original_price','',['class'=>'form-control','id'=>'price']) !!}
        </div>                                                                       
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
</div>


@endsection
