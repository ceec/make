@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$store->store}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/store']) !!}

            <div class="form-group">
              <label for="store">Store</label>
               {!! Form::text('store',$store->store,['class'=>'form-control','id'=>'store']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">url</label>
               {!! Form::text('url',$store->url,['class'=>'form-control','id'=>'url']) !!}
            </div> 
                                                                       
               {!! Form::hidden('store_id',$store->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
