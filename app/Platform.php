<?php

namespace App;

use App\Tournament;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = [
    	'name', 'visible', 'slug', 'display_name'
    ];

    public function scopeVisible($query)
    {
    	return $query->where('visible', true);
    }

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }

    public function games()
    {
    	return $this->hasMany(Game::class);
    }
}
