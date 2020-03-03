@extends('layouts.layout')

@section('title')
@parent
ccmakesthings - time
@stop

@section('content')
	<div class="container">
    <h2>Time</h2>
    <div class="row">
      <div class="col-md-1">
        <h4><strong>Denver</strong></h4>
      </div>
      <div class="col-md-1">
		    <h4>
<?php 
			date_default_timezone_set('America/Denver');
			print date('g:ia');
?>	
		    </h4>
	    </div>
      <div class="col-md-1">
        <h4>
        <?php print date('l'); ?>
        </h4>
      </div>
      <div class="col-md-9">
        <h4>
        <?php print date('F d, Y'); ?>
        </h4>
      </div>		
    </div>
    <hr>
    <div class="row">
      <div class="col-md-1">
      <h4><strong>Vilnius</strong></h4>
      </div>
      <div class="col-md-1">
        <h4>
<?php 
          date_default_timezone_set('Europe/Vilnius');
          print date('g:ia');
?>	
		    </h4>
	    </div>
      <div class="col-md-1">
        <h4>
        <?php print date('l'); ?>
        </h4>
      </div>	
      <div class="col-md-9">
        <h4>
        <?php print date('F d, Y'); ?>
        </h4>
      </div>		
    </div>
    <hr>
    <div class="row">
      <div class="col-md-1">
      <h4><strong>Tokyo</strong></h4>
      </div>
      <div class="col-md-1">
        <h4>
<?php 
          date_default_timezone_set('Asia/Tokyo');
          print date('g:ia');
?>	
        </h4>
      </div>
      <div class="col-md-1">
        <h4>
        <?php print date('l'); ?>
        </h4>
      </div>	
      <div class="col-md-9">
        <h4>
        <?php print date('F d, Y'); ?>
        </h4>
      </div>		
      </div>

@endsection