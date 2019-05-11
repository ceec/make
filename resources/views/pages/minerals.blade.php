@extends('layouts.layout')

@section('title')
@parent
Rocks
@stop

@section('content')

@section('content')
<div class="container">
    <div class="row">
    @foreach (array_chunk($minerals->getCollection()->all(),3) as $row)   
        <div class="row">
            @foreach ($row as $key => $mineral)         
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <a href="rocks/{{$mineral->name}}"><img class="img-responsive" src="/images/rocks/{{$mineral->image[0]}}"></a>
                <div class="card-body">
                  <h5 class="card-title">{{$mineral->name}} <small class="pull-right">{!! $mineral->formula !!}</small></h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>            
            </div>
            @endforeach
        </div>            
    @endforeach   
  
    </div>
</div>

@endsection