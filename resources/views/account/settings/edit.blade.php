@extends('layouts.app')

@section('page-header')
	<div class="cover cover-background" style="height: 300px">
		<div class="cover-inner align-items-center">
			<div class="container">
				<h3 class="text-light">{{ $user->username }} &mdash; Account Settings</h3>
			</div>
		</div>
	</div>
	<nav class="tabs-underlined centered mb-5">
		<a href="#settings" data-toggle="tab" class="tab active">Settings</a>
		<a href="#profile" data-toggle="tab" class="tab">Profile</a>
	</nav>
	<div class="container">
		<div class="tab-content">
			<div class="tab-pane fade in show active" id="settings">
				@include('account.settings.partials._personal-settings')
			</div>
			<div class="tab-pane fade in" id="profile">
				@include('account.settings.partials._profile-settings')
			</div>
		</div>
	</div>
@stop