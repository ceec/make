@extends('layouts.layout')

@section('title')
@parent
Wordcount
@stop

@section('content')
<div class="container">
    <br>
    <a href="/"><h1>CC Makes Things</h1></a>
    <div class="row">
        <h4>Words Per Day - {{$total}} total words</h4>

<script src="https://d3js.org/d3.v4.min.js"></script>
<script>
 var width = 960,
    height = 136,
    cellSize = 17;

var color = d3.scaleQuantize()
    .domain([200, 219])
    .range(["#a50026", "#d73027", "#f46d43", "#fdae61", "#fee08b", "#ffffbf", "#d9ef8b", "#a6d96a", "#66bd63", "#1a9850", "#006837"]);

//this one goes backwards 2017 to 2000
//http://bl.ocks.org/eesur/5fbda7f410d31da35e42

var svg = d3.select("body")
  .selectAll("svg")
  .data(d3.range(2002, 2019))
  .enter().append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + ((width - cellSize * 53) / 2) + "," + (height - cellSize * 7 - 1) + ")");

svg.append("text")
    .attr("transform", "translate(-6," + cellSize * 3.5 + ")rotate(-90)")
    .attr("font-family", "sans-serif")
    .attr("font-size", 10)
    .attr("text-anchor", "middle")
    .text(function(d) { return d; });

var rect = svg.append("g")
    .attr("fill", "none")
    .attr("stroke", "#ccc")
  .selectAll("rect")
  .data(function(d) { return d3.timeDays(new Date(d, 0, 1), new Date(d + 1, 0, 1)); })
  .enter().append("rect")
    .attr("width", cellSize)
    .attr("height", cellSize)
    .attr("x", function(d) { return d3.timeWeek.count(d3.timeYear(d), d) * cellSize; })
    .attr("y", function(d) { return d.getDay() * cellSize; })
    .datum(d3.timeFormat("%Y-%m-%d"));

svg.append("g")
    .attr("fill", "none")
    .attr("stroke", "#000")
  .selectAll("path")
  .data(function(d) { return d3.timeMonths(new Date(d, 0, 1), new Date(d + 1, 0, 1)); })
  .enter().append("path")
    .attr("d", pathMonth);


//load from JSON instead of CSV - 2017-08-08
d3.json("/data/words", function(error,json) {
   if (error) throw error;

  var data = d3.nest()
      .key(function(d) { return d.updated; })
      .rollup(function(d) { 

        //console.log(d);
        return d[0].document_id; })
    .object(json);


  rect.filter(function(d) { return d in data; })
      //.attr("fill", "#a50026")
          .attr("fill", function(d) { 
            //change the color based on the data[d] -> document id
            return color(data[d]); })
    .append("title")
      .text(function(d) { 
        return d + ": " + data[d]; });

});



function pathMonth(t0) {
  var t1 = new Date(t0.getFullYear(), t0.getMonth() + 1, 0),
      d0 = t0.getDay(), w0 = d3.timeWeek.count(d3.timeYear(t0), t0),
      d1 = t1.getDay(), w1 = d3.timeWeek.count(d3.timeYear(t1), t1);
  return "M" + (w0 + 1) * cellSize + "," + d0 * cellSize
      + "H" + w0 * cellSize + "V" + 7 * cellSize
      + "H" + w1 * cellSize + "V" + (d1 + 1) * cellSize
      + "H" + (w1 + 1) * cellSize + "V" + 0
      + "H" + (w0 + 1) * cellSize + "Z";
}
    
</script>
  
    </div>
</div>
@endsection
