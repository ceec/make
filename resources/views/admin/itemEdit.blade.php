@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing Item (Rock)</h1>
    <h2><a href="/home/item/list">Items List</a></h2>

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/home/edit/item']) !!}
            <div class="form-group">
              <label for="title">Name</label>
               {!! Form::text('name',$item->name,['class'=>'form-control','id'=>'name']) !!}
            </div>  
            <div class="form-group">
              <label for="image">Image</label>
               {!! Form::text('image',$item->image,['class'=>'form-control','id'=>'image']) !!}
            </div>                   
              
               {!! Form::hidden('item_id',$item->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
