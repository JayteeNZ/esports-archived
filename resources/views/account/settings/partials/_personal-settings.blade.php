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