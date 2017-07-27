@extends('dashboard.layouts.app')

@section('content')
	<div class="content__header">
		<h2>
			Games
			<small>Showing all Games</small>
		</h2>
	</div>

	<div class="row">
		@foreach($games as $game)
			<div class="col-md-4">
				<div class="card">
					<div class="card__header">
						<h2 class="text-uppercase">{{ $game->name }}<small>{{ $game->platform->name }}</small></h2>
						<div class="actions">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown">
									<i class="zmdi zmdi-more-vert"></i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="#" class="dropdown-item">More Details</a></li>
									<li><a href="#" class="dropdown-item">View</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@stop