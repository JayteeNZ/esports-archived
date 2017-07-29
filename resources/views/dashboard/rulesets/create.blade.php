@extends('dashboard.layouts.app')

@section('content')
	<div class="row" id="ruleset-creation">
		<form method="POST" action="/dashboard/rulesets">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<div class="card__header">
						<h2>Create New Ruleset</h2>
					</div>
					<div class="card__body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label>Assign to Game</label>
							<select class="form-control" name="game_id">
								@foreach($games as $game)
									<option value="{{ $game->id }}">{{ $game->display_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<textarea name="content" class="trumbowyg" cols="30" rows="10"></textarea>
						</div>
					</div>
				</div>

				<div class="btn-group">
					<button class="btn btn--light btn-lg" type="submit">Publish</button>
					{{ csrf_field() }}
				</div>
			</div>
		</form>
	</div>
@stop