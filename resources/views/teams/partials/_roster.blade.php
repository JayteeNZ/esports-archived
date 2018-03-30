<div class="row">
	<div class="col-md-12">
		<section class="content-block">
			<h3 class="mb-5">Roster</h3>
			<div class="row">
				@foreach($team->users as $member)
				<div class="col-md-3 d-flex justify-content-center">
					<div class="team-card">
						<div class="team-card-image" style="position: relative;">
							<img src="/images/default-avatar.png" style="width:100%; height: 250px">
							<span class="badge badge-purple" style="position: absolute; bottom: 20px; right: 20px">ThompoNZ</span>
						</div>
						<div class="team-card-body">
							<h4 class="mb-0"><a href="{{ route('profile', $member) }}">{{ $member->username }}</a></h4>
							<p class="mb-0">{{ $member->getAccountForTournament($tournament) }}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@if (!$tournament->registrationsClosed())
			@if ($team->users->count() < $tournament->players)
			<h3>Add Player</h3>
			<form action="{{ route('teams.add-member', [$tournament, $team]) }}" method="POST">
				<div class="form-group {{ $errors->has("user") ? 'has-danger' : '' }}">
					<autocomplete :data="{{ $users }}" name="user"></autocomplete>
					@if ($errors->has("user"))
						<div class="form-control-feedback">{{ $errors->first("user") }}</div>
					@endif
				</div>
				<div class="form-group">
					{{ csrf_field() }}
					<button class="btn btn-primary btn-sm" type="submit">Add to Team</button>
				</div>
			</form>
			@endif
			@endif
		</section>
	</div>
</div>