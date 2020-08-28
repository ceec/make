@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add Album</h1>
    
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
			{!! Form::open(['url' => '/home/add/album']) !!}     
            <div class="form-group">
              <label for="store">Name</label>
               {!! Form::text('name','',['class'=>'form-control','id'=>'name']) !!}
            </div>                                      
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
