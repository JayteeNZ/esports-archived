@extends('dashboard.layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card__header">
					<h2>{{ $permission->display_name }}</h2>
				</div>
				<div class="card__body">
					<p>{!! $permission->description ?? 'No Description for this permission.' !!}</p>
				</div>
				<div class="card__footer">
					<a href="/dashboard/authorization/permissions/{{ $permission->id }}/edit" class="btn btn--light">Manage this Permission</a>
					<a href="#" onclick="document.getElementById('delete').submit();" class="btn btn-danger">Delete Permission</a>
					<form method="POST" action="/dashboard/authorization/permissions/{{ $permission->id }}" id="delete">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card__header">
					<h2>Roles: <span class="pull-right">{{ $permission->roles->count() }} Roles Assigned</span></h2>
				</div>
				<div class="card__body">
					<table class="table">
						@foreach($permission->roles as $role)
						<tr>
							<td>{{ $role->display_name }}</td>
							<td>{{ $role->description }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
@stop