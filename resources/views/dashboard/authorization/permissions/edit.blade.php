@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<form method="POST" action="/dashboard/authorization/permissions/{{ $permission->id }}">
			<div class="col-md-6 col-md-offset-3">
				<div class="card">
					<div class="card__header">
						<h2>Permission Information</h2>
					</div>
					<div class="card__body">
						<div class="form-group">
							<label>Display Name</label>
							<input type="text" name="display_name" class="form-control" value="{{ $permission->display_name }}">
						</div>
						<div class="form-group">
							<label>Name <span class="pull-right">this is used internally. all lowercase and spaces include hyphens</span></label>
							<input type="text" name="name" class="form-control" value="{{ $permission->name }}">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control" rows="10" value="{{ $permission->description }}"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn--light">Update Permission</button>
						</div>
					</div>
				</div>
			</div>
			{{ csrf_field() }}
			{{ method_field('PUT') }}
		</form>
	</div>
@stop