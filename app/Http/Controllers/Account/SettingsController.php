<?php

namespace App\Http\Controllers\Account;

use Alert;
use App\User;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
	public function edit(User $user)
	{
		if ($user->id !== auth()->user()->id) {
			abort(404);
		}

		return view('account.settings.edit', compact('user'));
	}

	public function update(User $user)
	{
		if ($user->id !== auth()->user()->id) {
			abort(404);
		}

		$data = request()->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'username' => 'required|alpha_num|unique:users'
		]);

		$user->update($data);

		Alert::success('Updated your profile!', 'Done');
		return redirect()->back();
	}
}