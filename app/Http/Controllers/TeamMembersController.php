<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamMember;
use App\Http\Controllers\Controller;

class TeamMembersController extends Controller
{
	public function store(Team $team)
	{
		// $data = request()->validate([
		// 	'user_id' => 'required',
		// 	'status' => 0,
		// 	'position' => 1,
		// ]);

		return response(['message' => 'done']);
	}
}