@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card__header">
					<h2>
						Authorization Roles
						<small>Authorization Roles are a Container for Permissions</small>
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
							@foreach($roles as $role)
							<tr>
								<td>{{ $role->display_name }}</td>
								<td>{{ $role->visible ? 'Visible' : 'Not Visible' }}</td>
								<td>
									<a href="/dashboard/authorization/roles/{{ $role->id }}" class="btn btn--light">View</a>
									<a href="/dashboard/authorization/roles/{{ $role->id }}/edit" class="btn btn-success">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<a href="/dashboard/authorization/roles/create" class="btn btn--light">Create New Role</a>
		</div>
	</div>
</div>
@stop