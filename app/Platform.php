<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = [
    	'name', 'visible', 'slug'
    ];

    public function games()
    {
    	return $this->hasMany(Game::class);
    }
}
