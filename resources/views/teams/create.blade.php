@extends('layouts.app')

@section('page-header')
	@include('tournaments.partials._tournament-header')
@stop

@section('content')
	<div class="container clears-nav">
		<div class="row">
			<div class="col-md-6">
				<form action="{{ route('teams.store', $tournament) }}" method="POST">
					<div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
						<input type="text" name="name" class="transparent-input" placeholder="Enter a team name">
						@if ($errors->has('name'))
							<div class="form-control-feedback">{{ $errors->first('name') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label>Team Leader</label>
						<input type="text" class="form-control" disabled="disabled" value="You">
					</div>
					@for ($player = 2; $player <= (int) $tournament->players; $player++)
						<div class="form-group {{ $errors->has("users.{$player}") ? 'has-danger' : '' }}">
							<label>Player {{ $player }}:</label>
							<autocomplete :data="{{ $users }}" name="users[{{$player}}]"></autocomplete>
							@if ($errors->has("users.{$player}"))
								<div class="form-control-feedback">{{ $errors->first("users.{$player}") }}</div>
							@endif
						</div>
					@endfor
					<div class="form-group">
						{{ csrf_field() }}
						<button class="btn btn-primary btn-sm" type="submit">Create Team</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop