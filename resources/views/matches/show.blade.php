@extends('layouts.app')

@section('content')
	<div class="cover cover-background" style="background-image: url(https://images7.alphacoders.com/446/thumb-1920-446471.png); height: 400px">
		<div class="overlay-dark"></div>
		<div class="cover-inner d-flex align-items-center">
			<div class="container d-flex align-items-center flex-column">
				<div class="d-flex align-items-center">
					<h1 class="text-dark-soft">{{ $match->teamOne()->name }}</h1>
					<div class="px-5">vs</div>
					<h1 class="text-dark-soft">{{ $match->teamTwo()->name }}</h1>
				</div>
			</div>
		</div>
	</div>
	<nav class="tabs-underlined centered">
		<a href="#match" class="tab active" data-toggle="tab">Match</a>
		<a href="#chat" class="tab" data-toggle="tab">Chat ({{ $match->comments->count() }})</a>
	</nav>
	<div class="container mt-5">
		<div class="col-md-8 offset-md-2">
			<div class="tab-content">
				<div class="tab-pane fade in show active" id="match">
					@include('matches.partials._match-info')
				</div>
				<div class="tab-pane fade in" id="chat">
					@include('matches.partials._match-chat')
				</div>
			</div>
		</div>
	</div>
@stop