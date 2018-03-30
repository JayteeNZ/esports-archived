<?php

namespace App\Http\Controllers\Account;

use Storage;
use App\Models\User;
use Illuminate\Validation\Rule;
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
				Rule::unique('user_profile')->ignore($user->id, 'user_id'),
				'nullable'
			],
			'account_playstation' => [
				Rule::unique('user_profile')->ignore($user->id, 'user_id'),
				'nullable'
			],
			'location' => 'nullable',
			'biography' => 'nullable',
			'organisation' => 'nullable',
			'motto' => 'nullable',
			'social_twitter' => 'nullable',
			'social_youtube' => 'nullable',
			'account_steam' => 'nullable',
			'profile_image' => 'mimes:jpg,jpeg,png',
			'profile_cover' => 'mimes:jpg,jpeg,png'
		]);

		if (request()->has('profile_image')) {
			$avatar = request()->file('profile_image')->store('avatars', 'public');
			Storage::disk('local')->delete('avatars/' . $user->profile->profile_image);
			$data['profile_image'] = $avatar;
		}

		if (request()->has('profile_cover')) {
			$cover = request()->file('profile_cover')->store('covers', 'public');
			Storage::disk('local')->delete('covers/' . $user->profile->profile_image);
			$data['profile_cover'] = $cover;
		}

		$user->profile->update($data);

		alert()->success('You\'ve updated your profile', 'Profile Updated');
		return redirect()->back();
	}
}