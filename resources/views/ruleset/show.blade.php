@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<section class="content-block">
			{!! $tournament->ruleset->content !!}
		</section>

		<section class="content-block">
			<h3></h3>
		</section>
	</div>
@stop