@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<form method="POST" action="/dashboard/authorization/roles">
			<div class="col-md-6">
				<div class="card">
					<div class="card__header">
						<h2>Role Information</h2>
					</div>
					<div class="card__body">
						<div class="form-group">
							<label>Display Name</label>
							<input type="text" name="display_name" class="form-control">
						</div>
						<div class="form-group">
							<label>Name <span class="pull-right">this is used internally. all lowercase and spaces include hyphens</span></label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control" rows="10"></textarea>
						</div>
						<div class="form-group">
							<label>Does this Role display on the users' profile?</label>
							<div class="toggle-switch">
								<input type="checkbox" name="visible" class="toggle-switch__checkbox" value="1">
								<i class="toggle-switch__helper"></i>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn--light">Add Role</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card__header">
						<h2>Role Permissions</h2>
					</div>
					<div class="card__body">
						<table class="table">
							@foreach($permissions as $permission)
							<tr>
								<td>{{ $permission->display_name }}</td>
								<td>{{ $permission->description }}</td>
								<td>
									<div class="toggle-switch">
										<input type="checkbox" name="permission[{{ $permission->id }}]" class="toggle-switch__checkbox" value="1">
										<i class="toggle-switch__helper"></i>
									</div>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			{{ csrf_field() }}
		</form>
	</div>
@stop