@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Note Post</h1>
    
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
			{!! Form::open(['url' => '/add/note']) !!}                          
            <div class="form-group">
              <label for="note">Note</label>
               {!! Form::textarea('note','',['class'=>'form-control','id'=>'note']) !!}
            </div>                 
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
