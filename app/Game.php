<?php

namespace App;

use App\Platform;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	/**
	 * The relationships to eager load.
	 * @var array
	 */
	protected $with = [
		'platform'
	];

	protected $fillable = [
		'name',
		'display_name',
		'slug',
		'background_cover',
		'avatar_image',
		'meta_image',
		'identifier',
		'visible',
		'platform_id'
	];

	public function platform()
	{
		return $this->belongsTo(Platform::class);
	}
}