@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials.cover-index')
@endsection

@section('content')
	<div class="filter">
		<search-filter :data="{{ $platforms }}"></search-filter>
	</div>
	<div class="container">
		<tournaments :data="{{ $tournaments }}"></tournaments>
	</div>
@endsection