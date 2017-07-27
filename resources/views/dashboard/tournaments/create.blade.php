@extends('dashboard.layouts.app')

@section('content')
	<div class="content__header">
		<h2>
			Create new Tournament
			<small>Fields marked with an Asterix (*) are required</small>
		</h2>
	</div>
	<div class="row">
		<form method="POST" action="/dashboard/tournaments">
			<div class="col-md-8">
				<!-- Basic Information -->
				@include('dashboard.tournaments.partials._form-basic-information')
				<!-- Team Settings -->
				@include('dashboard.tournaments.partials._form-team-settings')
				<!-- Tournament Settings -->
				@include('dashboard.tournaments.partials._form-tournament-settings')
			</div>
			<div class="col-md-4">
				<!-- Bracket Settings -->
				@include('dashboard.tournaments.partials._form-bracket-settings')
				<!-- Schedule -->
				@include('dashboard.tournaments.partials._form-schedule')
				<!-- General Settings -->
				@include('dashboard.tournaments.partials._form-general-settings')
			</div>
		</form>
	</div>
@stop