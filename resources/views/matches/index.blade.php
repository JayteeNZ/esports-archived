@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<section class="content-block">
			<h3 class="mb-5">Matches</h3>
			
			<div class="row">
				@foreach($tournament->matches()->where('team_one_id', '!=', null)->where('team_two_id', '!=', null)->get() as $match)
				<div class="col-md-8">
					<div class="match">
						<div class="match-content">
							<div class="match-team">
								<a href="{{ route('teams.show', [$tournament, $match->teamOne()]) }}">{{ $match->teamOne()->name }}</a>
							</div>
							<div class="match-data">
								<div class="scores">
									<span>2</span>
									<span>:</span>
									<span>1</span>
								</div>
							</div>
							<div class="match-team">
								<a href="{{ route('teams.show', [$tournament, $match->teamTwo()]) }}">{{ $match->teamTwo()->name }}</a>
							</div>
						</div>
						<div class="match-actions">
							<div class="status">Scheduled</div>
							<div class="round">Round {{ $match->round }}</div>
							<div class="view ml-auto"><a href="{{ route('matches.show', [$tournament, $match]) }}">View Match</a></div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</section>
	</div>
@stop