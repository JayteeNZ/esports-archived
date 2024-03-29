@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<section class="content-block">
			<h3>Teams</h3>
			<p>There are {{ $tournament->teams->count() }} team(s) participating in this Tournament</p>
		</section>

		<section class="content-block">
			<div class="row">
				@foreach($tournament->teams as $team)
				<div class="col-md-3 d-flex justify-content-center">
					<div class="team-card">
						<div class="team-card-image" style="position: relative;">
							<img src="/images/default-avatar.png" style="width:100%; height: 230px">
						</div>
						<div class="team-card-body">
							<h5 class="mb-0"><a href="{{ route('teams.show', [$tournament, $team]) }}">{{ $team->name }}</a></h5>
							<p class="mb-0">{{ $team->users->count() }} Members</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</section>
	</div>
@stop