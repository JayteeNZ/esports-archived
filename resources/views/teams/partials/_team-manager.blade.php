<div class="row">
	@if ($team->leader()->id === auth()->user()->id)
		<section class="col-md-6 content-block p-4">
			<h3 class="mb-4">Update team name</h3>
			<form action="{{ route('teams.update', [$tournament,$team]) }}" method="POST">
				<div class="form-group">
					<input type="text" name="name" id="" class="form-control" value="{{ $team->name }}">
				</div>
				<div class="form-group">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<button class="btn btn-primary">Update</button>
				</div>
			</form>
		</section>
	@endif
	@if ($team->findMember(auth()->user()) && $team->leader()->id !== auth()->user()->id)
		<section class="col-md-5 offset-md-1 content-block p-4" style="border: 2px dashed #ddd">
			<h3>Leave Team</h3>
			<p>By pressing the big, massive, huge, Red button, you will be removed from this team.</p>
			<form action="{{ route('teams.leave', [$tournament, $team]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button class="btn btn-danger">Leave team</button>
			</form>
		</section>
	@else
		<section class="col-md-5 offset-md-1 content-block p-4" style="border: 2px dashed #ddd">
			<h3>Danger Zone</h3>
			<p>By pressing the big, massive, huge, Red button, your team will be disbanded and removed from this competition.</p>
			<form method="POST" action="{{ route('teams.destroy', [$tournament, $team]) }}">
				<button class="btn btn-danger" type="submit">Disband team</button>
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
			</form>
		</section>
	@endif
</div>