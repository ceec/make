@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$purchase->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/purchase']) !!}

            <div class="form-group">
              <label for="japanese-name">Name</label>
               {!! Form::text('name',$purchase->name,['class'=>'form-control','id'=>'title']) !!}
            </div>                  
            <div class="form-group">
              <label for="s-name">Text</label>
               {!! Form::text('price',$purchase->price,['class'=>'form-control','id'=>'content']) !!}
            </div>    
              {!! Form::select('store_id',$stores,$purchase->store_id,['class'=>'','id'=>'content']) !!}   <br>
              {!! Form::select('project_id',$projects,$purchase->project_id,['class'=>'','id'=>'content']) !!}        <br>
                                                                       
               {!! Form::hidden('purchase_id',$purchase->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
