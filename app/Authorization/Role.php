<?php

namespace App\Authorization;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
	protected $fillable = ['name', 'display_name', 'description', 'visible'];

	protected $casts = [
		'visible' => 'boolean'
	];

	public function setDescriptionAttribute($value)
	{
		return nl2br($value);
	}
}