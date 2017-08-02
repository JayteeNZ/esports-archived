<?php

namespace App\Http\Controllers\Dashboard\Authorization;

use App\Authorization\Role;
use App\Authorization\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;

class PermissionsController extends Controller
{
	// A list of Permissions.
	protected $permissions = [];

	public function index()
	{
		$permissions = Permission::all();
		return view('dashboard.authorization.permissions.index', compact('permissions'));
	}

	public function create()
	{
		return view('dashboard.authorization.permissions.create');
	}

	public function store(StorePermissionRequest $request)
	{
		$permission = Permission::create($request->all());

		return redirect('/dashboard/authorization/permissions');
	}

	public function show(Permission $permission)
	{
		return view('dashboard.authorization.permissions.show', compact('permission'));
	}

	public function edit(Permission $permission)
	{
		return view('dashboard.authorization.permissions.edit', compact('permission'));
	}

	public function update(StorePermissionRequest $request, Permission $permission)
	{
		$permission->update($request->all());

		return redirect('/dashboard/authorization/permissions');
	}

	public function destroy(Permission $permission)
	{
		$permission->delete();
		return redirect('/dashboard/authorization/permissions');
	}
}