@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		@foreach($rulesets as $ruleset)
			<div class="col-md-4">
				<div class="card">
					<div class="card__header">
						<h2>{{ $ruleset->name }}<small>{{ $ruleset->game->name }} - {{ $ruleset->game->platform->name }}</small></h2>
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