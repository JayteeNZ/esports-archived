@extends('layouts.app')

@section('content')
	@include('teams.partials._team-header')

	<nav class="tabs-underlined centered">
		<a href="#roster" class="tab active" data-toggle="tab">Roster</a>
		<a href="#matches" class="tab" data-toggle="tab">Matches</a>
		@if (auth()->check())
			@if ($team->leader()->id == auth()->user()->id)
				<a href="#edit" class="tab" data-toggle="tab">Edit team</a>
			@elseif ($team->findMember(auth()->user()))
				<a href="#edit" class="tab" data-toggle="tab">Leave team</a>
			@endif
		@endif
	</nav>

	<div class="container" style="padding-top: 5rem">
		<div class="tab-content">
			<div class="tab-pane fade in show active" id="roster">
				@include('teams.partials._roster')
			</div>
			<div class="tab-pane fade" id="matches">
				@include('teams.partials._matches')
			</div>
			@if (auth()->check())
				@if ($team->findMember(auth()->user()))
					<div class="tab-pane fade" id="edit">
						@include('teams.partials._team-manager')
					</div>
				@endif
			@endif
		</div>
	</div>
@stop

