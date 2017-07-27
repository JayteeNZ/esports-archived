<?php

namespace App\Authorization;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
	protected $fillable = ['name', 'display_name', 'description', 'visible'];

	public function isVisible()
	{
		return !! $this->visible;
	}
}