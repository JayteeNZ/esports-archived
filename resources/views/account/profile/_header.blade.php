<div class="profile-bg" style="background-image: url({{ $user->profile->cover() }});">
	<div class="overlay-light"></div>
</div>
<div class="container-sm">
	<div class="profile__header d-flex align-items-center">
		<div class="profile__avatar">
			<a href="#"><img src="{{ $user->profile->avatar() }}"></a>
		</div>
		<div class="profile__info">
			<h4 class="profile__name">{{ $user->username }}</h4>
			<p class="profile__tagline">{{ $user->profile->motto }}</p>
		</div>
		<nav class="profile__navigation tabs-underlined">
			<a href="{{ route('profile', $user) }}" class="tab {{ active("account/{$user->username}", 'exact') }}">Profile</a>
			<a href="{{ route('profile.teams', $user) }}" class="tab {{ active("account/{$user->username}/teams", 'exact') }}">Teams</a>
			@if (auth()->check())
				@if (auth()->user()->id === $user->id)
					<a href="{{ route('account.settings', $user) }}" class="tab">Settings</a>
				@endif
			@endif
		</nav>
	</div>
</div>