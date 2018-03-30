<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'user_profile';

	protected $guarded = ['id', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function avatar()
	{
		if (isset($this->profile_image)) {
			return asset($this->profile_image);
		}

		return asset(config('parallel.avatar'));
	}

	public function cover()
	{
		if (isset($this->profile_cover)) {
			return asset($this->profile_cover);
		}

		return asset(config('parallel.cover'));
	}
}