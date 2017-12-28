@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-12">

                <div class="row">
                    <?php $x=1; ?>
                    @foreach($volumes as $volume)
                    	<div class="col-md-4">
                    		<div class="row">
                    			<div class="col-md-8">
                    				<img class="img-fluid" src="/images/chelsea/doujin/{{$volume->id}}.jpg">
                    			</div>
                    			<div class="col-md-4">
                    				{{$volume->title_j}} {{$volume->title_e	}}<br>
                    			</div>
                    		</div>
                        
                        </div>
                        <?php
                            if ($x%4==0) {
?>
                            </div>
                            <div class="row">
<?php                            
                            }
                            $x++;
                        ?>
                    @endforeach
                </div>


        </div>
    </div>
		
		
	</div>

@endsection