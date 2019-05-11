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
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">{{$mineral->name}} <small class="pull-right">{!! $mineral->formula !!}</small></h3>
                </div>
                <div class="panel-body">
                <a href="rocks/{{$mineral->name}}"><img class="img-responsive" src="/images/rocks/{{$mineral->image[0]}}"></a>
                </div>
              </div>
            </div>
            @endforeach
        </div>            
    @endforeach   
  
    </div>
</div>

@endsection