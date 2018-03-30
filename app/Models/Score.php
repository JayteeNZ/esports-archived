<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
    	'team_id',
    	'user_id',
    	'score',
    	'opposition_score'
    ];

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }
}
