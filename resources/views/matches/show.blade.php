@extends('layouts.app')

@section('content')
	<div class="cover cover-background" style="height: 300px">
		<div class="cover-inner align-items-center">
			<div class="container">
				<h1 class="text-light">Match</h1>
				<h4 class="d-flex flex-column flex-md-row">
					<a href="{{ route('teams.show', [$tournament, $match->teamOne()]) }}" class="text-dark-muted">{{ $match->teamOne()->name }}</a> 
					<span class="px-3 text-light">vs</span> 
					<a href="{{ route('teams.show', [$tournament, $match->teamTwo()]) }}" class="text-dark-muted">{{ $match->teamTwo()->name }}</a>
				</h4>
			</div>
		</div>
	</div>
	<section class="clears-nav container">
		<div class="alert alert-info mb-5">
			<strong>Note:</strong>
			This page requires a UI update.
		</div>
		<section class="content-block">
			<h3 class="mb-2">Match Information</h3>
			<p>This Match is for the <a href="#">{{ $tournament->name }}</a> Competition</p>
		</section>
		<section class="content-block">
			<table class="table">
				<tr>
					<th>Match ID</th>
					<td>#{{ $match->id }}</td>
				</tr>
				<tr>
					<th>Opened at</th>
					<td>{{ $match->created_at->diffForHumans() }}</td>
				</tr>
				<tr>
					<th>Status</th>
					<td>Scheduled</td>
				</tr>
			</table>

			<p>Finished your match?</p>
			<a href="#" class="btn btn-sm btn-danger">Report Scores</a>
		</section>
		<section class="content-block" style="padding-top: 5rem">
			<div class="row mb-0">
				@foreach($match->teamOne()->users as $player)
					<div class="col-md-3 d-flex justify-content-center">
						<div class="team-card">
							<div class="team-card-image" style="position: relative;">
								<img src="https://static.pexels.com/photos/37836/silhouette-fitness-bless-you-bike-37836.jpeg" style="max-width:100%; height: 230px">
								<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">2 - 0</span>
							</div>
							<div class="team-card-body">
								<h5 class="mb-0"><a href="#">{{ $player->username }}</a></h5>
								<p class="mb-0">ThompoNZ</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="p-5 flex justify-content-center">
				<h3 class="py-4">Versus</h3>
			</div>
			<div class="row pt-4">
				@foreach($match->teamTwo()->users as $player)
					<div class="col-md-3 d-flex justify-content-center">
						<div class="team-card">
							<div class="team-card-image" style="position: relative;">
								<img src="https://static.pexels.com/photos/37836/silhouette-fitness-bless-you-bike-37836.jpeg" style="max-width:100%; height: 230px">
								<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">2 - 0</span>
							</div>
							<div class="team-card-body">
								<h5 class="mb-0"><a href="#">{{ $player->username }}</a></h5>
								<p class="mb-0">ThompoNZ</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</section>
	</section>
@stop