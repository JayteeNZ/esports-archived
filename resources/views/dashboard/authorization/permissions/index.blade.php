@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card__header">
					<h2>
						Authorization Permissions
						<small>Authorization Permissions are assigned to Roles. They determine the actions that a user can do.</small>
					</h2>
				</div>
				<div class="card__body">
					<table class="table">
						<thead>
							<tr>
								<th>Display Name</th>
								<th>Visibility</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
							<tr>
								<td>{{ $permission->display_name }}</td>
								<td>
									<a href="/dashboard/authorization/permissions/{{ $permission->id }}" class="btn btn--light">View</a>
									<a href="/dashboard/authorization/permissions/{{ $permission->id }}/edit" class="btn btn-success">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<a href="/dashboard/authorization/permissions/create" class="btn btn--light">Create New Permission</a>
		</div>
	</div>
</div>
@stop