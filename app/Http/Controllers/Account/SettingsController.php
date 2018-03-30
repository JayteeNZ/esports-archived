<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Illuminate\Validation\Rule;
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
			'email' => [
				Rule::unique('users')->ignore($user->id, 'id'),
				'required',
				'email'
			],
			'username' => [
				Rule::unique('users')->ignore($user->id, 'id'),
				'required',
				'alpha_num'
			],
		]);

		$user->update($data);

		alert()->success('Updated your profile!', 'Done');
		return redirect()->back();
	}
}