@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card__header">
					<h2>Platforms <small>Manage Platforms</small></h2>
				</div>
				<div class="card__body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Slug/URL</th>
									<th>Visible</th>
								</tr>
							</thead>
							<tbody>
								@foreach($platforms as $platform)
								<tr>
									<td>{{ $platform->name }}</td>
									<td>{{ $platform->slug }}</td>
									<td>{{ $platform->visible ? 'visible' : 'private' }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card__header">
					<h2>New Platform</h2>
				</div>
				<div class="card__body">
					<form action="/dashboard/platforms" method="POST">
						<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
							<label>Name</label>
							<input type="text" name="name" class="form-control">
							@if ($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('slug') ? 'has-error': '' }}">
							<label>Slug</label>
							<input type="text" name="slug" class="form-control">
							@if ($errors->has('slug'))
								<span class="help-block">{{ $errors->first('slug') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Is this Platform visible on the website?</label>
							<div class="toggle-switch">
                                <input type="checkbox" class="toggle-switch__checkbox" name="visible" value="1">
                                <i class="toggle-switch__helper"></i>
                            </div>
						</div>
						<div class="form-group">
							{{ csrf_field() }}
							<button type="submit" class="btn btn--light">Publish</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop