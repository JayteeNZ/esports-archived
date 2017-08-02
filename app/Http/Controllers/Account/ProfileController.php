<?php

namespace App\Http\Controllers\Account;

use Illuminate\Validation\Rule;
use App\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function show(User $user)
	{
		$user->load('profile');
		return view('account.profile.show', compact('user'));
	}

	public function showTeams(User $user)
	{
		$user->load('profile');
		return view('account.profile.show-teams', compact('user'));
	}

	public function update(User $user)
	{
		if (auth()->user()->id !== $user->id) {
			abort(404);
		}

		$data = request()->validate([
			'account_xbox' => [
				Rule::unique('profiles')->ignore($user->id, 'user_id'),
				'nullable'
			],
			'account_playstation' => [
				Rule::unique('profiles')->ignore($user->id, 'user_id'),
				'nullable'
			],
		]);

		$user->profile->update($data);

		alert()->success('You\'ve updated your profile', 'Profile Updated');
		return redirect()->back();
	}
}