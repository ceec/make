@extends('layouts.layout')

@section('title')
@parent
ccmakesthings
@stop

@section('content')
	<div class="container">
	<!-- hardcoded one -->
		<br>
		<a href="/"><h1>CC Makes Things</h1></a>
		<br>

	@foreach($notes as $note)

        <pre>
            {{$note->note}}
        </pre>


	@endforeach
	</table>
	</div>

@endsection