@extends('dashboard.layouts.app')

@section('content')
	<div class="content--boxed">
		<div class="content__header">
			<h2>
				{{ $tournament->name }}
				<small>General Competition</small>
			</h2>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="action-header action-header--card">
                    <ul class="action-header__menu">
                        <li class="active"><a href="profile-timeline.html">Overview</a></li>
                        <li><a href="profile-about.html">Disputes</a></li>
                        <li><a href="profile-photos.html">Logs</a></li>
                        <li><a href="profile-photos.html">Notifications</a></li>
                    </ul>
                </div>
                <div class="card">
                	<div class="card__body">
                		
                	</div>
                </div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card__header">
						<h2>Brackets</h2>
					</div>
					<div class="card__body">
						<p>If the brackets have not generated correctly, or an issue has occurred with the event that has caused brackets to fail, you can reset them here.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop