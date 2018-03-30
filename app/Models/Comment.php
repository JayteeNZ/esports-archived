<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchComment extends Model
{
	protected $guarded = [];

	protected $appends = ['owns_message'];

	public function getOwnsMessageAttribute()
	{
		// return $this->user_id === request()->user()->id;
	}

	public function matches()
	{
		return $this->belongsTo(Match::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}