@extends('layouts.app')

@section('content')
	<div class="container clears-nav" style="padding-top: 5rem">
		<div class="row">
			<div class="col-md-8 offset-md-2 mb-4">
				<h1 class="mb-0">{{ $team->name }}</h1>
				<p class="text-uppercase font-sm">editing team for <a href="#">{{ $tournament->name }}</a></p>
			</div>
			<div class="col-md-8 offset-md-2">
				<div class="card mb-5">
					<form action="#" class="form-horizontal">
						<div class="card-header">
							Team Name
						</div>
						<div class="card-block">
							<div class="form-group">
								<input type="text" name="name" class="form-control small" value="{{ $team->name }}">
							</div>
							<div class="form-group mb-0">
								<a href="#" class="btn btn-primary">Update name</a>
							</div>
						</div>
					</form>
				</div>
				
				<section class="content-block">
					<div class="card">
						<div class="card-header">
							Team Members
						</div>
						<div class="list-group" style="margin-top: -1px">
							@foreach($team->users as $member)
							<div class="list-group-item d-flex justify-content-between align-items-center" style="border-radius: 0">
								<div class="team-member__details">
									<a href="#" class="team-member__name">{{ $member->username }}</a>
									<span class="team-member__position">{{ rand(1,2) == 1 ? 'Player' : 'Substitute' }}</span>
								</div>
								<div class="dropdown">
									<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Manage</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item">Make Substitute</a>
										<div class="dropdown-divider"></div>
										<a href="" class="dropdown-item">Remove</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</section>
				<section class="content-block">
					<div class="card">
						<div class="card-header">Danger Zone</div>
						<div class="card-block">
							<p class="m-0">Disbanding will remove this team from the Tournament. This action cannot be undone.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-danger">Disband</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
@stop