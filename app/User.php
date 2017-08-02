<?php

namespace App;

use App\Profile;
use App\Tournament;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot(['status', 'position'])
            ->withTimestamps();
    }

    public function hasTeam(Tournament $tournament)
    {
        return !! $this->teams()->where('tournament_id', $tournament->id)->count();
    }
}
