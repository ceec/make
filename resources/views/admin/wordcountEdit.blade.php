@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Wordcount</h1>
			{!! Form::open(['url' => '/home/wordcount/update']) !!}
    <div class="row">
    	<div class="col-md-6">
         <select class="form-control" name="document_id">
  @foreach ($alldocuments as $document)

  <?php

    //hacking because i dont know the right way
    $test = json_decode($document->count,true);


    // print '<pre>';
    // print_r($test);
    // print '</pre>';
  ?>
    <option value="{{$document->id}}">{{$document->name}} -- {{$test['count']}} -- {{$test['updated_at']}}</option>
  @endforeach
   	  </div>                                                   
    {{ Form::text('wordcount', null, array('class'=>'input-block-level', 'placeholder'=>'Words')) }}
 
    {{ Form::submit('Save', array('class'=>'btn btn-large btn-primary btn-block'))}}
      {!! Form::close() !!}
			

  </div>
</div>


@endsection
