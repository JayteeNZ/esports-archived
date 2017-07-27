<?php

namespace App\Authorization;

use Laratrust\LaratrustTeam;

class Team extends LaratrustTeam
{
	protected $fillable = ['name', 'display_name', 'description'];
}