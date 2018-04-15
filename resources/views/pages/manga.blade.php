@extends('layouts.layout')



@section('content')
<div class="container">
        <h2>Manga</h2>
        @foreach($mangas as $manga)
            {{$manga->title}}<br>
                
            @foreach ($manga->volumes()->get() as $volume)
                <canvas  width="40" height="40" id="myCanvas-{{$volume->id}}"></canvas>

                @if ($volume->have == 1)
                    <script>
                    var have = 1;
                    </script>
                @else
                    <script>
                    var have = 0;
                    </script>
                @endif

                <script>
                    var volume = <?php print $volume->volume; ?>
                </script>

                <script>
                    var c=document.getElementById("myCanvas-<?php print $volume->id; ?>");
                    var ctx=c.getContext("2d");

                    if (have == 1) {
                        ctx.fillStyle = 'green';
                    } else {
                       ctx.fillStyle = 'white';
                    }

                    
                     ctx.fillRect(20,20,20,20);
                     ctx.strokeRect(20,20,20,20);
                     ctx.stroke();

                    ctx.fillStyle = "black";
                    ctx.font = "10px serif";
                    ctx.fillText(volume,24,15);                
                </script>

                
            @endforeach
            <br>
        @endforeach
        <h2>Art Books</h2>
        @foreach($artbooks as $artbook)
            {{$artbook->title}}<br>
            @foreach ($artbook->volumes()->get() as $volume)
                <canvas  width="40" height="40" id="myCanvas-{{$volume->id}}"></canvas>

                @if ($volume->have == 1)
                    <script>
                    var have = 1;
                    </script>
                @else
                    <script>
                    var have = 0;
                    </script>
                @endif

                <script>
                    var volume = <?php print $volume->volume; ?>
                </script>

                <script>
                    var c=document.getElementById("myCanvas-<?php print $volume->id; ?>");
                    var ctx=c.getContext("2d");

                    if (have == 1) {
                        ctx.fillStyle = 'green';
                    } else {
                       ctx.fillStyle = 'white';
                    }

                    
                     ctx.fillRect(20,20,20,20);
                     ctx.strokeRect(20,20,20,20);
                     ctx.stroke();

                    ctx.fillStyle = "black";
                    ctx.font = "10px serif";
                    ctx.fillText(volume,24,15);                
                </script>

                
            @endforeach    
            <br>        
        @endforeach        
</div>
@endsection
