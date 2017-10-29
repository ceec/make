@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$blog->title}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/blog']) !!}

            <div class="form-group">
              <label for="japanese-name">Name</label>
               {!! Form::text('name',$blog->name,['class'=>'form-control','id'=>'title']) !!}
            </div>                  
            <div class="form-group">
              <label for="s-name">Text</label>
               {!! Form::textarea('text',$blog->text,['class'=>'form-control','id'=>'content']) !!}
            </div>    
              
               {!! Form::hidden('blog_id',$blog->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
