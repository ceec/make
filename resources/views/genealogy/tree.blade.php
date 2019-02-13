@extends('layouts.layout')



@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>

<div class="container">
  <h2>Tree</h2>
  <div id="tree"></div>
  <script>
  //Make an SVG Container
                      var svgContainer = d3.select("#tree").append("svg")
                                                         .attr("width", 1200)
                                                         .attr("height", 500);


  var starty = 0;
  var startx = 0;
</script>
  @foreach($people as $person)
    {{$person->first_name}} {{$person->last_name}}<br>
    <div id="person"></div>
    <script>
      var firstName = '<?php print $person->first_name; ?>';
    </script>
    <script>
      //Draw the Rectangle
      var rectangle = svgContainer.append("rect")
                                  .attr("fill", 'white')
                                  .style("stroke", '#074886')
                                  .style("stroke-width", 1)
                                  .attr("x", startx)
                                  .attr("y", starty)
                                  .attr("width", 100)
                                  .attr("height", 40);

      var text = svgContainer.append('text').text(firstName)
                      .attr("x", startx+5)
                      .attr("y", starty+25)
                      .style("stroke", '#074886')                      
                      .attr("font-size", 13)
                      .attr('fill', 'black');

    startx += 120;
      
    </script>
    
  @endforeach
</div>
@endsection
