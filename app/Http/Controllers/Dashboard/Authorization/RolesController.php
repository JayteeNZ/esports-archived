<?php

namespace App\Http\Controllers\Dashboard\Authorization;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;

class RolesController extends Controller
{
	// A list of Permissions for each role.
	protected $permissions = [];

	public function index()
	{
		$roles = Role::all();
		return view('dashboard.authorization.roles.index', compact('roles'));
	}

	public function create()
	{
		$permissions = Permission::all();
		return view('dashboard.authorization.roles.create', compact('permissions'));
	}

	public function store(StoreRoleRequest $request)
	{
		$role = Role::create($request->all());

		foreach((array) $request->permission as $permission => $value) {
			$role->attachPermission($permission);
		}

		return redirect('/dashboard/authorization/roles');
	}

	public function show(Role $role)
	{
		return view('dashboard.authorization.roles.show', compact('role'));
	}

	public function edit(Role $role)
	{
		$permissions = Permission::all();
		return view('dashboard.authorization.roles.edit', compact('role', 'permissions'));
	}

	public function update(StoreRoleRequest $request, Role $role)
	{
		$role->update($request->all());

		foreach((array) $request->permission as $permission => $value) {
			$this->permissions[] = $permission;
		}

		$role->syncPermissions($this->permissions);

		return redirect('/dashboard/authorization/roles');
	}

	public function destroy(Role $role)
	{
		$role->delete();
		return redirect('/dashboard/authorization/roles');
	}
}