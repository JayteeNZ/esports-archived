@extends('dashboard.layouts.app')

@section('content')
	<div class="content__header">
		<h2>
			Publish New Game
			<small>Fields marked with an Asterix (*) are required</small>
		</h2>
	</div>
	{{-- Tournament Content --}}
	<div class="row">

		<form action="/dashboard/games" method="POST" enctype="multipart/form-data">
			<div class="col-md-8">
				<div class="card">
					<div class="card__header">
						<h2>Basic Information</h2>
					</div>
					<div class="card__body">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label>Name</label>
							<input type="text" class="form-control input-lg" name="name">
							@if ($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
							<label>Display Name</label>
							<input type="text" class="form-control input-lg" name="display_name">
							@if ($errors->has('display_name'))
								<span class="help-block">{{ $errors->first('display_name') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
									<label>Slug</label>
									<input type="text" class="form-control" name="slug">
									@if ($errors->has('slug'))
										<span class="help-block">{{ $errors->first('slug') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Internal Identifier</label>
									<input type="text" class="disabled form-control" disabled="disabled" name="identifier" value="{{ uniqid(true) }}">
								</div>
							</div>
						</div>
						<div class="form-group {{ $errors->has('platform_id') ? 'has-error' : '' }}">
							<label>Which Platform does this game belong to?</label>
							<select class="form-control select2" name="platform_id">
								<option value="null">Choose from the dropdown</option>
								@foreach($platforms as $platform)
									<option value="{{ $platform->id }}">{{ $platform->name }}</option>
								@endforeach
							</select>
							@if ($errors->has('platform_id'))
								<span class="help-block">{{ $errors->first('platform_id') }}</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
                <!-- Meta Information -->
                <div class="card">
                	<div class="card__header card__header--highlight">
                		<h2>
                			Meta Information
                			<small>Responsible for the display of Tournaments and Games on Parallel, and external sites.</small>
                		</h2>
                	</div>
                	<div class="card__body">
                		<div class="form-group {{ $errors->has('background_cover') ? 'has-error' : '' }}">
                			<label>Background Cover <span class="pull-right">(Recommended: 1920x1080)</span></label>
                			<input type="file" name="background_cover">
                			@if ($errors->has('background_cover'))
								<span class="help-block">{{ $errors->first('background_cover') }}</span>
                			@endif
                		</div>
                		<div class="form-group {{ $errors->has('avatar_image') ? 'has-error' : '' }}">
                			<label>Thumbnail Image <span class="pull-right">(Recommended: 400x300)</span></label>
                			<input type="file" name="avatar_image">
                			@if ($errors->has('avatar_image'))
								<span class="help-block">{{ $errors->first('avatar_image') }}</span>
                			@endif
                		</div>
                	</div>
                </div>
                <!-- Publish -->
                <div class="card">
                	<div class="card__header carc__header--highlight">
                		<h2>
                			Publishing
                			<small>Ensure all fields are filled correctly</small>
                		</h2>
                	</div>
                	<div class="card__body">
                		<div class="form-group">
                			<label>Is this Game visible on the website?</label>
                            <div class="toggle-switch">
                                <input type="checkbox" class="toggle-switch__checkbox" name="visible" value="1">
                                <i class="toggle-switch__helper"></i>
                            </div>
                        </div>
                		<button type="submit" class="btn btn--light">Save and Publish</button>
                		{{ csrf_field() }}
                	</div>
                </div>
			</div>
		</form>
	</div>
@stop