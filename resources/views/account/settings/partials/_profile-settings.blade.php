<form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-7 mb-3">
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
			<div class="form-group">
				<label>Avatar Image</label>
				<input type="file" name="profile_image" class="form-control-file">
				@if ($errors->has('profile_image'))
					<div class="form-control-feedback">{{ $errors->first('profile_image') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label>Cover Photo</label>
				<input type="file" name="profile_cover" class="form-control-file">
				@if ($errors->has('profile_cover'))
					<div class="form-control-feedback">{{ $errors->first('profile_cover') }}</div>
				@endif
			</div>
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