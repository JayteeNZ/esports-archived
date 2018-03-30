@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<h3 class="mb-3">Brackets</h3>
		@if (!$tournament->hasCommenced())
			<p>Brackets will be available once the competitition has commenced.</p>
		@else
			@foreach($brackets as $bracket)
				<section class="content-block">
					<iframe src="http://parallel.challonge.com/{{ $bracket->url }}/module?theme=5245" width="100%" height="500" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
					<a href="http://parallel.challonge.com/{{ $bracket->url }}" target="_blank">View on Challonge website</a>
				</section>
			@endforeach
		@endif
	</div>
@stop