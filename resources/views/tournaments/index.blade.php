@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials.cover-index')
@endsection

@section('content')
	<div class="filter">
		<search-filter :data="{{ $platforms }}"></search-filter>
	</div>
	<div class="container" style="margin-top: 6rem">
		@if ($tournaments->count())
			<tournaments :data="{{ $tournaments }}"></tournaments>
		@else
			<p>Sorry, there are no Tournaments scheduled. Please check back later.</p>
		@endif
	</div>
@endsection