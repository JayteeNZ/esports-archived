@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<section class="content-block">
			@foreach($tournament->ruleset->sections as $section)
				<section id="section-{{ $section->id }}">
					<h3>{{ $section->title }}</h3>
					{!! $section->content !!}
				</section>
			@endforeach
		</section>

		<section class="content-block">
			<h3></h3>
		</section>
	</div>
@stop