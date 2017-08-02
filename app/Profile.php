<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = ['id', 'user_id'];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}