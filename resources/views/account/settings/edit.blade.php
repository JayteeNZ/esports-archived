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
				<form method="POST" action="{{ route('account.settings.update', $user) }}">
					<div class="row">
						<div class="col-md-8">
							<h3>Personal Details</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('first_name') ? 'has-danger' : '' }}">
										<label>Name</label>
										<input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
										@if ($errors->has('first_name'))
											<div class="form-control-feedback">{{ $errors->first('first_name') }}</div>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('last_name') ? 'has-danger' : '' }}">
										<label>Surname</label>
										<input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
										@if ($errors->has('last_name'))
											<div class="form-control-feedback">{{ $errors->first('last_name') }}</div>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
								<label>Email Address</label>
								<input type="email" name="email" class="form-control" value="{{ $user->email }}">
								@if ($errors->has('email'))
									<div class="form-control-feedback">{{ $errors->first('email') }}</div>
								@endif
							</div>
							<div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }}">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="{{ $user->username }}">
								@if ($errors->has('username'))
									<div class="form-control-feedback">{{ $errors->first('username') }}</div>
								@endif
							</div>
							<div class="form-group mt-4">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<button class="btn btn-primary" type="submit">Update Settings</button>
							</div>
						</div>
					</div>
				</form>
				<section class="content-block pt-5">
					<div class="row">
						<div class="col-md-8">
							<form action="{{ route('account.password.update', $user) }}" method="POST">
								<h3>Update Password</h3>
								<div class="form-group {{ $errors->has('current_password') ? 'has-danger' : '' }}">
									<label>Current Password</label>
									<input type="password" name="current_password" class="form-control">
									@if ($errors->has('current_password'))
										<div class="form-control-feedback">{{ $errors->first('current_password') }}</div>
									@endif
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('new_password') ? 'has-danger' : '' }}">
											<label>New Password</label>
											<input type="password" name="new_password" class="form-control">
											@if ($errors->has('new_password'))
												<div class="form-control-feedback">{{ $errors->first('new_password') }}</div>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-danger' : '' }}">
											<label>Confirm New Password</label>
											<input type="password" name="new_password_confirmation" class="form-control">
											@if ($errors->has('new_password_confirmation'))
												<div class="form-control-feedback">{{ $errors->first('new_password_confirmation') }}</div>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group mt-2">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<button class="btn btn-primary" type="submit">Change Password</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane fade in" id="profile">
				<form action="{{ route('profile.update', $user) }}" method="POST">
					<div class="row">
						<div class="col-md-7">
							<h4>General</h4>
							<div class="form-group">
								<label>Location</label>
								<input type="text" class="form-control" name="location" value="{{ $user->profile->location }}">
							</div>
							<div class="form-group">
								<label>Organisation</label>
								<input type="text" class="form-control" name="organisation" value="{{ $user->profile->organisation }}">
							</div>
							<div class="form-group">
								<label>Tagline/Motto (shown under username)</label>
								<input type="text" class="form-control" name="motto" value="{{ $user->profile->motto }}">
							</div>
							<div class="form-group">
								<label>Biography</label>
								<textarea name="biography" class="form-control" rows="10" cols="40" style="height: auto">{{ $user->profile->biography }}</textarea>
							</div>
							<h4 class="mt-4">Personalisation</h4>
							<p>Watch out for this area. This is where you can upload your cover photo and profile image. See the home page for more details.</p>
						</div>
						<div class="col-md-4 offset-md-1">
							<h4>Social Media</h4>
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="social_twitter" value="{{ $user->profile->social_twitter }}">
							</div>
							<div class="form-group">
								<label>Youtube</label>
								<input type="text" class="form-control" name="social_youtube" value="{{ $user->profile->social_youtube }}">
							</div>
							<h4 class="mt-5">Game Accounts</h4>
							<div class="form-group {{ $errors->has('account_xbox') ? 'has-danger' : '' }}">
								<label>Xbox Gamertag</label>
								<input type="text" class="form-control" name="account_xbox" value="{{ $user->profile->account_xbox }}">
								@if ($errors->has('account_xbox'))
									<div class="form-control-feedback">{{ $errors->first('account_xbox') }}</div>
								@endif
							</div>
							<div class="form-group {{ $errors->has('account_playstation') ? 'has-danger' : '' }}">
								<label>PlayStation Network</label>
								<input type="text" class="form-control" name="account_playstation" value="{{ $user->profile->account_playstation }}">
								@if ($errors->has('account_playstation'))
									<div class="form-control-feedback">{{ $errors->first('account_playstation') }}</div>
								@endif
							</div>
							<div class="form-group">
								<label>Steam</label>
								<input type="text" class="form-control" name="account_steam" value="{{ $user->profile->account_steam }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<button class="btn btn-primary" type="submit">Update Profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop