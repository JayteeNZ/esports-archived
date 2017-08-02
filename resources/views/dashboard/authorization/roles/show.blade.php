@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card__header">
					<h2>{{ $role->display_name }}</h2>
				</div>
				<div class="card__body">
					<p>{!! $role->description ?? 'No Description for this role.' !!}</p>
				</div>
				<div class="card__footer">
					<a href="/dashboard/authorization/roles/{{ $role->id }}/edit" class="btn btn--light">Manage this Role</a>
					<a href="#" onclick="document.getElementById('delete').submit();" class="btn btn-danger">Delete Role</a>
					<form method="POST" action="/dashboard/authorization/roles/{{ $role->id }}" id="delete">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card__header">
					<h2>Role Permissions: <span class="pull-right">{{ $role->permissions->count() }} Permissions Assigned</span></h2>
				</div>
				<div class="card__body">
					<table class="table">
						@foreach($role->permissions as $permission)
						<tr>
							<td>{{ $permission->display_name }}</td>
							<td>{{ $permission->description }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
@stop