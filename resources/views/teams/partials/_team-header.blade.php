<div class="team__cover" style="margin-top: 70px; background: #1f2532; height: 300px; display: flex; align-items: center">
	<div class="container">
		<h1 style="color: #fff">{{ $team->name }}</h1>
		<div class="text-light-muted">
			<a href="{{ route('tournaments.show', $tournament) }}">{{ $tournament->name }}</a> on 
			<a href="#">{{ $tournament->platform->name }}</a>
		</div>
	</div>
</div>