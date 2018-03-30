<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	protected $table = 'user_statistics';
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}