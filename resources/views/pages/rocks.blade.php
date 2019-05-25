@extends('layouts.layout')

@section('title')
@parent
Rocks
@stop

@section('content')
<style>
    .row {
        margin-bottom: 15px;
    }
</style>
<div class="container">
    <div class="row">
        <h2>Rocks</h2>
    @foreach (array_chunk($items->getCollection()->all(),3) as $row)        
        <div class="row">
            @foreach ($row as $key => $item)
            <div class="col-md-4">
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">{{$item->name}}</h3>
                </div>
                <div class="panel-body">
                <img class="img-fluid" src="/images/rocks/{{$item->image}}"><br>
                {{$item->source_location}}<br>
                {{$item->buy_location}}
                </div>
              </div>
            </div>
            @endforeach
        </div>            
    @endforeach   
  
    </div>
</div>

@endsection