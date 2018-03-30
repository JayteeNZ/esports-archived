@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		@foreach($tournaments as $tournament)
			<div class="col-md-3">
				<div class="card">
					<div class="card__header card__header--img" style="background-image: url(https://psmedia.playstation.com/is/image/psmedia/call-of-duty-ghosts-listing-thumb-01-ps4-eu-03nov14?$Icon$); height: 300px">
						<div class="tags" style="position: absolute; bottom: 20px; right: 20px">
							<span class="badge badge-purple">{{ $tournament->game->display_name }}</span>
							<span class="badge badge-purple">{{ $tournament->platform->display_name }}</span>
						</div>
					</div>
					<div class="card__header">
						<h2>
							<a href="/dashboard/tournaments/{{ $tournament->id }}" style="color: inherit">{{ $tournament->name }}</a>
							<small>{{ $tournament->starts_at->format('D jS F Y H:i') }} NZT</small>
						</h2>
						<div class="actions">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown">
									<i class="zmdi zmdi-more-vert"></i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="/dashboard/tournaments/{{ $tournament->id }}" class="dropdown-item">More Details</a></li>
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