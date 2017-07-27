<?php

namespace App\Http\Controllers;

use App\User;

class AccountController extends Controller
{
	public function show(User $user)
	{
		return view('account.show', compact('user'));
	}
}