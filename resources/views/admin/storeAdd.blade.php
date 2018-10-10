@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Store</h1>
    
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
			{!! Form::open(['url' => '/add/store']) !!}     
            <div class="form-group">
              <label for="store">Store</label>
               {!! Form::text('store','',['class'=>'form-control','id'=>'store']) !!}
            </div>                                     
            <div class="form-group">
              <label for="name">url</label>
               {!! Form::text('url','',['class'=>'form-control','id'=>'url']) !!}
            </div>   
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
