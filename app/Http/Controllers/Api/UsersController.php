<?php

namespace App\Http\Controllers\Api;

use App\User;

class UsersController
{
	public function index()
	{
		$users = User::whereNotIn('id', auth()->user()->id)->get();
		
		return $users;
	}
}