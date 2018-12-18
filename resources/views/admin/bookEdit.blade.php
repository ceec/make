@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editing {{$book->title}}</h1>
			{!! Form::open(['url' => '/home/edit/book']) !!}
    <div class="row">
    	<div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>
            {!! Form::text('title',$book->title,['class'=>'form-control','id'=>'title']) !!}
        </div> 
        <div class="form-group">
          <label for="author">Author</label>               
          {!! Form::select('author_id',$authors,$book->author_id,['class'=>'form-control','id'=>'author']) !!}       
        </div>   
        <div class="form-group">
          <label for="publisher">Publisher</label>               
          {!! Form::select('publisher_id',$publishers,$book->publisher_id,['class'=>'form-control','id'=>'publisher']) !!}       
        </div>   
        <div class="form-group">
          <label for="type">Type</label>               
          {!! Form::select('type_id',$types,$book->type_id,['class'=>'form-control','id'=>'type']) !!}       
        </div>  
        <div class="form-group">
          <label for="group">Group</label>               
          {!! Form::select('group_id',$groups,$book->group_id,['class'=>'form-control','id'=>'group']) !!}       
        </div>                  
        <div class="form-group">
          <label for="isbn">ISBN</label>
            {!! Form::text('isbn',$book->isbn,['class'=>'form-control','id'=>'isbn']) !!}
        </div>                                                                        
      </div>
      <div class="col-md-6"> 
        <div class="form-group">
          <label for="original_price">Original Price</label>
            {!! Form::text('original_price',$book->original_price,['class'=>'form-control','id'=>'original_price']) !!}
        </div>  
        <div class="form-group">
          <label for="date_acquired">Date Acquired</label>
            {!! Form::date('date_acquired',$book->date_acquired,['class'=>'form-control','id'=>'date_acquired']) !!}
        </div> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="edition">Edition</label>
                {!! Form::text('edition',$book->edition,['class'=>'form-control','id'=>'edition']) !!}
            </div>             
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="edition_date">Edition Date</label>
                {!! Form::date('edition_date',$book->edition_date,['class'=>'form-control','id'=>'edition_date']) !!}
            </div>             
          </div>          
        </div> 
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="price_yen">Price Yen</label>
                  {!! Form::number('price_yen',$book->price_yen,['class'=>'form-control','id'=>'price_yen']) !!}
              </div>                
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="price_usd">Price USD</label>
                  {!! Form::text('price_usd',$book->price_usd,['class'=>'form-control','id'=>'price_usd']) !!}
              </div>               
            </div>
        </div> 
        <div class="form-group">
          <label for="location">Location Bought</label>
            {!! Form::text('location',$book->location,['class'=>'form-control','id'=>'location']) !!}
        </div>                                                        
      </div>
   	</div>                                                   
      {!! Form::hidden('book_id',$book->id) !!}                                                                       
      {!! Form::submit('Edit') !!}
      {!! Form::close() !!}
			


</div>


@endsection
