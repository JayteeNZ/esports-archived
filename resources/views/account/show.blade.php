@extends('layouts.app')

@section('page-header')
	<div class="profile-cover">
		<div class="profile-bg" style="background-image: url(/images/twitter-header.png);">
			<div class="overlay-light"></div>
			<div class="attached-bottom">
				<div class="trophy">
					@svg('trophy', '', ['style' => 'height: 20px; fill: gold'])
					<span>x0</span>
				</div>
				<div class="trophy">
					@svg('trophy', '', ['style' => 'height: 20px; fill: silver'])
					<span>x0</span>
				</div>
				<div class="trophy">
					@svg('trophy', '', ['style' => 'height: 20px; fill: #cd7f32'])
					<span>x0</span>
				</div>
			</div>
		</div>
		<div class="profile-header">
			<div class="profile-header-inner">
				<div class="profile-avatar">
					<a href="#">
						<img src="/images/thumb.png">
					</a>
				</div>
				<div class="profile-personal">
					<h4 class="m-0 text-dark">
						Parallel
					</h4>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Navigation -->
    <nav class="tabs-underlined centered" style="box-shadow: none">
        <a href="#" class="tab active">Profile</a>
        <a href="#" class="tab">Teams</a>
        <a href="#" class="tab">Awards</a>
        <a href="#" class="tab">Match History</a>
    </nav>
@endsection

@section('content')
<!-- Actual Content -->
<div class="container">
	<div class="card clears-nav">
    	<div class="card-header text-dark" style="background: #fff; border-color: #eee">
    		Biography
    	</div>
    	<div class="card-block font-sm">
    		<div class="flex py-3 justify-content-between">
    			<span class="text-dark">Location</span>
    			<span class="text-dark-muted">Australia</span>
    		</div>
    		<div class="flex py-3 justify-content-between">
    			<span class="text-dark">Full Name</span>
    			<span class="text-dark-muted">Jack Thompson</span>
    		</div>
    		<div class="flex py-3 justify-content-between">
    			<span class="text-dark">Username</span>
    			<span class="text-dark-muted">Jack</span>
    		</div>
    	</div>
    </div>
</div>
@endsection