@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing Note</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/note']) !!}
            <div class="form-group">
              <label for="title">title</label>
               {!! Form::text('title',$note->title,['class'=>'form-control','id'=>'title']) !!}
            </div>  
            <div class="form-group">
              <label for="note">Note</label>
               {!! Form::textarea('note',$note->note,['class'=>'form-control','id'=>'note']) !!}
            </div>                   
              
               {!! Form::hidden('note_id',$note->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
