@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Blog Post</h1>
    
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
			{!! Form::open(['url' => '/add/blog']) !!}
            <div class="form-group">
              <label for="project">Project</label>
              {!! Form::select('project_id', $projects,'' ,['class'=>'form-control', 'id'=>'project','placeholder' => 'Project']) !!} 
            </div>
            <div class="form-group">
              <label for="japanese-name">Started At</label>
               {!! Form::text('started_at','',['class'=>'form-control','id'=>'title']) !!}
            </div>   
            <div class="form-group">
              <label for="japanese-name">Completed At</label>
               {!! Form::text('completed_at','',['class'=>'form-control','id'=>'title']) !!}
            </div>                           
            <div class="form-group">
              <label for="japanese-name">Title</label>
               {!! Form::text('title','',['class'=>'form-control','id'=>'title']) !!}
            </div>                            
            <div class="form-group">
              <label for="s-name">Content</label>
               {!! Form::textarea('text','',['class'=>'form-control','id'=>'content']) !!}
            </div>                 
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
