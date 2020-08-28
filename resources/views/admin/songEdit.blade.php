@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$song->name}}</h1>
			{!! Form::open(['url' => '/home/edit/song']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Name</label>               
          {!! Form::text('name',$song->name,['class'=>'form-control','id'=>'name']) !!}      
        </div> 
        <div class="form-group">
          <label for="title">Artist</label>               
          {!! Form::text('artist_id',$song->artist_id,['class'=>'form-control','id'=>'name']) !!}      
        </div> 
        <div class="form-group">
          <label for="title">Album</label>               
          {!! Form::text('album_id',$song->album_id,['class'=>'form-control','id'=>'name']) !!}      
        </div> 
        <div class="form-group">
          <label for="title">Track</label>               
          {!! Form::text('track',$song->track,['class'=>'form-control','id'=>'name']) !!}      
        </div> 
        <div class="form-group">
          <label for="title">Length</label>               
          {!! Form::text('length',$song->length,['class'=>'form-control','id'=>'name']) !!}      
        </div>         
        <div class="form-group">
          <label for="title">Plays</label>               
          {!! Form::text('plays',$song->plays,['class'=>'form-control','id'=>'name']) !!}      
        </div>                                                                                                                 
      </div>
      <div class="col-md-6"> 
      </div>
   	</div>                                                   
      {!! Form::hidden('song_id',$song->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
