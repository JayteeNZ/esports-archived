<?php

namespace Parallel\Http\Controllers;

use Parallel\User;

class AccountController extends Controller
{
	public function show(User $user)
	{
		return view('account.show', compact('user'));
	}
}