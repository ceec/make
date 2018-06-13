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
    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/add/purchase']) !!}     
            <div class="form-group">
              <label for="name">name</label>
               {!! Form::text('name','',['class'=>'form-control','id'=>'name']) !!}
            </div>                                     
            <div class="form-group">
              <label for="price">Price</label>
               {!! Form::number('price','',['class'=>'form-control','id'=>'price']) !!}
            </div>      
              {!! Form::select('store_id',$stores,'',['class'=>'','id'=>'content']) !!}   <br>
              {!! Form::select('project_id',$projects,'',['class'=>'','id'=>'content']) !!}        <br>
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
