@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')

<style>
    .padding{
        padding: 20px;
    }
</style>
	<div class="container">
    <h3><a href="/">ccmakesthings</a></h3>
    <hr>
    <input type="text" placeholder="Search" id="search">
    <br><br>



                
                    @foreach($volumes as $volume)
                        <div style="background-color:orange" class="row">
       
                    			<div style="background-color:green" class="col-xs-6">
                    				<img class="img-fluid padding" src="/images/chelsea/doujin/{{$volume->id}}.jpg">
                    			</div>
                    			<div class="col-xs-6 padding">
                    				{{$volume->title_j}} {{$volume->title_e	}}<hr>
                    				{{$volume->pairing->name}}
                    			</div>

                        
                   

                            </div>
                            <hr>
                            
                    @endforeach
                </div>


		
		
	</div>

@endsection