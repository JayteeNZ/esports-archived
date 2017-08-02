<nav class="navbar navbar-expand-lg navbar-primary fixed-top">
	<div class="container">
		<a href="/" class="navbar-brand">Parallel</a>
		<div class="collapse navbar-collapse navbar-collapse--sidebar" id="navbar-primary">
			<div class="navbar-nav mr-auto">
				<a href="/" class="nav-link {{ active('/') }}">
					Home
				</a>
				<a href="/tournaments" class="nav-link {{ active('tournaments') }}">
					Tournaments
				</a>
				<a href="/tournaments" class="nav-link">
					Support
				</a>
			</div>

			<div class="navbar-nav user-info">
				@if (auth()->check())
					<div class="dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							{{ auth()->user()->username }}
						</a>
						<div class="dropdown-menu">
							<a href="{{ route('profile', auth()->user()) }}" class="dropdown-item">Profile</a>
							
							@ability('staff', 'access.dashboard')
								<a href="/dashboard" class="dropdown-item">Dashboard</a>
							@endability

							<a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
						</div>
					</div>
				@else
					<a href="/login" class="nav-link {{ active('login') }}">Login</a>
					<a href="/register" class="nav-link {{ active('register') }}">Signup</a>
				@endif
			</div>
		</div>
		
		<button class="navbar-toggler" type="button" data-toggle="off-canvas" data-target="#navbar-primary">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</nav>