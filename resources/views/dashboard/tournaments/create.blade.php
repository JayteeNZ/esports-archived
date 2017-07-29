@extends('dashboard.layouts.app')

@section('content')
	<div class="content__header">
		<h2>
			Create new Tournament
			<small>Fields marked with an Asterix (*) are required</small>
		</h2>
	</div>

	<form method="post" action="/dashboard/tournaments">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-8">
				<basic-information></basic-information>
				<team-settings></team-settings>
				<tournament-settings :rulesets="{{ $rulesets }}" :platforms="{{ $platforms }}" :games="{{ $games }}"></tournament-settings>
			</div>
			<div class="col-md-4">
				@if ($errors->count())
					<div class="card">
						<div class="card__header">
							<h2>Errors <small>The Tournament could not be created. Fix the errors below:</small></h2>
						</div>
						<div class="card__body">
							<ul>
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif
				<bracket-settings></bracket-settings>
				<schedule></schedule>
				<publication></publication>
			</div>
		</div>
	</form>
@stop