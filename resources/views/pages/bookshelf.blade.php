@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
	<div class="container">
    <h3>Bookshelf</h3>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>
    <div id="bookshelf"></div>
    <script>
        //Make an SVG Container
        var svgContainer = d3.select("#bookshelf").append("svg")
                              .attr("width", 1200)
                              .attr("height", 500);     

        var books = {'title2':'Becoming Dangerous','title':'Pin Hell','title3':'How to Read Water'};                  
    </script>
    
    <script>
      var x = 0;
      var textx = 0;
      for (const key in books) {
          console.log(books[key]);
        // if (books.hasOwnProperty(key)) {
        //   const element = books[key];
          
        // }
          //Draw the Rectangle
        var rectangle = svgContainer.append("rect")
                                    .attr("fill", 'white')
                                    .style("stroke", '#074886')
                                    .style("stroke-width", 2)
                                    .attr("x", x)
                                    .attr("y", 0)
                                    .attr("width", 40)
                                    .attr("height", 200);      



                                    x = x+40;
                                    
      }


for (const key in books) {
        var text = svgContainer.append('text').text(books[key])
                        .attr("x", textx+5)
                        .attr("y", 190)
                        .style("stroke", '#074886')       
                        .attr("transform", "rotate(90 200 "+textx+")")               
                        .attr("font-size", 18)
                        .attr('fill', 'black');

                        textx = textx+45;  
}

    
    </script>


	</div>

@endsection