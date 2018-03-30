<?php

namespace App\Http\Controllers\Account;

use Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
	public function update(User $user)
	{
		if (auth()->user()->id !== $user->id) {
			abort(403);
		}

		$data = request()->validate([
			'current_password' => 'required|min:6',
			'new_password' => 'required|confirmed|min:6',
			'new_password_confirmation' => 'required|same:new_password'
		]);

		if (!$this->validateCurrentPassword(request('current_password'), $user)) {
			return redirect()->back()
				->withErrors([
					'current_password' => 'The password you have entered does not match your current password.'
				]);
		} 

		$user->update(['password' => bcrypt(request('new_password'))]);

		alert()->success('Update your Password!', 'Password Changed');
		return redirect()->back();
	}

	protected function validateCurrentPassword($password, $user)
	{
		return Hash::check($password, $user->password);
	}
}