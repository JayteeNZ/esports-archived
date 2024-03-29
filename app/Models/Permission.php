<?php

namespace App\Models;

use Laratrust\LaratrustPermission;

class Permission extends LaratrustPermission
{
	protected $fillable = ['name', 'display_name', 'description'];

	public function setDescriptionAttribute($value)
	{
		return nl2br($value);
	}
}