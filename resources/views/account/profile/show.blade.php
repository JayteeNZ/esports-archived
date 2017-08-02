@extends('layouts.app')

@section('page-header')
	@include('account.profile._header')
@endsection

@section('content')
	<section class="container">
		<div class="row">
			<div class="col-lg-4 col-xl-4">
				<div class="card card-transparent">
					<div class="card-header">Biography</div>
					<div class="card-block">
						<p class="m-0 text-justify">{!! $user->profile->biography or 'Nothing here.' !!}</p>
					</div>
				</div>
				<div class="card card-transparent">
					<div class="card-header">Organisation</div>
					<div class="card-block">
						<p class="m-0 text-justify">{!! $user->profile->organisation or 'Nothing here.' !!}</p>
					</div>
				</div>
				<div class="card card-transparent">
					<div class="card-header">Game Accounts</div>
					<div class="list-group list-group-flush">
						<div class="list-group-item flex justify-content-between">
							<strong>Xbox Live</strong>
							<span>{{ $user->profile->account_xbox or 'N/A' }}</span>
						</div>
						<div class="list-group-item flex justify-content-between">
							<strong>PSN</strong>
							<span>{{ $user->profile->account_playstation or 'N/A' }}</span>
						</div>
						<div class="list-group-item flex justify-content-between">
							<strong>Steam</strong>
							<span>{{ $user->profile->account_steam or 'N/A' }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 col-xl-7 offset-md-1 mt-4">
				<h4>Statistics</h4>
				<p>Statistics aren't currently available. Check back in a few days when we've added them in.</p>
			</div>
		</div>
	</section>
@endsection