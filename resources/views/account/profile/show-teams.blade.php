@extends('layouts.app')

@section('page-header')
	@include('account.profile._header')
@stop

@section('content')
	<div class="container">
		<div class="row">
			@foreach($user->teams as $team)
			<div class="col-md-3 d-flex justify-content-center">
				<div class="team-card">
					<div class="team-card-image" style="position: relative;">
						<img src="https://static.pexels.com/photos/37836/silhouette-fitness-bless-you-bike-37836.jpeg" style="max-width:100%; height: 230px">
						<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">2 - 0</span>
					</div>
					<div class="team-card-body">
						<h5 class="mb-0"><a href="{{ route('teams.show', [$team->tournament, $team]) }}">{{ $team->name }}</a></h5>
						<p class="mb-0">{{ $team->users->count() }} Members</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@stop