@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing Mineral</h1>
    <h2><a href="/home/mineral/list">Minerals List</a></h2>

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/home/edit/mineral']) !!}
            <div class="form-group">
              <label for="title">Name</label>
               {!! Form::text('name',$mineral->name,['class'=>'form-control','id'=>'name']) !!}
            </div>  
            <div class="form-group">
              <label for="formula">Formula</label>
               {!! Form::text('formula',$mineral->formula,['class'=>'form-control','id'=>'formula']) !!}
            </div>                   
              
               {!! Form::hidden('mineral_id',$mineral->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
