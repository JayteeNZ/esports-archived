@extends('layouts.app')

@section('content')
	<div class="team__cover" style="margin-top: 70px; background: #1f2532; height: 300px; display: flex; align-items: center">
		<div class="container">
			<h1 style="color: #fff">{{ $team->name }}</h1>
			<div class="text-light-muted">
				<a href="#">{{ $tournament->name }}</a> on 
				<a href="#">{{ $tournament->platform->name }}</a>
			</div>
		</div>
	</div>

	<nav class="tabs-underlined centered">
		<a href="#roster" class="tab active" data-toggle="tab">Roster</a>
		<a href="#matches" class="tab" data-toggle="tab">Matches</a>
		@if (auth()->check())
			@if ($team->owner()->id == auth()->user()->id)
				<a href="#edit" class="tab" data-toggle="tab">Edit team</a>
			@elseif ($team->findMember(auth()->user()))
				<a href="#edit" class="tab" data-toggle="tab">Leave team</a>
			@endif
		@endif
	</nav>

	<div class="container" style="padding-top: 5rem">
		<div class="tab-content">
			<div class="tab-pane fade in show active" id="roster">
				<div class="row">
					<div class="col-md-12">
						<section class="content-block">
							<h3 class="mb-5">Roster</h3>
							<div class="row">
								@foreach($team->users as $member)
								<div class="col-md-3 d-flex justify-content-center">
									<div class="team-card">
										<div class="team-card-image" style="position: relative;">
											<img src="https://static.pexels.com/photos/37836/silhouette-fitness-bless-you-bike-37836.jpeg" style="max-width:100%; height: 250px">
											<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">ThompoNZ</span>
										</div>
										<div class="team-card-body">
											<h4 class="mb-0"><a href="#">{{ $member->username }}</a></h4>
											<p class="mb-0">ThompoNZ</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</section>
					</div>
					<div class="col-md-12">
						<section class="content-block">
							<h3 class="mb-5">Pending Invites</h3>
							<div class="row">
								<div class="col-md-3 d-flex justify-content-center">
									<div class="team-card">
										<div class="team-card-image" style="position: relative;">
											<img src="https://static.pexels.com/photos/37836/silhouette-fitness-bless-you-bike-37836.jpeg" style="max-width:100%; height: 250px">
											<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">ThompoNZ</span>
										</div>
										<div class="team-card-body">
											<h4 class="mb-0"><a href="#">SomeRandomDude</a></h4>
											<p class="mb-0">{{ rand(1,2) == 1 ? 'Member' : 'Substitute' }}</p>
										</div>
										<div class="team-card-actions">
											<a href="#" style="display: block" class="btn btn-danger btn-sm">Revoke Invite</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="matches">
				<section class="content-block">
					<h3 class="mb-4">Matches</h3>
				</section>
			</div>
			@if (auth()->check())
				@if ($team->findMember(auth()->user()))
					<div class="tab-pane fade" id="edit">
						<div class="row">
							@if ($team->owner()->id === auth()->user()->id)
								<section class="col-md-6 content-block p-4">
									<h3 class="mb-4">Update team name</h3>
									<form action="#">
										<div class="form-group">
											<input type="text" name="name" id="" class="form-control" value="{{ $team->name }}">
										</div>
										<div class="form-group">
											<button class="btn btn-primary">Update</button>
										</div>
									</form>
								</section>
							@endif
							@if ($team->findMember(auth()->user()) && $team->owner()->id !== auth()->user()->id)
								<section class="col-md-5 offset-md-1 content-block p-4" style="border: 2px dashed #ddd">
									<h3>Leave Team</h3>
									<p>By pressing the big, massive, huge, Red button, you will be removed from this team.</p>
									<button class="btn btn-danger">Leave team</button>
								</section>
							@else
								<section class="col-md-5 offset-md-1 content-block p-4" style="border: 2px dashed #ddd">
									<h3>Danger Zone</h3>
									<p>By pressing the big, massive, huge, Red button, your team will be disbanded and removed from this competition.</p>
									<button class="btn btn-danger">Disband team</button>
								</section>
							@endif
						</div>
					</div>
				@endif
			@endif
		</div>
	</div>
@stop

